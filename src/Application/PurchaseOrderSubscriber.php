<?php

namespace Application;

use Domain\PurchaseOrder\Repository;
use Domain\ReceiptNote\GoodsReceived;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PurchaseOrderSubscriber implements EventSubscriberInterface
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
            [GoodsReceived::class => 'receiveGoods']
        ];
    }

    public function receiveGoods(GoodsReceived $goodsReceived): void
    {
        $purchaseOrder = $this->repository->find($goodsReceived->purchaseOrderId());
        $purchaseOrder->receiveGoods($goodsReceived->productId(), $goodsReceived->quantity());
        $this->repository->save($purchaseOrder);
    }
}
