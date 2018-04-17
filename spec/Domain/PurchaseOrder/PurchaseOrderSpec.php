<?php

namespace spec\Domain\PurchaseOrder;

use Domain\PurchaseOrder\PurchaseOrder;
use Domain\PurchaseOrder\PurchaseOrderId;
use Domain\PurchaseOrder\PurchaseOrderLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PurchaseOrderSpec extends ObjectBehavior
{
    function it_is_initializable(PurchaseOrderId $id, PurchaseOrderLine $purchaseOrderLine)
    {
        $this->beConstructedWith($id, [$purchaseOrderLine], 'yumyum');
        $this->shouldHaveType(PurchaseOrder::class);
    }

    function it_can_be_constructed_with_no_line(PurchaseOrderId $id)
    {
        $this->beConstructedWith($id, [], 'yumyum');
        $this->shouldHaveType(PurchaseOrder::class);
    }

    function it_adds_a_line_to_an_order(PurchaseOrderId $id, PurchaseOrderLine $purchaseOrderLine)
    {
        $this->beConstructedWith($id, [$purchaseOrderLine], 'yumyum');
        $this->addLine($purchaseOrderLine);
    }
}
