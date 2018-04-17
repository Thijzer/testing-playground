<?php

namespace Domain\ReceiptNote;

use Domain\PurchaseOrder\PurchaseOrderId;

class ReceiptNote
{
    /** @var PurchaseOrderId */
    private $purchaseOrderId;

    /** @var ReceiptNoteLine[] */
    private $lines;

    /** @var array */
    private $events;

    public function __construct(PurchaseOrderId $purchaseOrderId, array $lines)
    {
        $this->purchaseOrderId = $purchaseOrderId;
        $this->lines = $lines;
        $this->events = [];
    }

    public function __invoke()
    {
        foreach ($this->lines as $line) {
            $this->events[] = new GoodsReceived($line->productId(), $line->quantity());
        }
    }

    public function events(): array
    {
        return $this->events;
    }
}
