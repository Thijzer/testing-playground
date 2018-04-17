<?php


namespace Domain\ReceiptNote;


interface Repository
{
    public function save(ReceiptNote $receiptNote): void;
    public function find(ReceiptNoteId $id): ReceiptNote;
}
