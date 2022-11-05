<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Hudzhal\UserAgent\UserAgentServiceInterface;
use Hillel\GeoInterface;
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

    public function index(UserAgentServiceInterface $uaAgentService)
    {
                $ip = '94.179.237.248';
        $uaAgentService->parse($ip);
        if (!empty($browser) && !empty($os)) {
            Visit::create([
                'ip'             => $ip,
                'browser'        => $uaAgentService->browser(),
                'os'             => $uaAgentService->os(),
            ]);
        }
}
}
