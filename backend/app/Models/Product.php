<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    public function specialPromotion(): HasOne
    {
        return $this->hasOne(ProductSpecialPromotion::class);
    }

    public static function getCollectionByName(array $productNames)
    {

    }

}
