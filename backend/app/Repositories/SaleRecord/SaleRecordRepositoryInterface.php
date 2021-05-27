<?php

namespace App\Repositories\SaleRecord;

use App\Models\SaleRecord;

interface SaleRecordRepositoryInterface {
    public function create(array  $data): SaleRecord;
    public function find($id);
}
