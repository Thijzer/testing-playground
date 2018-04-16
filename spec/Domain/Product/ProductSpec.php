<?php

namespace spec\Domain\Product;

use Domain\Product\Product;
use Domain\Product\ProductId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{
    function let(ProductId $productId)
    {
        $this->beConstructedWith($productId);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Product::class);
    }
}
