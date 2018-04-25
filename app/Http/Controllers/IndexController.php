<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
	public function index()
	{
		return view('index.index');
	}
	
	public function show()
	{
		$articles = Articles::orderBy('id')->get(['title', 'content']);
		
		return view('index.show', ['articles' => $articles]);
	}
}
