<?php

declare(strict_types = 1);

namespace Teluino\IntegrationTest;

use PHPUnit\Framework\TestCase;
use Teluino\Repository\Update;

final class UpdateRepositoryTest extends TestCase
{
    private static Update $updateRepository;

    public static function setUpBeforeClass(): void
    {
        self::$updateRepository = new Update();
        self::$updateRepository->connection()->beginTransaction();
    }

    public static function tearDownAfterClass(): void
    {
        self::$updateRepository->connection()->rollBack();
    }

    public function test_can_save_last_update()
    {
        $id = 999;
        $this->assertTrue(self::$updateRepository->saveId($id));
    }

    /**
     * @dataProvider ids_providers
     */
    public function test_can_get_last_inserted_id(int $firstId, int $secondId)
    {
        self::$updateRepository->saveId($firstId);
        self::$updateRepository->saveId($secondId);

        $this->assertSame($secondId, self::$updateRepository->lastId());
    }

    public function ids_providers()
    {
        return [
            [888, 777],
            [111, 222],
            [444, 555],
        ];
    }
}
