<?php

namespace App\Repositories\SaleRecordProduct;

interface SaleRecordProductRepositoryInterface {
    public function find($id);
    public function create(array $data);
}
