<?php

declare(strict_types = 1);

namespace Teluino\Connection;

final class Curl implements Request
{
    private $ch;

    public function __construct()
    {
        $this->ch = curl_init();
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }

    public function get(string $link): string
    {
        curl_setopt($this->ch, CURLOPT_URL, $link);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);

        return curl_exec($this->ch);
    }
}
