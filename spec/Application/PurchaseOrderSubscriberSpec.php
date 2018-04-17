<?php

namespace spec\Application;

use Application\PurchaseOrderSubscriber;
use Domain\Product\ProductId;
use Domain\PurchaseOrder\PurchaseOrder;
use Domain\PurchaseOrder\PurchaseOrderId;
use Domain\PurchaseOrder\PurchaseOrderLine;
use Domain\PurchaseOrder\Repository;
use Domain\ReceiptNote\GoodsReceived;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PurchaseOrderSubscriberSpec extends ObjectBehavior
{
    function let(Repository $repository)
    {
        $this->beConstructedWith($repository);
    }

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
                [GoodsReceived::class => 'receiveGoods']
            ]
        );
    }

    function it_checks_an_order_is_completely_received($repository)
    {
        $productId = new ProductId('kira');
        $purchaseOrderId = new PurchaseOrderId('lala');
        $purchaseOrder = new PurchaseOrder(
            $purchaseOrderId,
            [new PurchaseOrderLine($productId, 34)]
        ,   'toshiba'
        );

        $repository->find($purchaseOrderId)->willReturn($purchaseOrder);
        $repository->save($purchaseOrder)->shouldBeCalled();

        $this->receiveGoods(new GoodsReceived($purchaseOrderId, $productId, 89));
    }
}
