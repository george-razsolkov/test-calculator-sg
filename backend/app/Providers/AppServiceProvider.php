<?php

namespace App\Providers;

use App\Repositories\SaleRecord\EloquentSaleRecordRepository;
use App\Repositories\SaleRecord\SaleRecordRepositoryInterface;
use App\Repositories\SaleRecordProduct\EloquentSaleRecordProductProductRepository;
use App\Repositories\SaleRecordProduct\SaleRecordProductRepositoryInterface;
use App\Services\Products\PriceCalculation\PriceCalculationInterface;
use App\Services\Products\PriceCalculation\ProductPriceCalculationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PriceCalculationInterface::class, function () {
            return new ProductPriceCalculationService();
        });

        $this->app->bind(
            SaleRecordRepositoryInterface::class, EloquentSaleRecordRepository::class
        );
        $this->app->bind(
            SaleRecordProductRepositoryInterface::class, EloquentSaleRecordProductProductRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
