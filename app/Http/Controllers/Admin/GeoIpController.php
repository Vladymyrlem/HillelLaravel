<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Services\Geo\UserAgentServiceInterface;
use donatj\UserAgent\UserAgentParser;

class GeoIpController extends Controller
{

    public function index(UserAgentServiceInterface $reader)
    {
        $ip = '94.179.237.248';
        if ($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }
        $parser = new UserAgentParser();
        $ua_info = $parser->parse();
        $browser = $ua_info->browser();
        $os = $ua_info->platform();
        if (!empty($browser) && !empty($os)) {
            Visit::create([
                'ip' => $ip,
                'browser' => $browser,
                'os' => $os,
            ]);
        }
        dd($ip, $os, $browser);
    }
}
