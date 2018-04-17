<?php

namespace spec\Infrastructure\StockBalance\Persistence;

use Domain\Product\ProductId;
use Domain\StockBalance;
use Domain\StockBalance\Repository;
use Infrastructure\StockBalance\Persistence\InMemoryRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InMemoryRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(InMemoryRepository::class);
    }

    function it_is_a_repository()
    {
        $this->shouldBeAnInstanceOf(Repository::class);
    }

    function it_saves_a_stock_balance(StockBalance $stockBalance)
    {
        $this->save($stockBalance);
    }

    function it_finds_a_stock_balance(StockBalance $stockBalance, ProductId $id)
    {
        $this->beConstructedWith([$stockBalance]);

        $stockBalance->productId()->willReturn($id);
        $this->find($id)->shouldReturn($stockBalance);
    }
}
