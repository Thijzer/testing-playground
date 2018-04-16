<?php

namespace spec\Domain\PurchaseOrder;

use Domain\PurchaseOrder\PurchaseOrderId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PurchaseOrderIdSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('AF-68890');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PurchaseOrderId::class);
    }
}
