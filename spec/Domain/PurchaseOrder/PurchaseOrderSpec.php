<?php

namespace spec\Domain\PurchaseOrder;

use Domain\PurchaseOrder\PurchaseOrder;
use Domain\PurchaseOrder\PurchaseOrderId;
use Domain\PurchaseOrder\PurchaseOrderLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PurchaseOrderSpec extends ObjectBehavior
{
    function let(PurchaseOrderId $id, PurchaseOrderLine $purchaseOrderLine)
    {
        $this->beConstructedWith($id, [$purchaseOrderLine], 'yumyum');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PurchaseOrder::class);
        $this->placed()->shouldReturn(false);
    }

    function it_can_be_constructed_with_no_line(PurchaseOrderId $id)
    {
        $this->beConstructedWith($id, [], 'yumyum');
        $this->shouldHaveType(PurchaseOrder::class);
        $this->placed()->shouldReturn(false);
    }

    function it_adds_a_line_to_an_order(PurchaseOrderLine $purchaseOrderLine)
    {
        $this->addLine($purchaseOrderLine);
    }

    function it_places_an_order()
    {
        $this->place();
        $this->placed()->shouldReturn(true);
    }

    function it_can_place_an_order_already_placed_is_ok()
    {
        $this->place();
        $this->place();
        $this->placed()->shouldReturn(true);
    }

    function it_does_not_place_an_order_without_lines(PurchaseOrderId $id)
    {
        $this->beConstructedWith($id, [], 'yumyum');
        $this->shouldThrow(\LogicException::class)->during('place', []);
    }

    function it_cannot_add_a_line_if_the_order_is_placed(PurchaseOrderLine $purchaseOrderLine)
    {
        $this->place();
        $this->shouldThrow(\LogicException::class)->during('addLine', [$purchaseOrderLine]);
    }
}
