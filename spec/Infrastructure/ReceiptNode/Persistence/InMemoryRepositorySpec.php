<?php

namespace spec\Infrastructure\ReceiptNode\Persistence;

use Domain\ReceiptNote\ReceiptNote;
use Domain\ReceiptNote\ReceiptNoteId;
use Domain\ReceiptNote\Repository;
use Infrastructure\ReceiptNode\Persistence\InMemoryRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventDispatcher;

class InMemoryRepositorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new EventDispatcher());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(InMemoryRepository::class);
    }

    function it_is_a_repository()
    {
        $this->shouldBeAnInstanceOf(Repository::class);
    }

    function it_saves_a_receipt_note(ReceiptNote $receiptNote)
    {
        $receiptNote->events()->shouldBeCalled();
        $this->save($receiptNote);
    }

    function it_finds_a_receipt_note(ReceiptNote $receiptNote, ReceiptNoteId $id)
    {
        $receiptNote->id()->willReturn($id);
        $this->beConstructedWith(new EventDispatcher(), [$receiptNote]);
        $this->find($id)->shouldReturn($receiptNote);
    }
}
