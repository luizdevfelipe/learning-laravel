<?php

namespace App\Providers;

use App\Contracts\PaymentProcessor;
use App\Services\SalesTaxCalculator;
use App\Services\Stripe;
use Illuminate\Contracts\Foundation\Application;
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
        $this->app->singleton(PaymentProcessor::class, function (Application $app) {
            return $app->make(Stripe::class, ['config' => []]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
