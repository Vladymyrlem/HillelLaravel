<?php

namespace App\Services\Geo;


use Hillel\GeoInterface\GeoServiceInterface;
use Illuminate\Support\Facades\Http;

class IpApiGeoService implements GeoServiceInterface
{
    protected $data;

    public function parse($ip)
    {
        $response = Http::get('http://ip-api.com/json/' . $ip . '?fields=continentCode,countryCode');

        $this->data = $response->json();
    }

    public function continentCode()
    {
        return $this->data['continentCode'];
    }

    public function countryCode()
    {
        return $this->data['countryCode'];
    }
}
