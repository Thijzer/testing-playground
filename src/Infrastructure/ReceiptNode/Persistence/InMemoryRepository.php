<?php

namespace Infrastructure\ReceiptNode\Persistence;

use Domain\ReceiptNote\ReceiptNote;
use Domain\ReceiptNote\ReceiptNoteId;
use Domain\ReceiptNote\Repository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class InMemoryRepository implements Repository
{
    /** @var ReceiptNote[] */
    private $receiptNotes;

    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher, array $receiptNotes = [])
    {
        foreach ($receiptNotes as $receiptNote) {
            $this->receiptNotes[] = $receiptNote;
        }

        $this->eventDispatcher = $eventDispatcher;
    }

    public function save(ReceiptNote $receiptNote): void
    {
        $this->receiptNotes[] = $receiptNote;

        foreach ($receiptNote->events() as $event) {
            $this->eventDispatcher->dispatch(get_class($event), $event);
        }
    }

    public function find(ReceiptNoteId $id): ReceiptNote
    {
        foreach ($this->receiptNotes as $receiptNote) {
            if ($id === $receiptNote->id()) {
                return $receiptNote;
            }
        }
    }
}
