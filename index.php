<?php

use Zend\Diactoros\ServerRequestFactory;

require __DIR__.'/vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals();

$repository = new \InvoiceApp\Repository\Invoice();
$action = new \InvoiceApp\Action\Invoice\Listing($repository);
$response = $action->handle($request);

foreach ($response->getHeaders() as $key => $value) {
    $value = implode(', ', $value);
    header("$key: $value");
}
echo $response->getBody();