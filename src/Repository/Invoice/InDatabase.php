<?php

declare(strict_types=1);

namespace InvoiceApp\Repository\Invoice;

use InvoiceApp\Collection\Invoice;
use InvoiceApp\Entity\Customer;
use InvoiceApp\Repository\Invoice\Behavior\Listing;
use InvoiceApp\ValueObject\Customer\Address;
use InvoiceApp\ValueObject\Customer\Name;
use InvoiceApp\ValueObject\Invoice\TotalPriceTaxIncluded;
use InvoiceApp\ValueObject\Invoice\Uuid;

final class InDatabase implements Listing
{
    private $dbConnection;

    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function findAll(): Invoice
    {
        $fields = [
            'i.id',
            'i.creation_date',
            'i.status',
            'c.id as customer_id',
            'c.name',
            'c.address',
            'i.total_price_tax_included',
        ];
        $statement = $this->dbConnection->query(sprintf(
            'SELECT %s FROM %s LEFT JOIN %s ON %s;',
            implode(', ', $fields),
            'invoice i',
            'customer c',
            'i.client_id = c.id'
        ));
        $result = [];
        foreach ($statement->fetchAll() as $databaseRecord) {
            $result[] = new \InvoiceApp\Entity\Invoice(
                new Uuid((int) $databaseRecord['id']),
                new Customer(
                    new \InvoiceApp\ValueObject\Customer\Uuid((int) $databaseRecord['customer_id']),
                    new Name($databaseRecord['name']),
                    new Address($databaseRecord['address'])
                ),
                new TotalPriceTaxIncluded((float) $databaseRecord['total_price_tax_included'])
            );
        }
        return new Invoice(...$result);
    }
}