<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nas extends Model{

	 protected $guarded = array();
	 protected $table = 'nas';
	 public $timestamps = false;

	 protected $hidden = [
	 	'password_mikrotik',
	 	'user_mikrotik',
	 	'secret'
	 ];
 

 


}