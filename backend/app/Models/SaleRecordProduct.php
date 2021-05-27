<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleRecordProduct extends Model
{
    protected $guarded = [];

    public function saleRecord(): BelongsTo
    {
        return $this->belongsTo(SaleRecord::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
