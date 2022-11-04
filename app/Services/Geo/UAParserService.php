<?php

namespace App\Services\Geo;

use donatj\UserAgent\UserAgentParser;

class UAParserService implements UserAgentServiceInterface
{
    protected $userAgent;

    public function __construct()
    {
        $this->userAgent = new UserAgentParser();
        $this->userAgent = $this->userAgent->parse();
    }

    public function browser(): ?string
    {
        return $this->userAgent->browser();
    }

    public function os(): ?string
    {
        return $this->userAgent->platform();
    }
}
