<?php

namespace App\Jobs\Users;

use App\Models\Nas;
use App\Models\Radacct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Process\Process;

class doKickUserHotspotJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $radacctid;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($radacctid)
    {
        $this->radacctid = $radacctid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $radacct = Radacct::where('radacctid', '=', $this->radacctid)->first();
        if(count($radacct)>0){
            $username = $radacct->username;
            $ip = $radacct->framedipaddress;
            $nas_ip = $radacct->nasipaddress;
            $get_nas_data = Nas::where('nasname', '=', $nas_ip)->first();
            $nas_secret = $get_nas_data->secret;
            $this->doKick($username, $ip, $nas_ip, $nas_secret);
        }
    }


    private function doKick($username, $ip, $nas_ip, $nas_secret)
    {
        $user = env('USER_SYSTEM_OS');
        $envoy_path = '/home/'.$user.'/.config/composer/vendor/bin/envoy run';
        $envoy_param =  "--username=".$username." --ip=".$ip." --nas_ip=".$nas_ip." --nas_secret=".$nas_secret;  
        $process = new Process($envoy_path." kickUser ".$envoy_param);

        // $process = new Process('/home/reka/.config/composer/vendor/bin/envoy run ls');
        $process->setTimeout(3600);
        $process->setIdleTimeout(300);
        $process->setWorkingDirectory(base_path());
        $process->run(function ($type, $buffer)
        {
            \Log::info($buffer );
            //print output
        });        
    }
}
