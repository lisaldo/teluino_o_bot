<?php

declare(strict_types = 1);

namespace Teluino\IntegrationTest;

use PHPUnit\Framework\TestCase;
use Teluino\Chat\Telegram\Telegram;
use Teluino\Connection\Curl;

final class RequestTest extends TestCase
{
    public function test_can_get_real_url()
    {
        $request = new Curl();
        $telegram = new Telegram(getenv('TELEGRAM_TOKEN'));

        $getme = json_decode($request->get($telegram->getEndpoint('getMe')), true);

        $this->assertTrue($getme['ok']);
    }
}
