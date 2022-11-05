<?php

namespace App\Services\Geo;


use Illuminate\Support\Facades\Http;
use Hillel\GeoInterface\GeoServiceInterface;

class IpApiGeoService implements GeoServiceInterface
{
    protected $data;

    public function parse($ip)
    {
        $response = Http::get('http://ip-api.com/json/'. $ip .'?fields=continentCode,countryCode');

        $this->data = $response->json();
    }
    public function continentCode()
    {
        return $this ->data['continentCode'];
    }

    public function countryCode()
    {
        return $this->data['countryCode'];
    }
}
