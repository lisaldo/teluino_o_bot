<?php

declare(strict_types = 1);

namespace Teluino\UnitTest;

use Teluino\Chat\Telegram\User;
use PHPUnit\Framework\TestCase;

class TelegramUserTest extends TestCase
{
    public function test_get_bot_username()
    {
        $user = new User(file_get_contents(__DIR__ . '/mocks/telegram-getme.json'));

        $this->assertSame('teluino_o_bot', $user->username());
    }

    public function test_get_bot_first_name()
    {
        $user = new User(file_get_contents(__DIR__ . '/mocks/telegram-getme.json'));

        $this->assertSame('Teluino', $user->firstname());
    }
}
