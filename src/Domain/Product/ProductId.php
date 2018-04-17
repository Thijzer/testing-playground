<?php

namespace Domain\Product;

class ProductId
{
    /** @var string */
    private $productId;

    public function __construct(string $productId)
    {
        if ('' === $productId || null === $productId) {
            throw new \InvalidArgumentException('ID cannot be null');
        }

        $this->productId = $productId;
    }

    public function __toString(): string
    {
        return $this->productId;
    }
}
