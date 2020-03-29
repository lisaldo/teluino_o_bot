<?php

declare(strict_types = 1);

namespace Teluino\UnitTest;

use Teluino\Connection\Request;
use Teluino\Chat\Telegram\Telegram;
use Teluino\Chat\Telegram\User;
use PHPUnit\Framework\TestCase;

class TelegramTest extends TestCase
{
    private string $telegramToken;
    private Telegram $telegram;

    public function setUp(): void
    {
        $this->telegramToken = getenv('TELEGRAM_TOKEN');
        $this->telegram = new Telegram($this->telegramToken);
    }

    public function test_retrieving_endpoint()
    {
        $endpoint = 'https://api.telegram.org/bot' . $this->telegramToken . '/getMe';

        $this->assertSame($endpoint, $this->telegram->getEndpoint('getMe'));
    }

    public function test_can_retrieve_bot_information()
    {
        $connectionStub = $this->createStub(Request::class);
        $connectionStub->method('get')
            ->willReturn(file_get_contents(__DIR__ . '/mocks/telegram-getme.json'));

        $me = $this->telegram->getMe($connectionStub);

        $this->assertSame(User::class, get_class($me));
        $this->assertSame('teluino_o_bot', $me->username());
    }
}
