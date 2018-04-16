<?php

namespace spec\Domain\PurchaseOrder;

use Domain\PurchaseOrder\PurchaseOrderLine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PurchaseOrderLineSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('nexus-6', 100);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PurchaseOrderLine::class);
    }
}
