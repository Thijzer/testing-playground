<?php

namespace Domain;

use Domain\Product\ProductId;

class StockBalance
{
    /** @var float */
    private $stockLevel;

    /** @var ProductId */
    private $productId;

    public function __construct(ProductId $productId, float $stockLevel = 0)
    {
        $this->productId = $productId;
        $this->stockLevel = $stockLevel;
    }

    public function increase(float $quantity): void
    {
        if ($quantity <= 0) {
            throw new \InvalidArgumentException('Quantity should be > 0 to increase the stock level');
        }

        $this->stockLevel += $quantity;
    }

    public function stockLevel(): float
    {
        return $this->stockLevel;
    }

    public function decrease(float $quantity): void
    {
        if ($quantity <= 0) {
            throw new \InvalidArgumentException('Quantity should be > 0 to decrease the stock level');
        }

        if ($this->stockLevel() - $quantity < 0) {
            throw new \LogicException('Stock level can not become negative');
        }
        
        $this->stockLevel -= $quantity;
    }
}
