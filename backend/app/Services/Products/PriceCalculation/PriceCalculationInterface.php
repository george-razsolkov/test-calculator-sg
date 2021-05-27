<?php

namespace App\Services\Products\PriceCalculation;

use Illuminate\Support\Collection;

interface PriceCalculationInterface
{
    public function calculatePrice(Collection $units);
}
