<?php

namespace Domain\PurchaseOrder;

class PurchaseOrderId
{
    /** @var string */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
