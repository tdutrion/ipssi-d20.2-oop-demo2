<?php

use InvoiceApp\Entity\Customer;
use InvoiceApp\Entity\Invoice;
use InvoiceApp\ValueObject\Customer\Address;
use InvoiceApp\ValueObject\Customer\Name;
use InvoiceApp\ValueObject\Customer\Uuid as CustomerUuid;
use InvoiceApp\ValueObject\Invoice\TotalPriceTaxIncluded;
use InvoiceApp\ValueObject\Invoice\Uuid as InvoiceUuid;

return [
    new Invoice(
        new InvoiceUuid(1),
        new Customer(new CustomerUuid(1), new Name('Customer 1'), new Address('Somewhere; SomewhereLand')),
        new TotalPriceTaxIncluded(10.0)
    ),
];