<?php

declare(strict_types = 1);

namespace Teluino\Chat\Telegram;

use DateTimeImmutable;
use Teluino\Connection\Request;

final class Message
{
    private ?DateTimeImmutable $dateSentMessage = null;
    private ?User $user = null;
    private array $originalMessage;

    public function __construct(array $messageArray)
    {
        $this->originalMessage = $messageArray;
    }

    public function getId(): int
    {
        return $this->originalMessage['message_id'];
    }

    public function getDateSentMessage(): DateTimeImmutable
    {
        if (! $this->dateSentMessage) {
            $this->dateSentMessage = (new \DateTimeImmutable())->setTimestamp($this->originalMessage['date']);
        }

        return $this->dateSentMessage;
    }

    public function getWhoSent(): User
    {
        if (! $this->user) {
            $this->user = new User($this->originalMessage['from']);
        }

        return $this->user;
    }
}
