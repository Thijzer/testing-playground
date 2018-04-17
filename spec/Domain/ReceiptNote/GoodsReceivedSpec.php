<?php

namespace spec\Domain\ReceiptNote;

use Domain\Product\ProductId;
use Domain\ReceiptNote\GoodsReceived;
use Domain\ReceiptNote\ReceiptNoteLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GoodsReceivedSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(new ProductId('nexus-6'), 12);
        $this->shouldHaveType(GoodsReceived::class);
    }
}
