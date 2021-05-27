<?php


namespace App\Repositories\SaleRecord;


use App\Models\SaleRecord;

class EloquentSaleRecordRepository implements SaleRecordRepositoryInterface
{
    public function create(array $data): SaleRecord
    {
        return SaleRecord::create(
            [
                'total_price' => $data['total_price']
            ]
        );
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

}
