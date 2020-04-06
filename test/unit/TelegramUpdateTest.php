<?php

declare(strict_types = 1);

namespace Teluino\UnitTest;

use Teluino\Chat\Telegram\Update;
use PHPUnit\Framework\TestCase;

class TelegramUpdateTest extends TestCase
{
    /**
      * @dataProvider get_fake_data()
      */
    public function test_can_get_update_id(array $updateArray): void
    {
        $updateId = $updateArray['update_id'];
        $update = new Update($updateArray);

       $this->assertSame($update->getId(), $updateId, 'Falha ao comparar o valor identificador do update');
    }

    public function get_fake_data(): array
    {
        $fakeData = json_decode(file_get_contents(__DIR__ . '/mocks/telegram-getUpdates.json'), true);

        return [
            [$fakeData['result'][0]]
        ];
    }
}
