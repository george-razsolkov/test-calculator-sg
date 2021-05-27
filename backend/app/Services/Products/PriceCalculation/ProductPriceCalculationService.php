<?php

namespace App\Services\Products\PriceCalculation;

use App\Misc\Products\PriceCalculationUnit;
use Illuminate\Support\Collection;

class ProductPriceCalculationService implements PriceCalculationInterface
{
    public function calculatePrice(Collection $units): array
    {
        //could be a data transfer object
        $priceDetails = [
            'total_price' => 0,
            'products' => []
        ];

        /** @var PriceCalculationUnit $unit */
        foreach ($units as $unit) {
            $price = 0;
            $amountCopy = $unit->getAmount();

            if($unit->canApplyPromotion()) {
                $price += $unit->applyPromotion();
            }

            $price += $unit->getProduct()->getAttribute('price') * $unit->getAmount();

            $priceDetails['total_price'] += $price;
            $priceDetails['products'][] = [
                'amount_of_products' => $amountCopy,
                'price_for_products' => $price,
                'product_id' => $unit->getProduct()->id
            ];
        }

        return  $priceDetails;
    }



}
