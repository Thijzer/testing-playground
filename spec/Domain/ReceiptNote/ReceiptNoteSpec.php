<?php

namespace spec\Domain\ReceiptNote;

use Domain\Product\ProductId;
use Domain\PurchaseOrder\PurchaseOrderId;
use Domain\ReceiptNote\GoodsReceived;
use Domain\ReceiptNote\ReceiptNote;
use Domain\ReceiptNote\ReceiptNoteLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReceiptNoteSpec extends ObjectBehavior
{
    function let(
        PurchaseOrderId $purchaseOrderId,
        ReceiptNoteLine $receiptNoteLine1,
        ReceiptNoteLine $receiptNoteLine2,
        ProductId $productId1,
        ProductId $productId2
    ) {
        $receiptNoteLine1->productId()->willReturn($productId1);
        $receiptNoteLine1->quantity()->willReturn(21);
        $receiptNoteLine2->productId()->willReturn($productId2);
        $receiptNoteLine2->quantity()->willReturn(12);
        $this->beConstructedWith($purchaseOrderId, [$receiptNoteLine1, $receiptNoteLine2]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ReceiptNote::class);
    }

    function it_records_that_goods_are_received($productId1, $productId2)
    {
        $this->__invoke();
        $events = $this->events();
        $events->shouldHaveCount(2);
        $events[0]->shouldReturnAnInstanceOf(GoodsReceived::class);
        $events[1]->shouldReturnAnInstanceOf(GoodsReceived::class);
    }
}
