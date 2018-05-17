<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    //
	protected $connection = 'S1';
	
	protected $table = 'photos';
	
	public $timestamps = false;
}
