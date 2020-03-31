<?php

declare(strict_types = 1);

namespace Teluino\Chat\Telegram;

final class User
{
    private string $username;
    private string $firstname;
    private bool $bot;
    private int $id;

    public function __construct(array $userArray)
    {
        $this->username = $userArray['username'];
        $this->firstname = $userArray['first_name'] ?? '';
        $this->bot = $userArray['is_bot'] ?? false;
        $this->id = $userArray['id'] ?? 0;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function firstname(): string
    {
        return $this->firstname;
    }

    public function itsABot(): bool
    {
        return $this->bot;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
