<?php

namespace spec\Domain\PurchaseOrder;

use Domain\PurchaseOrder\PurchaseOrderLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PurchaseOrderLineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('nexus-6', 100);

        $this->shouldHaveType(PurchaseOrderLine::class);
    }

    function it_throws_an_exception_if_quantity_is_negative()
    {
        $this->beConstructedWith('nexus-6', -1);

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }

    function it_throws_an_exception_if_quantity_is_equal_to_zero()
    {
        $this->beConstructedWith('nexus-6', 0);

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }

    function it_throws_an_exception_if_product_id_is_empty()
    {
        $this->beConstructedWith('', 100);

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }
}
