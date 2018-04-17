<?php

namespace Domain\PurchaseOrder;

use Domain\Product\ProductId;

class PurchaseOrder
{
    /** @var PurchaseOrderId */
    private $id;

    /** @var PurchaseOrderLine[] */
    private $purchaseOrderLines;

    /** @var string */
    private $supplierId;

    /** @var bool */
    private $placed;

    /** @var bool */
    private $completelyReceived;

    public function __construct(PurchaseOrderId $id, array $purchaseOrderLines, string $supplierId)
    {
        $this->purchaseOrderLines = $purchaseOrderLines;
        $this->supplierId = $supplierId;
        $this->id = $id;
        $this->placed = false;
        $this->completelyReceived = false;
    }

    public function addLine(PurchaseOrderLine $purchaseOrderLine): void
    {
        if ($this->placed()) {
            throw new \LogicException('Can not add an order line when the order is placed.');
        }

        //TODO: check we don't have already a line with this product

        $this->purchaseOrderLines[] = $purchaseOrderLine;
    }

    public function place(): void
    {
        if (empty($this->purchaseOrderLines)) {
            throw new \LogicException('Can not place an order when there is no line.');
        }

        $this->placed = true;
    }

    public function placed(): bool
    {
        return $this->placed;
    }

    public function completelyReceived(): bool
    {
        return $this->completelyReceived;
    }

    public function receiveGoods(ProductId $productId, float $quantity)
    {
        foreach ($this->purchaseOrderLines as $purchaseOrderLine) {
            if ($productId === $purchaseOrderLine->productId()) {
                $purchaseOrderLine->receiveGoods($quantity);
            }
        }

        $this->completelyReceived = $this->areLinesCompleted();
    }

    private function areLinesCompleted(): bool
    {
        foreach ($this->purchaseOrderLines as $purchaseOrderLine) {
            if ($purchaseOrderLine->quantityReceived() < $purchaseOrderLine->quantity()) {
                return false;
            }
        }

        return true;
    }
}
