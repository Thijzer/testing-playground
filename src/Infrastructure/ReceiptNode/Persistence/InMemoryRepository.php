<?php

namespace Infrastructure\ReceiptNode\Persistence;

use Domain\ReceiptNote\ReceiptNote;
use Domain\ReceiptNote\ReceiptNoteId;
use Domain\ReceiptNote\Repository;

class InMemoryRepository implements Repository
{
    /** @var ReceiptNote[] */
    private $receiptNotes;

    public function __construct(array $receiptNotes = [])
    {
        foreach ($receiptNotes as $receiptNote) {
            $this->save($receiptNote);
        }
    }

    public function save(ReceiptNote $receiptNote): void
    {
        $this->receiptNotes[] = $receiptNote;
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
