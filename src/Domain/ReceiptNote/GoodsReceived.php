<?php

namespace Domain\ReceiptNote;

use Domain\Product\ProductId;

final class GoodsReceived
{
    /** @var ProductId */
    private $productId;

    /** @var float */
    private $quantity;

    public function __construct(ProductId $productId, float $quantity)
    {
        $this->productId = $productId;
        $this->quantity = $quantity;
    }
}
