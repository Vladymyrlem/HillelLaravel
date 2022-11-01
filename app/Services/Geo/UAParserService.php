<?php

namespace App\Services\Geo;

use Illuminate\Support\Facades\Http;

class UAParserService implements UserAgentServiceInterface
{
    protected $data;


    public function parse(string $ip): void
    {
        $response = Http::get($this->getUrl($ip));
        $this->data = $response->json();
    }

    public function browser(): ?string
    {
        return $this->data['region'] ?? null;
    }

    public function os(): ?string
    {
        return $this->data['country'] ?? null;
    }

    /**
     * @param string $ua
     * @return string
     */
    protected function getUrl(string $ua): string
    {
        $url = 'http://ip-api.com/json/' . $ua;
        $parameters = http_build_query([
            'fields' => 'browser,os,query'
        ]);
        return $url . '?' . $parameters;
    }
}
