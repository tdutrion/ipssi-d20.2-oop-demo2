<?php

require __DIR__.'/vendor/autoload.php';

use InvoiceApp\Entity\Invoice;

try {
    $invoices = require 'invoices-factory.php';
}catch (Throwable $exception) {
    echo '<!Doctype html><html lang="en"><head><meta charset="UTF-8"><title>Fatal error</title></head><body><h1>Ooops: Something went wrong!</h1></body></html>';
    exit;
}
?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Demo 2 - Invoice system</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" integrity="sha256-SmSEXNAArTgQ8SR6kKpyP/N+jA8f8q8KpG0qQldSKos=" crossorigin="anonymous" />
    </head>
    <body>
        <div class="container">
        <h1>Invoices</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Client details</th>
                        <th>Total tax included</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($invoices as $invoice): /* @var $invoice Invoice */ ?>
                    <tr>
                        <td><?= $invoice->id() ?></td>
                        <td><?= $invoice->creationDate()->format(DateTimeInterface::ATOM) ?></td>
                        <td><?= $invoice->status() ?></td>
                        <td>
                            <div>
                                <?= $invoice->clientName() ?>
                            </div>
                            <address>
                                <?= nl2br($invoice->clientAddress()) ?>
                            </address>
                        </td>
                        <td><?= $invoice->total() ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Client</th>
                        <th>Total tax included</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
</html>
