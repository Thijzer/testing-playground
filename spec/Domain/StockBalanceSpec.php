<?php

namespace spec\Domain;

use Domain\Product\ProductId;
use Domain\StockBalance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StockBalanceSpec extends ObjectBehavior
{
    private $productId;

    function let()
    {
        $this->productId = new ProductId('toshiba-kira');
        $this->beConstructedWith($this->productId);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(StockBalance::class);
    }

    function it_gets_the_stock_level_of_a_product()
    {
        $this->beConstructedWith($this->productId, 9);
        $this->stockLevel()->shouldReturn(9.0);
    }

    function it_throws_an_exception_if_the_quantity_is_negative_when_increasing_the_stock_level()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('increase', [-7.0]);
    }

    function it_throws_an_exception_if_the_quantity_is_zero_when_increasing_the_stock_level()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('increase', [0]);
    }

    function it_increases_the_stock_level()
    {
        $this->beConstructedWith($this->productId, 9);
        $this->increase(5);
        $this->stockLevel($this->productId)->shouldReturn(14.0);
    }

    function it_throws_an_exception_if_the_quantity_is_negative_when_decreasing_the_stock_level()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('decrease', [-7.0]);
    }

    function it_throws_an_exception_if_the_quantity_is_zero_when_decreasing_the_stock_level()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('decrease', [0]);
    }

    function it_throws_an_exception_if_the_stock_level_becomes_negative()
    {
        $this->shouldThrow(\LogicException::class)->during('decrease', [7]);
    }

    function it_decreases_the_stock_level()
    {
        $this->beConstructedWith($this->productId, 9);
        $this->decrease(5);
        $this->stockLevel($this->productId)->shouldReturn(4.0);
    }
}

