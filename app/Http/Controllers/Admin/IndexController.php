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
	
	public function articles()
	{
		$articles = Articles::orderBy('create_time', 'desc')->paginate(10);
		
		
		return view('admin.index.articles', ['articles' => $articles]);
	}
	
	public function create(Request $request)
	{
		$articles = [];
		
		$articles['title'] = $request->input('title');
		$articles['content'] = $request->input('content');
		$articles['tags'] = implode(',', $request->input('tags'));
		$articles['summary'] = $request->input('summary');
		$articles['image_path'] = $request->input('image_path');
		$articles['create_time'] = date('Y-m-d H:i:s');
		Articles::insert($articles);
		
		return redirect()->route('admin.articles');
	}
	
	public function view(Request $request)
	{
		$id = $request->input('id');
		
		$article = Articles::where('id', $id)->first();
		
		return view('admin.index.view', ['article' => $article]);
	}
	
	public function update(Request $request)
	{
		$id = $request->input('id');
		
		$article = Articles::where('id', $id)->first();
		
		$tags = Tags::orderBy('id')->get(['id', 'tag']);
		
		return view('admin.index.update', ['article' => $article, 'tags' => $tags]);
	}
	
	public function edit(Request $request)
	{
		$id = $request->input('id');
		$articles = [];
		
		$articles['title'] = $request->input('title');
		$articles['content'] = $request->input('content');
		$articles['tags'] = implode(',', $request->input('tags'));
		$articles['summary'] = $request->input('summary');
		$articles['image_path'] = $request->input('image_path');
		$articles['update_time'] = date('Y-m-d H:i:s');
		Articles::where('id', $id)->update($articles);
		
		return redirect()->route('admin.articles');
	}
}
