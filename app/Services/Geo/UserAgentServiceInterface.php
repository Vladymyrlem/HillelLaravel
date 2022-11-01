<?php

namespace App\Services\Geo;

interface UserAgentServiceInterface
{
    public function parse(string $ip): void;
    public function browser(): ?string;
    public function os(): ?string;
}
