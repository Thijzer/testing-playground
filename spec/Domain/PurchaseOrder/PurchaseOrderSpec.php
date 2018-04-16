<?php

namespace spec\Domain\PurchaseOrder;

use Domain\PurchaseOrder\PurchaseOrder;
use Domain\PurchaseOrder\PurchaseOrderLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PurchaseOrderSpec extends ObjectBehavior
{
    function let(PurchaseOrderLine $purchaseOrderLine)
    {
        $this->beConstructedWith([$purchaseOrderLine], 'yumyum');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PurchaseOrder::class);
    }
}
