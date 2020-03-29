<?php

declare(strict_types = 1);

namespace Teluino\Chat\Telegram;

use Teluino\Connection\Request;

final class Update
{
    private array $originalValues;

    public function __construct(array $updateArray)
    {
        $this->originalValues = $updateArray;
    }

    public function getId(): int
    {
        return $this->originalValues['update_id'];
    }
}
