<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Services\Geo\UserAgentServiceInterface;
use Hillel\GeoInterface;
use Illuminate\Support\Facades\Mail;

class GeoIpController extends Controller
{

    public function index(UserAgentServiceInterface $uaInfo)
    {
        $ip = '94.179.237.248';
        if($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }
        $uaInfo->parse($ip);
        $browser = $uaInfo->browser();
        $os = $uaInfo->os();
        if (!empty($browser) && !empty($os)) {
            Visit::create([
                'ip' => $ip,
                'browser' => $uaInfo->browser(),
                'os' => $uaInfo->os(),
            ]);
        }
        dd($ip, $os, $browser);
    }
}
