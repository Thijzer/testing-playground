<?php

namespace spec\Application;

use Application\StockBalanceSubscriber;
use Domain\Product\ProductId;
use Domain\ReceiptNote\GoodsReceived;
use Domain\StockBalance;
use Domain\StockBalance\Repository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StockBalanceSubscriberSpec extends ObjectBehavior
{
    function let(Repository $repository)
    {
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(StockBalanceSubscriber::class);
    }

    function it_is_an_event_subscriber()
    {
        $this->shouldBeAnInstanceOf(EventSubscriberInterface::class);
    }

    function it_subscribes_to_events()
    {
        $this->getSubscribedEvents()->shouldReturn(
            [
                GoodsReceived::class => 'goodsReceived',
            ]
        );
    }

    function it_increases_the_stock_level_when_goods_are_delivered($repository, StockBalance $stockBalance)
    {
        $productId = new ProductId('kira');

        $repository->find($productId)->willReturn($stockBalance);
        $stockBalance->increase(12)->shouldBeCalled();
        $repository->save($stockBalance)->shouldBeCalled();

        $this->goodsReceived(new GoodsReceived($productId, 12));
    }

    function it_increases_the_stock_level_when_new_goods_are_delivered($repository, StockBalance $stockBalance)
    {
        $productId = new ProductId('kira');

        $repository->find($productId)->willReturn(null);
        $repository->save(Argument::type(StockBalance::class))->shouldBeCalled();

        $this->goodsReceived(new GoodsReceived($productId, 12));
    }
}
