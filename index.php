<?php

use InvoiceApp\Http\Request;

require __DIR__.'/vendor/autoload.php';

$repository = new \InvoiceApp\Repository\Invoice();
$action = new \InvoiceApp\Action\Invoice\Listing($repository);
$response = $action->handle(new Request());

foreach ($response->getHeaders() as $key => $value) {
    header("$key: $value");
}
echo $response->getBody();