<?php

namespace spec\Application;

use Application\PurchaseOrderSubscriber;
use Domain\Product\ProductId;
use Domain\PurchaseOrder\PurchaseOrderId;
use Domain\ReceiptNote\GoodsReceived;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PurchaseOrderSubscriberSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PurchaseOrderSubscriber::class);
    }

    function it_is_a_subscriber()
    {
        $this->shouldBeAnInstanceOf(EventSubscriberInterface::class);
    }

    function it_subscribes_to_events()
    {
        $this->getSubscribedEvents()->shouldReturn(
            [
                [GoodsReceived::class => 'checkCompletetyReceived']
            ]
        );
    }

    function it_checks_an_order_is_completely_received()
    {
        $this->checkCompletelyReceived(new GoodsReceived(new PurchaseOrderId('lala'), new ProductId('kira'), 89));
    }
}
