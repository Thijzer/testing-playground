<?php

namespace Application;

use Domain\ReceiptNote\GoodsReceived;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PurchaseOrderSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            [GoodsReceived::class => 'checkCompletetyReceived']
        ];
    }

    public function checkCompletelyReceived(GoodsReceived $goodsReceived): void
    {

    }
}
