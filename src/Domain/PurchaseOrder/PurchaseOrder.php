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

    public function __construct(PurchaseOrderId $id, array $purchaseOrderLines, string $supplierId)
    {
        $this->purchaseOrderLines = $purchaseOrderLines;
        $this->supplierId = $supplierId;
        $this->id = $id;
    }

    public function addLine(PurchaseOrderLine $purchaseOrderLine): void
    {
        $this->purchaseOrderLines[] = $purchaseOrderLine;
    }
}
