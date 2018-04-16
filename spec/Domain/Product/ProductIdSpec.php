<?php

namespace spec\Domain\Product;

use Domain\Product\ProductId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('nexus-6');

        $this->shouldHaveType(ProductId::class);
    }

    function it_throws_an_exception_if_id_is_empty()
    {
        $this->beConstructedWith('');

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }
}
