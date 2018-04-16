<?php

namespace Domain\PurchaseOrder;

use Domain\Product\ProductId;

class PurchaseOrderLine
{
    /** @var ProductId */
    private $productId;

    /** @var float */
    private $quantity;

    public function __construct(ProductId $productId, float $quantity)
    {
        if ($quantity < 0) {
            throw new \InvalidArgumentException('Quantity cannot be negative');
        }

        if ((float) 0 === $quantity) {
            throw new \InvalidArgumentException('Quantity cannot be equal to 0');
        }

        $this->productId = $productId;
        $this->quantity = $quantity;
    }
}
