<?php

namespace App\Services\Geo;

interface UserAgentServiceInterface
{
    public function browser(): ?string;

    public function os(): ?string;
}
