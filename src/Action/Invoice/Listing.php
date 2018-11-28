<?php

declare(strict_types=1);

namespace InvoiceApp\Action\Invoice;

use InvoiceApp\Repository\Invoice\Behavior\Listing as InvoiceListingBehavior;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;

class Listing
{
    private $repository;

    public function __construct(InvoiceListingBehavior $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        ob_start();
        $name = $request->getQueryParams()['name'] ?? null;
        $invoices = $this->repository->findAll();
        require __DIR__.'/../../../templates/invoice/listing.php';
        $content = ob_get_clean();

        return new Response\HtmlResponse($content);
    }
}