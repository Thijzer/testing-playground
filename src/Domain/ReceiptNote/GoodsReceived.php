<?php

namespace Domain\ReceiptNote;

use Domain\Product\ProductId;
use Domain\PurchaseOrder\PurchaseOrderId;
use Symfony\Component\EventDispatcher\Event;

final class GoodsReceived extends Event
{
    /** @var PurchaseOrderId */
    private $purchaseOrderId;

    /** @var ProductId */
    private $productId;

    /** @var float */
    private $quantity;

    public function __construct(PurchaseOrderId $purchaseOrderId, ProductId $productId, float $quantity)
    {
        $this->purchaseOrderId = $purchaseOrderId;
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

    public function purchaseOrderId(): PurchaseOrderId
    {
        return $this->purchaseOrderId;
    }
}
