<?php

declare(strict_types = 1);

namespace Teluino\Chat\Telegram;

final class Update
{
    private array $originalValues;
    private Message $message;

    public function __construct(array $updateArray)
    {
        $this->originalValues = $updateArray;
    }

    public function getId(): int
    {
        return $this->originalValues['update_id'];
    }

    public function getMessage(): Message
    {
        if (empty($this->message)) {
            $this->message = new Message($this->originalValues['message']);
        }

        return $this->message;
    }
}
