<?php

namespace Infrastructure\StockBalance\Persistence;

use Domain\Product\ProductId;
use Domain\StockBalance;

class InMemoryRepository implements StockBalance\Repository
{
    /** @var StockBalance[] */
    private $stockBalances;

    public function __construct(array $stockBalances = [])
    {
        $this->stockBalances = $stockBalances;
    }

    public function save(StockBalance $stockBalance): void
    {
        $this->stockBalances[] = $stockBalance;
    }

    public function find(ProductId $productId): ?StockBalance
    {
        foreach ($this->stockBalances as $stockBalance) {
            if ($productId === $stockBalance->productId()) {
                return $stockBalance;
            }
        }

        return null;
    }
}
