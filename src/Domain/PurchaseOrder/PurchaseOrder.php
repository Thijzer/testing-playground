<?php

namespace Domain\PurchaseOrder;

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

    public function __construct(PurchaseOrderId $id, array $purchaseOrderLines, string $supplierId)
    {
        $this->purchaseOrderLines = $purchaseOrderLines;
        $this->supplierId = $supplierId;
        $this->id = $id;
        $this->placed = false;
    }

    public function addLine(PurchaseOrderLine $purchaseOrderLine): void
    {
        $this->purchaseOrderLines[] = $purchaseOrderLine;
    }

    public function place(): void
    {
        if (!empty($this->purchaseOrderLines)) {
            $this->placed = true;
        }
    }

    public function placed(): bool
    {
        return $this->placed;
    }
}
