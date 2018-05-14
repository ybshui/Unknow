<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    //
	
	public function lists()
	{
		return view('admin.photos.list');
	}
	
	public function upload()
	{
		return view('admin.photos.upload');
	}
	
	public function store(Request $request)
	{
		dd($request->input());
	}
}
