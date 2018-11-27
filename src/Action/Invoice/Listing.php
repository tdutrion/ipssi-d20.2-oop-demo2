<?php

declare(strict_types=1);

namespace InvoiceApp\Action\Invoice;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;

class Listing
{
    private $repository;

    public function __construct(\InvoiceApp\Repository\Invoice $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $repository = $this->repository;
        $response = new class($request, $repository) implements ResponseInterface {
            private $request;
            private $repository;

            public function __construct(ServerRequestInterface $request, \InvoiceApp\Repository\Invoice $repository)
            {
                $this->request = $request;
                $this->repository = $repository;
            }
            public function getProtocolVersion() {}
            public function withProtocolVersion($version) {}
            public function getHeaders() {}
            public function hasHeader($name) {}
            public function getHeader($name) {}
            public function getHeaderLine($name) {}
            public function withHeader($name, $value) {}
            public function withAddedHeader($name, $value) {}
            public function withoutHeader($name) {}
            public function getBody() {
                ob_start();
                $name = $this->request->getAttribute('name');
                $invoices = $this->repository->findAll();
                require __DIR__.'/../../../templates/invoice/listing.php';
                return ob_get_clean();
            }
            public function withBody(StreamInterface $body) {}
            public function getStatusCode() {}
            public function withStatus($code, $reasonPhrase = '') {}
            public function getReasonPhrase() {}
        };

        return $response;
    }
}