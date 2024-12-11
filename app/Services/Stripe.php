<?php

namespace App\Services;

use App\Contracts\PaymentProcessor;

class Stripe implements PaymentProcessor
{
    public function __construct(private array $config, private SalesTaxCalculator $salesTaxCalculator)
    {
        dump($config);
    }

    public function process(array $transaction): void {}
}
