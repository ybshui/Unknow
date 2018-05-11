<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    //
	
	public function lists(Request $request)
	{
		return view('admin.photos.list');
	}
	
	public function upload()
	{
		return view('admin.photos.upload');
	}
}
