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
}
