<?php


namespace App\Repositories\SaleRecordProduct;


use App\Models\SaleRecordProduct;

class EloquentSaleRecordProductProductRepository implements SaleRecordProductRepositoryInterface
{

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function create(array $data): SaleRecordProduct
    {
        return SaleRecordProduct::create(
            [
                'price_for_products' => $data['price_for_products'],
                'amount_of_products' => $data['amount_of_products'],
                'sale_record_id' => $data['sale_record_id'],
                'product_id' => $data['product_id']
            ]
        );
    }

}
