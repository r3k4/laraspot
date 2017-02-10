<?php

namespace App\Jobs\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\Process\Process;

class doKickUserHotspotJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $username;
    public $ip;
    public $nas_ip;
    public $nas_secret;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($username, $ip, $nas_ip, $nas_secret)
    {
        $this->username = $username;
        $this->ip = $ip;
        $this->nas_ip = $nas_ip;
        $this->nas_secret = $nas_secret;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->doKick();
        // SSH::run(array(
        //     'echo User-Name='
        //     .$username.',Framed-IP-Address='
        //     .$ip.'|/usr/bin/radclient -x '
        //     .$nas_ip.':1700 disconnect '
        //     .$nas_secret,
        // ));    
            
    }


    private function doKick()
    {
        $user = env('USER_SYSTEM_OS');
        $envoy_path = "/home/".$user."/.config/composer/vendor/bin/envoy run";
        $envoy_param =  "--username=".$this->username." --ip=".$this->ip." --nas_ip=".$this->nas_ip." --nas_secret=".$this->nas_secret;  
        $process = new Process($envoy_path." kickUser ".$envoy_param);
        $process->setTimeout(3600);
        $process->setIdleTimeout(300);
        $process->setWorkingDirectory(base_path());
        $process->run(function ($type, $buffer)
        {
            \Log::info(json_encode($buffer));
            //print output
        });        
    }
}
