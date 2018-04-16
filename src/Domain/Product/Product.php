<?php

namespace Domain\Product;

class Product
{
    /** @var ProductId */
    private $productId;

    public function __construct(ProductId $productId)
    {
        $this->productId = $productId;
    }
}
