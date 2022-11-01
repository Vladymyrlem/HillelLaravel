<?php

namespace app\Services\Geo;

use Illuminate\Support\Facades\Http;

class UAParserService implements UserAgentServiceInterface
{
    protected $data;


    public function parse(string $ua): void
    {
        $response = Http::get($this->getUrl($ua));
        $this->data = $response->json();
    }

    public function browser(): ?string
    {
        return $this->data['browser'] ?? null;
    }

    public function os(): ?string
    {
        return $this->data['os'] ?? null;
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
