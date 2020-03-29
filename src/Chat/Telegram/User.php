<?php

declare(strict_types = 1);

namespace Teluino\Chat\Telegram;

final class User
{
    private string $username;
    private string $firstname;

    public function __construct(string $userJson)
    {
        $user = json_decode($userJson, true);
        $this->username = $user['result']['username'] ?? '';
        $this->firstname = $user['result']['first_name'] ?? '';
    }

    public function username(): string
    {
        return $this->username;
    }

    public function firstname(): string
    {
        return $this->firstname;
    }
}
