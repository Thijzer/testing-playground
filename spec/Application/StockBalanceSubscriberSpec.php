<?php

namespace spec\Application;

use Application\StockBalanceSubscriber;
use Domain\Product\ProductId;
use Domain\ReceiptNote\GoodsReceived;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StockBalanceSubscriberSpec extends ObjectBehavior
{
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

    function it_increases_the_stock_level_when_goods_are_delivered()
    {
        $this->goodsReceived(new GoodsReceived(new ProductId('kira'), 12));
    }
}
