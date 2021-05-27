<?php


namespace App\Misc\Products;


use App\Models\Product;

class PriceCalculationUnit
{
    /**
     * PriceCalculationUnit constructor.
     */
    public function __construct(
        protected Product $product,
        protected int $amount
    ){}

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function canApplyPromotion(): bool
    {
        if($this->product->specialPromotion === null) {
            return false;
        }

        if($this->amount < $this->product->specialPromotion->units) {
            return false;
        }

        return true;
    }

    public function applyPromotion(): float
    {
        return $this->getPromotionalPrice();
    }

    public function getPromotionalPrice(float $price = 0): float
    {
        $price += $this->product->specialPromotion->price_for_units;
        $this->setAmount($this->amount - $this->product->specialPromotion->units);
        if($this->amount >= $this->product->specialPromotion->units) {
            return $this->getPromotionalPrice($price);
        } else {
            return $price;
        }
    }

}
