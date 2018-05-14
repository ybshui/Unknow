<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
	protected $connection = 'S1';
	
	protected $table = 'articles';
	
	public $timestamps = false;
}
