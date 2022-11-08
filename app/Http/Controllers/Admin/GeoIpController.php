<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Hudzhal\UserAgent\UserAgentServiceInterface;

class GeoIpController extends Controller
{

    public function index(UserAgentServiceInterface $agentService)
    {
        $ip = '94.179.237.248';
        if ($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }
        $ua = request()->userAgent();
        $agentService->parse($ua);
        $browser = $agentService->browser();
        $os = $agentService->os();
        Visit::create([
            'ip' => $ip,
            'browser' => $agentService->browser(),
            'os' => $agentService->os(),
        ]);
        dd($ip, $os, $browser);
    }
}
