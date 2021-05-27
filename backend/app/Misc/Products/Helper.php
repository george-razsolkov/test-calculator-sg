<?php


namespace App\Misc\Products;

use App\Models\Product;
use Illuminate\Support\Collection;

class Helper
{
    public function generatePriceCalculationUnitCollection(array $data): Collection
    {
        //eager load special promotions
        $products = Product::whereIn('name', $data)->with('specialPromotion')->get();

        $map = [];
        //map input for O(n) lookup
        foreach($data as $productName) {
            if(!isset($map[$productName])) {
                $map[$productName] = 1;
                continue;
            }
            $map[$productName]++;
        }

        return $products->map(function (Product $product) use ($map) {
            return new PriceCalculationUnit($product, $map[$product->name]);
        });

    }
}
