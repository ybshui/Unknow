<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\photoBooks;
use App\Models\Photos;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
	public function index()
	{
		
		$articles = $this->articles();
		
		$photos = $this->photos();
		
		$photoBooks = $this->photo_book();
		
		return view('index.index', ['articles' => $articles, 'photos' => $photos, 'photoBooks' => $photoBooks]);
	}
	
	public function article_show(Request $request)
	{
		$article = Articles::where('id', $request->input('id'))->first();
		return view('index.show', ['article' => $article]);
	}
	
	public function ajax_photos(Request $request)
	{
		$photos = $this->photos($request->input('pid'));
		
		return ['status' => 1, 'data' => $photos];
	}
	
	private function photos($book = '')
	{
		if ($book == '')
			$book = 1;
		
		$photos = Photos::where('pid', $book)->orderBy('id')->get();
		
		return $photos;
	}
	
	private function articles()
	{
		$articles = Articles::orderBy('id')->get();
		
		return $articles;
	}
	
	private function photo_book()
	{
		$photoBooks = photoBooks::orderBy('id')->get();
		
		return $photoBooks;
	}
}
