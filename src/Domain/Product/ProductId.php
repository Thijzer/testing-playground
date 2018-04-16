<?php

namespace Domain\Product;

class ProductId
{
    /** @var string */
    private $productId;

    public function __construct(string $productId)
    {
        $this->productId = $productId;
    }
}
