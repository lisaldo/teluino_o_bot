<?php

declare(strict_types = 1);

namespace Teluino\UnitTest;

use Teluino\Chat\Telegram\Message;
use PHPUnit\Framework\TestCase;

class TelegramMessageTest extends TestCase
{
    private static array $originalMessage;

    private Message $message;

    public static function setUpBeforeClass(): void
    {
        $fakeData = json_decode(file_get_contents(__DIR__ . '/mocks/telegram-getUpdates.json'), true);

        self::$originalMessage = $fakeData['result'][0]['message'];
    }

    public function setUp(): void
    {
        $this->message = new Message(self::$originalMessage);
    }

    public function test_can_get_initializa_update()
    {
        $messageId = self::$originalMessage['message_id'];

       $this->assertSame($this->message->getId(), $messageId, 'Falha ao comparar o valor identificador da mensagem');
    }

    public function test_can_get_sent_date()
    {
        $this->assertTrue($this->message->getDateSentMessage() instanceof \DateTimeImmutable);
    }
}
