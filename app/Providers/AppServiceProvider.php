<?php

namespace App\Providers;

use App\Contracts\PaymentProcessor;
use App\Services\SalesTaxCalculator;
use App\Services\Stripe;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // public $bindings = [
    //     PaymentProcessor::class => Stripe::class
    // ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentProcessor::class, function ($app) {
            return new Stripe([], $app->make(SalesTaxCalculator::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
