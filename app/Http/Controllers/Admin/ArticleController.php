<?php

namespace App\Http\Controllers\Admin;

use App\Models\Articles;
use App\Models\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	
	public function write()
	{
		$tags = Tags::orderBy('id')->get(['id', 'tag']);
		
		return view('admin.articles.write', ['tags' => $tags]);
	}
	
	/**
	 * 文章列表
	 *
	 * @return mixed
	 */
	public function articles()
	{
		$articles = Articles::where('delete', 0)->orderBy('create_time', 'desc')->paginate(10);
		
		$tags = Tags::orderBy('id')->get(['id', 'tag']);
		
		$class_arr = ['label-success', 'label-info', 'label-warning', 'label-danger'];
		
		foreach ($articles as $key => $article) {
			$str = '';
			foreach ($tags as $tag) {
				if (strstr($article->tags, (string)$tag->id) !== false) {
					$str .= "<span class='label " . $class_arr[($tag->id - 1)] ."'>". $tag->tag ."</span> ";
				}
			}
			
			$articles[$key]->tags = $str;
		}
		
		return view('admin.articles.new_articles', ['articles' => $articles]);
	}
	
	/**
	 * 保存文章
	 *
	 * @param Request $request
	 *
	 * @return mixed
	 */
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
	
	/**
	 * 预览文章
	 *
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function view(Request $request)
	{
		$id = $request->input('id');
		
		$article = Articles::where('id', $id)->first();
		
		return view('admin.articles.view', ['article' => $article]);
	}
	
	public function update(Request $request)
	{
		$id = $request->input('id');
		
		$article = Articles::where('id', $id)->first();
		
		$tags = Tags::orderBy('id')->get(['id', 'tag']);
		
		return view('admin.articles.update', ['article' => $article, 'tags' => $tags]);
	}
	
	/**
	 * 更新文章
	 *
	 * @param Request $request
	 *
	 * @return mixed
	 */
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
	
	/**
	 * 软删除
	 */
	public function delete(Request $request)
	{
		$id = $request->input('id');
		
		$articles = [];
		$articles['delete'] = 1;
		
		Articles::where('id', $id)->update($articles);
		
		return redirect()->route('admin.articles');
	}
	
}
