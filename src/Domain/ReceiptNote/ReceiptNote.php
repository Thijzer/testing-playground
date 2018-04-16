<?php

namespace Domain\ReceiptNote;

use Domain\PurchaseOrder\PurchaseOrderId;

class ReceiptNote
{
    /** @var PurchaseOrderId */
    private $purchaseOrderId;

    /** @var array */
    private $lines;

    public function __construct(PurchaseOrderId $purchaseOrderId, array $lines)
    {
        $this->purchaseOrderId = $purchaseOrderId;
        $this->lines = $lines;
    }
}
