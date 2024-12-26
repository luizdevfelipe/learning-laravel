<?php

namespace App\Pipelines\Order;

class CalculateShipping
{
    public function handle(array $order, \Closure $next)
    {
        echo "Calculating Shipping <br>";

        $order['shipping'] = 10;

        return $next($order);
    }
}
