<?php

declare(strict_types = 1);

namespace Teluino\Connection;

interface Request
{
    public function get(string $link): string;
}
