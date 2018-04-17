<?php

namespace spec\Domain\ReceiptNote;

use Domain\ReceiptNote\ReceiptNoteId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReceiptNoteIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('qf-887897');

        $this->shouldHaveType(ReceiptNoteId::class);
    }

    function it_throws_an_exception_if_id_is_empty()
    {
        $this->beConstructedWith('');

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }

    function it_casts_to_string()
    {
        $this->beConstructedWith('qf-887897');
        $this->__toString()->shouldReturn('qf-887897');
    }
}
