<?php

declare(strict_types = 1);

namespace Teluino\Repository;

use PDO;

abstract class Database
{
    private PDO $pdo;

    final public function __construct()
    {
        $this->pdo = new PDO(
            'sqlite:' . getenv('DATABASE_FILE'),
            null,
            null,
            [PDO::ATTR_PERSISTENT => true]
        );
    }

    /**
     * @return PDO
     */
    public function connection()
    {
        return $this->pdo;
    }
}
