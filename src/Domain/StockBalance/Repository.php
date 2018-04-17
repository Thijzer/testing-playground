<?php

namespace Domain\StockBalance;

use Domain\Product\ProductId;
use Domain\StockBalance;

interface Repository
{
    public function save(StockBalance $stockBalance): void;
    public function find(ProductId $id): ?StockBalance;
}
