<?php

declare(strict_types=1);

namespace InvoiceApp\Repository\Invoice;

use InvoiceApp\Collection\Invoice;
use InvoiceApp\Entity\Customer;
use InvoiceApp\Entity\Invoice as InvoiceEntity;
use InvoiceApp\Exception\CannotRetrieveInvoice;
use InvoiceApp\Exception\CannotRetrieveInvoiceCollection;
use InvoiceApp\Repository\Invoice\Invoice as InvoiceInterface;
use InvoiceApp\ValueObject\Customer\Address;
use InvoiceApp\ValueObject\Customer\Name;
use InvoiceApp\ValueObject\Invoice\TotalPriceTaxIncluded;
use InvoiceApp\ValueObject\Invoice\Uuid;

final class InDatabase implements InvoiceInterface
{
    private $dbConnection;
    private $fields = [
        'i.id',
        'i.creation_date',
        'i.status',
        'c.id as customer_id',
        'c.name',
        'c.address',
        'i.total_price_tax_included',
    ];

    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function findAll(): Invoice
    {
        try {
            $statement = $this->dbConnection->query(sprintf(
                'SELECT %s FROM %s LEFT JOIN %s ON %s;',
                implode(', ', $this->fields),
                'invoice i',
                'customer c',
                'i.client_id = c.id'
            ));
            $result = [];
            foreach ($statement->fetchAll() as $databaseRecord) {
                $result[] = $this->hydrateInvoiceFromDbRecord($databaseRecord);
            }
            return new Invoice(...$result);
        } catch (\PDOException $exception) {
            throw new CannotRetrieveInvoiceCollection($exception);
        }

    }

    public function find(Uuid $identifier): ?InvoiceEntity
    {
        try {
            $statement = $this->dbConnection->prepare(sprintf(
                'SELECT %s FROM %s LEFT JOIN %s ON %s WHERE %s = :uuid;',
                implode(', ', $this->fields),
                'invoice i',
                'customer c',
                'i.client_id = c.id',
                'i.id'
            ));
            $statement->execute([
                ':uuid' => $identifier->toString(),
            ]);
            $databaseRecord = $statement->fetch(\PDO::FETCH_ASSOC);

            if (!$databaseRecord) {
                throw new CannotRetrieveInvoice(
                    $identifier,
                    new \LogicException('No record with this id in db')
                );
            }

            return $this->hydrateInvoiceFromDbRecord($databaseRecord);
        } catch (\PDOException $exception) {
            throw new CannotRetrieveInvoice($identifier, $exception);
        }
    }

    private function hydrateInvoiceFromDbRecord(array $databaseRecord): InvoiceEntity
    {
        return new InvoiceEntity(
            new Uuid((int)$databaseRecord['id']),
            new Customer(
                new \InvoiceApp\ValueObject\Customer\Uuid((int)$databaseRecord['customer_id']),
                new Name($databaseRecord['name']),
                new Address($databaseRecord['address'])
            ),
            new TotalPriceTaxIncluded((float)$databaseRecord['total_price_tax_included'])
        );
    }
}