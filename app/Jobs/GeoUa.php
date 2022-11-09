<?php

namespace App\Jobs;

use App\Models\Visit;
use Hillel\GeoInterface\GeoServiceInterface;
use Hudzhal\UserAgent\UserAgentServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeoUa implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ip;
    protected $ua;

    /**
     * Create a new job instance.
     *
     * @param  string  $ip
     * @param  string  $ua
     */
    public function __construct( string $ua, string  $ip)
    {
        $this->ip = $ip;
        $this->ua = $ua;
    }

    /**
     * Execute the job.
     *
     * @param  UserAgentServiceInterface  $agentService
     *
     * @return void
     */
    public function handle(UserAgentServiceInterface $agentService)
    {
        $agentService->parse($this->ua);

        Visit::create([
            'ip'             => $this->ip,
            'browser'        => $agentService->browser(),
            'os'             => $agentService->os(),
        ]);
    }
}
