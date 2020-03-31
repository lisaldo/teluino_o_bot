<?php

declare(strict_types = 1);

namespace Teluino\UnitTest;

use Teluino\Chat\Telegram\User;
use PHPUnit\Framework\TestCase;

class TelegramUserTest extends TestCase
{
    private static string $baseJson = '';
    private array $userArray = [];

    public static function setUpBeforeClass(): void
    {
        self::$baseJson = file_get_contents(__DIR__ . '/mocks/telegram-getme.json');
    }

    public function setUp(): void
    {
        $baseArray = json_decode(self::$baseJson, true);
        $this->userArray = $baseArray['result'];
    }

    public function test_get_bot_username(): void
    {

        $user = new User($this->userArray);

        $this->assertSame('teluino_o_bot', $user->username());
    }

    public function test_get_bot_first_name(): void
    {
        $user = new User($this->userArray);

        $this->assertSame('Teluino', $user->firstname());
    }

    public function test_if_its_a_bot(): void
    {
        $user = new User($this->userArray);

        $this->assertTrue($user->itsABot());
    }

    public function test_can_get_user_id(): void
    {
        $user = new User($this->userArray);

        $this->assertSame($this->userArray['id'], $user->getId(), 'Testando ID do usuario');
    }
}
