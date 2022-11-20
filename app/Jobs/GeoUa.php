<?php

namespace App\Jobs;

use App\Models\Visit;
use Hudzhal\UserAgent\UserAgentServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeoUa implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ua;
    protected $ip;

    /**
     * Create a new job instance.
     *
     * @param string $ua
     */
    public function __construct(string $ip, string $ua)
    {
        $this->ip = $ip;
        $this->ua = $ua;
    }

    /**
     * Execute the job.
     *
     * @param UserAgentServiceInterface $agentService
     *
     * @return void
     */
    public function handle(UserAgentServiceInterface $agentService)
    {
        $agentService->parse($this->ua); // у тебе тут null приходить, із за того що у тебе намеє айпі

        Visit::create([
            'ip' => $this->ip,
            'browser' => $agentService->browser(),
            'os' => $agentService->os(),
        ]);
    }
}
