<?php

namespace App\Http\Controllers\Admin;

use App\Models\photoBooks;
use App\Models\Photos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;

class PhotoController extends Controller
{
    //
	protected $makeImagePath = 'upload/images/makeImages';
	
	public function __construct()
	{
		//$this->middleware('auth');
	}
	
	public function lists(Request $request)
	{
		dd(decrypt(111111));
		
		$books = photoBooks::get();
		
		$pid = $request->input('book');
		
		if ($pid == '')
			$pid = 1;
		$photos = Photos::where('pid', $pid)->get();
		
		foreach ($photos as $key => $photo) {
			$photos[$key]->small_photo_path = $this->make_image($photo->photo_path, $photo->photo_name);
		}
		
		return view('admin.photos.list', ['books' => $books, 'photos' => $photos, 'pid' => $pid]);
	}
	
	public function upload()
	{
		return view('admin.photos.upload');
	}
	
	public function store(Request $request)
	{
		$book = $request->input('book');
		
		$description = $request->input('description');
		
		$photo_path = $request->input('photo_path');
		
		$photo_arr = explode(',', $photo_path);
		
		$pid = photoBooks::where('name', $book)->first(['id']);
		
		$insert_data = [];
		foreach ($photo_arr as $key => $val) {
			$arr = explode('/', $val);
			$insert_data[$key]['pid'] = $pid->id;
			$insert_data[$key]['description'] = $description;
			$insert_data[$key]['photo_path'] = $val;
			$insert_data[$key]['photo_name'] = array_pop($arr);
		}
		Photos::insert($insert_data);
		
		return redirect()->route('admin.photos.list')->with('success', '保存成功');
		
	}
	
	private function make_image($path, $photo_name)
	{
		$make_image_name = "small_" . $photo_name;
		
		if (file_exists($this->makeImagePath ."/". $make_image_name)) {
			return $this->makeImagePath ."/". $make_image_name;
		}
		
		$image_manager = new ImageManager();
		
		$image_info = getimagesize($path);
		
		$img = $image_manager->make($path)->resize($image_info[0] * 0.2, $image_info[1] * 0.2);
		
		$res = $img->save($this->makeImagePath ."/". $make_image_name);
		
		return $res->dirname ."/". $res->basename;
	}
}
