<?php

namespace Domain\PurchaseOrder;

class PurchaseOrderLine
{
    /** @var string */
    private $productId;

    /** @var float */
    private $quantity;

    public function __construct(string $productId, float $quantity)
    {
        if ($quantity < 0) {
            throw new \InvalidArgumentException('Quantity cannot be negative');
        }

        if ((float) 0 === $quantity) {
            throw new \InvalidArgumentException('Quantity cannot be equal to 0');
        }

        if ('' === $productId) {
            throw new \InvalidArgumentException('Product ID cannot be empty');
        }

        $this->productId = $productId;
        $this->quantity = $quantity;
    }
}
