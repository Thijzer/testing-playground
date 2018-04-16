<?php

namespace Domain\PurchaseOrder;

class PurchaseOrder
{
    private $id;

    /** @var PurchaseOrderLine[] */
    private $purchaseOrderLines;

    /** @var string */
    private $supplierId;

    public function __construct(array $purchaseOrderLines, string $supplierId)
    {
        $this->purchaseOrderLines = $purchaseOrderLines;
        $this->supplierId = $supplierId;
    }
}
