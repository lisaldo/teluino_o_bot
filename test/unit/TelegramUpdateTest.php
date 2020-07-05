<?php

declare(strict_types = 1);

namespace Teluino\UnitTest;

use PHPUnit\Framework\TestCase;
use Teluino\Chat\Telegram\Message;
use Teluino\Chat\Telegram\Update;

final class TelegramUpdateTest extends TestCase
{
    private static $updateArray;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass(); // TODO: Change the autogenerated stub
        $fakeData = json_decode(file_get_contents(__DIR__ . '/mocks/telegram-getUpdates.json'), true);

        self::$updateArray = $fakeData['result'][0];
    }

    public function test_can_get_update_id(): void
    {
        $updateId = self::$updateArray['update_id'];
        $update = new Update(self::$updateArray);

        $this->assertSame($update->getId(), $updateId, 'Falha ao comparar o valor identificador do update');
    }

    public function test_can_get_message()
    {
        $update = new Update(self::$updateArray);
        $updateMessage = $update->getMessage();

        $message = new Message(self::$updateArray['message']);

        $this->assertInstanceOf(Message::class, $updateMessage);
        $this->assertSame($message->getId(), $updateMessage->getId());
    }
}
