<?php

namespace Application;

use Domain\ReceiptNote\GoodsReceived;
use Domain\StockBalance;
use Domain\StockBalance\Repository;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StockBalanceSubscriber implements EventSubscriberInterface
{
    /** @var Repository */
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            GoodsReceived::class => 'goodsReceived',
        ];
    }

    public function goodsReceived(GoodsReceived $event)
    {
        $stockBalance = $this->repository->find($event->productId());
        if (null === $stockBalance) {
            $stockBalance = new StockBalance($event->productId());
        }

        $stockBalance->increase($event->quantity());
        $this->repository->save($stockBalance);
    }
}
