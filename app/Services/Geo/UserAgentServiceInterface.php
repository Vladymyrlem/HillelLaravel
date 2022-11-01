<?php

namespace app\Services\Geo;

interface UserAgentServiceInterface
{
    public function parse(string $ua): void;
    public function browser(): ?string;
    public function os(): ?string;
}
