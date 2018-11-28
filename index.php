<?php

use GuzzleHttp\Psr7\ServerRequest;
use InvoiceApp\Action\Invoice\Listing;
use InvoiceApp\DependencyInjection\Container;

require __DIR__.'/vendor/autoload.php';

//$request = ServerRequestFactory::fromGlobals();
$request = ServerRequest::fromGlobals();

$container = new Container(require __DIR__.'/config/container.php');

/* @var $action Listing */
$action = $container->get(Listing::class);
$response = $action->handle($request);

foreach ($response->getHeaders() as $key => $value) {
    $value = implode(', ', $value);
    header("$key: $value");
}
echo $response->getBody();