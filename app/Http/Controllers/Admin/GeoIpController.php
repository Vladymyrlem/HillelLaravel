<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\GeoUa;

class GeoIpController extends Controller
{

    public function __invoke()
    {
        $ua = request()->userAgent();

        $ip = request()->ip() != '127.0.0.1'
            ?: $_SERVER['HTTP_X_FORWARDED_FOR'];

        GeoUa::dispatch($ip, $ua)->onQueue('parsing');

        return redirect()->route('home');
    }

//    public function index(UserAgentServiceInterface $agentService)
//    {
//        $ip = request()->ip();
//        if ($ip == '127.0.0.1') {
//            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
//        }
//        $ua = request()->userAgent();
//        $agentService->parse($ua);
//        $browser = $agentService->browser();
//        $os = $agentService->os();
//        Visit::create([
//            'ip' => $ip,
//            'browser' => $agentService->browser(),
//            'os' => $agentService->os(),
//        ]);
//        dd($ip, $os, $browser);
//    }
}
