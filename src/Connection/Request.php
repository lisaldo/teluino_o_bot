<?php

declare(strict_types = 1);

namespace Teluino\Connection;

use GuzzleHttp\Psr7\Request as GuzzleRequest;

class Request
{
    private GuzzleRequest $guzzleRequest;

    public function __construct(GuzzleRequest $request)
    {
        $this->guzzleRequest = $request;
    }

    public function get(string $link): string
    {
        return '';
    }
}
