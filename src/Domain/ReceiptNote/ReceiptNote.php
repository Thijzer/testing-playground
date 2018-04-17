<?php

namespace Domain\ReceiptNote;

use Domain\PurchaseOrder\PurchaseOrderId;
use Symfony\Component\EventDispatcher\Event;

class ReceiptNote
{
    /** @var ReceiptNoteId */
    private $id;

    /** @var PurchaseOrderId */
    private $purchaseOrderId;

    /** @var ReceiptNoteLine[] */
    private $lines;

    /** @var Event[] */
    private $events;

    public function __construct(ReceiptNoteId $id, PurchaseOrderId $purchaseOrderId, array $lines)
    {
        $this->purchaseOrderId = $purchaseOrderId;
        $this->lines = $lines;
        $this->events = [];
        $this->id = $id;
    }

    public function __invoke()
    {
        foreach ($this->lines as $line) {
            $this->events[] = new GoodsReceived($this->purchaseOrderId, $line->productId(), $line->quantity());
        }
    }

    public function events(): array
    {
        return $this->events;
    }

    public function id(): ReceiptNoteId
    {
        return $this->id;
    }
}
