<?php

namespace App\Jobs;

use App\Services\Users\doRegisterUserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class importUsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $lokasi_file;
    public $nama_profile;

    public function __construct($lokasi_file, $nama_profile)
    {
        $this->lokasi_file = $lokasi_file;
        $this->nama_profile = $nama_profile;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $data = new \Reader($this->lokasi_file);
        $a = $data->rowcount($sheet_index = 0);

        for ($i = 1;$i <= $a;++$i) {
            if ($i > 2 && $i <= $a) {
                $no = trim($data->val($i, 'B')); //  nama
                $no2 = trim($data->val($i, 'C')); //  username
                $no3 = trim($data->val($i, 'D')); //  Password
              if ( $no != null && $no2 != null ) {
                // $data_insert = [
                //     'nis'   => $no,
                //     'nama'  => $no2,
                //     'ref_thn_angkatan_id'   => $this->ref_thn_angkatan_id
                // ];
                // Siswa::create($data_insert);
                $username = $no2;
                $nama = $no;
                $password = $no3;

                $registerUserService = new doRegisterUserService;
                $registerUserService->insertDataUser($username, $password, $this->nama_profile, $nama, $priority = 8, $keterangan = '');


              } else {
                  //jika ada kolom yg kurang
                    \Log::alert(' ada kolom yg belum terisi, lokasi file : '.$this->lokasi_file);
              }
            } //if setelah for (keterangan template)

          if ($i == $a) {
              //hapus file tmp
                if(file_exists($this->lokasi_file)){
                    unlink($this->lokasi_file);
                }
          }

        }//for               
    }
}
