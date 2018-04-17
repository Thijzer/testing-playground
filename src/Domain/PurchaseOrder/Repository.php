<?php

namespace Domain\PurchaseOrder;

interface Repository
{
    public function save(PurchaseOrder $purchaseOrder): void;
    public function find(PurchaseOrderId $id): ?PurchaseOrder;
}
