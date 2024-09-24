<?php

namespace App;

class PaymentService
{
   public function process(): bool
   {
        echo "Paid" . PHP_EOL;

        return true;
   }
}
