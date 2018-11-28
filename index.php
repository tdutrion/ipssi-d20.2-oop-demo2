<?php

use InvoiceApp\Persistence\DbConnection;
use InvoiceApp\Repository\Invoice\InDatabase;
use InvoiceApp\Repository\Invoice\InMemory;
use Zend\Diactoros\ServerRequestFactory;

require __DIR__.'/vendor/autoload.php';

//$request = ServerRequestFactory::fromGlobals();
$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();

//$repository = new InMemory();
$repository = new InDatabase(
    new DbConnection('127.0.0.1', 'root', 'root', 'invoiceapp')
);
$action = new \InvoiceApp\Action\Invoice\Listing($repository);
$response = $action->handle($request);

foreach ($response->getHeaders() as $key => $value) {
    $value = implode(', ', $value);
    header("$key: $value");
}
echo $response->getBody();