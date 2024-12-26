<?php

namespace App\Pipelines\Order;

class GenerateInvoice
{
    public function handle(array $order, \Closure $next)
    {
        echo "Generating Invoice <br>";

        $order['invoice'] = rand(1000, 9999);

        return $next($order);
    }
}