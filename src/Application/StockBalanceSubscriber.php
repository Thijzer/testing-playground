<?php

namespace Application;

use Domain\ReceiptNote\GoodsReceived;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StockBalanceSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            GoodsReceived::class => 'goodsReceived',
        ];
    }

    public function goodsReceived(GoodsReceived $event)
    {
        // TODO: write logic here
    }
}
