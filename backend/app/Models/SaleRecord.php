<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SaleRecord extends Model
{
    protected $guarded = [];

    public function saleRecordProducts(): HasMany
    {
        return $this->hasMany(SaleRecordProduct::class);
    }
}
