<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class photoBooks extends Model
{
    //
	protected $connection = 'S1';
	
	protected $table = 'photo_book';
	
	public $timestamps = false;
}
