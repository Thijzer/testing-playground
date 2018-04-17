<?php

namespace Domain\ReceiptNote;

use Domain\Product\ProductId;
use Symfony\Component\EventDispatcher\Event;

final class GoodsReceived extends Event
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

    public function productId(): ProductId
    {
        return $this->productId;
    }

    public function quantity(): float
    {
        return $this->quantity;
    }
}
