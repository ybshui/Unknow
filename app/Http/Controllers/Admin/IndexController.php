<?php

namespace App\Http\Controllers\Admin;

use App\Models\Articles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
	public function index()
	{
		return view('admin.index.index');
	}
	
	public function insert(Request $request)
	{
		$articles = [];
		
		$articles['title'] = $request->input('title');
		$articles['content'] = $request->input('content');
		
		Articles::insert($articles);
		
		redirect()->route('admin.index');
	}
}
