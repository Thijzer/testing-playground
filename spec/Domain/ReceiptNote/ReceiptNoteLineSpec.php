<?php

namespace spec\Domain\ReceiptNote;

use Domain\Product\ProductId;
use Domain\ReceiptNote\ReceiptNoteLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReceiptNoteLineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(new ProductId('fifi'), 19);
        $this->shouldHaveType(ReceiptNoteLine::class);
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
