<?php

namespace spec\Domain\PurchaseOrder;

use Domain\Product\ProductId;
use Domain\PurchaseOrder\PurchaseOrderLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PurchaseOrderLineSpec extends ObjectBehavior
{
    function it_is_initializable(ProductId $productId)
    {
        $this->beConstructedWith($productId, 100);

        $this->shouldHaveType(PurchaseOrderLine::class);
    }

    function it_throws_an_exception_if_quantity_is_negative(ProductId $productId)
    {
        $this->beConstructedWith($productId, -1);

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }

    function it_throws_an_exception_if_quantity_is_equal_to_zero(ProductId $productId)
    {
        $this->beConstructedWith($productId, 0);

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }

    function it_returns_the_product_id()
    {
        $productId = new ProductId('foo');
        $this->beConstructedWith($productId, 10);
        $this->productId()->shouldReturn($productId);
    }

    function it_returns_the_quantity()
    {
        $productId = new ProductId('foo');
        $this->beConstructedWith($productId, 10);
        $this->quantity()->shouldReturn(10.0);
    }

    function it_returns_the_quantity_received()
    {
        $productId = new ProductId('foo');
        $this->beConstructedWith($productId, 10);
        $this->quantityReceived()->shouldReturn(0.0);
    }

    function it_receive_goods()
    {
        $productId = new ProductId('foo');
        $this->beConstructedWith($productId, 10);

        $this->receiveGoods(12);
        $this->quantityReceived()->shouldReturn(12.0);
    }
}
