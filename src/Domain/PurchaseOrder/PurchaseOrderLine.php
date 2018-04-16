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
        $this->productId = $productId;
        $this->quantity = $quantity;
    }
}
