<?php

namespace spec\Domain\ReceiptNote;

use Domain\Product\ProductId;
use Domain\PurchaseOrder\PurchaseOrderId;
use Domain\ReceiptNote\GoodsReceived;
use Domain\ReceiptNote\ReceiptNoteLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\Event;

class GoodsReceivedSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(new PurchaseOrderId('labochuuuuu'), new ProductId('nexus-6'), 12);
        $this->shouldHaveType(GoodsReceived::class);
    }

    function it_is_an_event()
    {
        $this->beConstructedWith(new PurchaseOrderId('labochuuuuu'), new ProductId('nexus-6'), 12);
        $this->shouldBeAnInstanceOf(Event::class);
    }

    function it_returns_the_product_id()
    {
        $productId = new ProductId('nexus-6');
        $this->beConstructedWith(new PurchaseOrderId('labochuuuuu'), $productId, 12);
        $this->productId()->shouldReturn($productId);
    }

    function it_returns_the_quantity()
    {
        $productId = new ProductId('nexus-6');
        $this->beConstructedWith(new PurchaseOrderId('labochuuuuu'), $productId, 12);
        $this->quantity()->shouldReturn(12.0);
    }

    function it_returns_the_purchase_order_id()
    {
        $purchaseOrderId = new PurchaseOrderId('labochuuuuu');
        $this->beConstructedWith($purchaseOrderId, new ProductId('nexus-6'), 12);
        $this->purchaseOrderId()->shouldReturn($purchaseOrderId);
    }
}
