<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Hudzhal\UserAgent\UserAgentServiceInterface;
use Hillel\GeoInterface\GeoServiceInterface;
use Illuminate\Support\Facades\Mail;

class GeoIpController extends Controller
{
//    protected $ip;
//    protected $ua;
//
//    /**
//     * Create a new job instance.
//     *
//     * @param  string  $ip
//     * @param  string  $ua
//     */
//    public function __construct(string $ip, string $ua)
//    {
//        $this->ip = $ip;
//        $this->ua = $ua;
//    }

    public function index(UserAgentServiceInterface $uaAgentService,  GeoServiceInterface $geoService)
    {
                $ip = '94.179.237.248';
        $geoService->parse($ip);
        $uaAgentService->parse($ip);
        if (!empty($browser) && !empty($os)) {


            Visit::create([
                'ip'             => $ip,
                'continent_code' => $geoService->continentCode(),
                'country_code'   => $geoService->countryCode(),
                'browser'        => $uaAgentService->browser(),
                'os'             => $uaAgentService->os(),
            ]);
        }
}
}
