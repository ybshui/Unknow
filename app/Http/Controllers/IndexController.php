<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
	public function index()
	{
		$articles = Articles::orderBy('id')->get(['title', 'content']);
		
		return view('articles.articles', ['articles' => $articles]);
	}
}
