<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Services\Geo\UserAgentServiceInterface;
use Illuminate\Support\Facades\Mail;

class GeoIpController extends Controller
{

    public function index(UserAgentServiceInterface $reader)
    {
                $ip = '94.179.237.248';
        if ($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }
        $browser = $reader->browser();
        $os = $reader->os();
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
