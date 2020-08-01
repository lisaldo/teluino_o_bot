<?php

declare(strict_types = 1);

namespace Teluino\Repository;

final class Update extends Database
{
    public function saveId(int $id): bool
    {
        $stmt = $this->connection()
            ->prepare('INSERT INTO telegram_update (update_id) VALUES (?)');

        return $stmt->execute([$id]);
    }

    public function lastId(): int
    {
        $stmt = $this->connection()->query('SELECT update_id FROM telegram_update ORDER BY id DESC LIMIT 1');

        $lastId = $stmt->fetch();
        $lastId = $lastId[0] ?? 0;

        return intval($lastId);
    }
}
