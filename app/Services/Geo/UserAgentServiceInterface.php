<?php

namespace App\Services\Geo;

interface UserAgentServiceInterface
{
    public function parse($ua);

    public function browser(): ?string;

    public function os(): ?string;
}
