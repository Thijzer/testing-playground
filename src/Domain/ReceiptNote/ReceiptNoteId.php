<?php

namespace Domain\ReceiptNote;

class ReceiptNoteId
{
    /** @var string */
    private $id;

    public function __construct(string $id)
    {
        if ('' === $id || null === $id) {
            throw new \InvalidArgumentException('ID cannot be null');
        }

        $this->id = $id;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
