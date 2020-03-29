<?php

declare(strict_types = 1);

namespace Teluino\Chat\Telegram;

use Teluino\Connection\Request;

final class Telegram
{
    private const TELEGRAM_URL = 'https://api.telegram.org/bot';

    private string $telegramToken = '';
    private string $telegramUrl = '';

    public function __construct(string $telegramToken)
    {
        $this->telegramToken = $telegramToken;
        $this->telegramUrl = static::TELEGRAM_URL . $this->telegramToken;
    }

    public function getEndpoint(string $endpoint): string
    {
        return $this->telegramUrl . '/' . $endpoint;
    }

    public function getMe(Request $request): User
    {
        $json = $request->get($this->getEndpoint('getMe'));

        return new User($json);
    }
}
