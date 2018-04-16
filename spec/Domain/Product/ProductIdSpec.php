<?php

namespace spec\Domain\Product;

use Domain\Product\ProductId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductIdSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('nexus-6');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ProductId::class);
    }
}
