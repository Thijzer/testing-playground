<?php

namespace spec\Domain\ReceiptNote;

use Domain\PurchaseOrder\PurchaseOrderId;
use Domain\ReceiptNote\ReceiptNote;
use Domain\ReceiptNote\ReceiptNoteLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReceiptNoteSpec extends ObjectBehavior
{
    function let(PurchaseOrderId $purchaseOrderId, ReceiptNoteLine $receiptNoteLine)
    {
        $this->beConstructedWith($purchaseOrderId, [$receiptNoteLine]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ReceiptNote::class);
    }
}
