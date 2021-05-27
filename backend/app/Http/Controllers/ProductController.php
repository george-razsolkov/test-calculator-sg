<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyProductsRequest;
use App\Misc\Products\Helper;
use App\Misc\Products\PriceCalculationUnit;
use App\Models\Product;
use App\Repositories\SaleRecord\SaleRecordRepositoryInterface;
use App\Repositories\SaleRecordProduct\SaleRecordProductRepositoryInterface;
use App\Services\Products\PriceCalculation\PriceCalculationInterface;

class ProductController extends Controller
{
    public function buy(BuyProductsRequest $request,
                        PriceCalculationInterface $priceCalculationService,
                        SaleRecordRepositoryInterface $saleRecordRepository,
                        SaleRecordProductRepositoryInterface $saleRecordProductRepository,
                        Helper $helper
    )
    {
        $collection = $helper->generatePriceCalculationUnitCollection($request->validated()['products']);

        $details = $priceCalculationService->calculatePrice($collection);
        $saleRecord = $saleRecordRepository->create(['total_price' => $details['total_price']]);

        foreach ($details['products'] as $productDetail) {
            $productDetail['sale_record_id'] = $saleRecord->id;
            $saleRecordProductRepository = $saleRecordProductRepository->create($productDetail);
        }

        return view('welcome', [
            'saleRecord' => $saleRecord->fresh()->load('saleRecordProducts.product')
        ]);
    }

}
