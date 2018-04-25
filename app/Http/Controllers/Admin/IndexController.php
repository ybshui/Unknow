<?php

namespace App\Http\Controllers\Admin;

use App\Models\Articles;
use App\Models\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
	public function index()
	{
		$tags = Tags::orderBy('id')->get(['id', 'tag']);
		
		
		return view('admin.index.index', ['tags' => $tags]);
	}
	
	public function create(Request $request)
	{
		$articles = [];
		
		$articles['title'] = $request->input('title');
		$articles['content'] = $request->input('content');
		$articles['tags'] = implode(',', $request->input('tags'));
		
		
		Articles::insert($articles);
		
		return redirect()->route('admin.index');
	}
}
