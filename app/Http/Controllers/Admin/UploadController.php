<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //
	private $file = [];
	
	public function uploadImage(Request $request)
	{
		if ($_POST) {
			//上传图片具体操作
			$this->file = $_FILES['file'];
			
			$file_name = $this->file['name'];
			//$file_type = $this->file["type"];
			$file_tmp = $this->file["tmp_name"];
			$file_error = $this->file["error"];
			$file_size = $this->file["size"];
			
			if ($file_error > 0) { // 出错
				$message = $file_error;
			} elseif($file_size > 1048576) { // 文件太大了
				$message = "上传文件不能大于1MB";
			}else{
				$status = 0;
				$path = "upload/images/";
				$file_path = $path . $file_name;
				echo $file_path;
				// 判断当前的目录是否存在，若不存在就新建一个!
				if (!is_dir($path)){
					mkdir($path, 0777);
				}
				
				//此函数只支持 HTTP POST 上传的文件
				$upload_result = move_uploaded_file($file_tmp, $file_path);
				
				if ($upload_result) {
					$status = 1;
					$message = $file_path;
				} else {
					$message = "文件上传失败，请稍后再尝试";
				}
			}
		} else {
			$message = "参数错误";
		}
		
		return $this->showMsg($status, $message);
	}
	
	public function deleteImage(Request $request)
	{
		$file_path = $request->file_path;
		
		exec("rm -rf /www/wechatapi/public/{$file_path}", $out, $status);
		
		if ($status == 0) {
			$message = "删除成功";
		} else {
			$message = "删除失败";
		}
		
		return $this->showMsg($status, $message);
	}
	
	private  function showMsg($status,$message = '',$data = array()){
		$result = array(
			'status' => $status,
			'message' =>$message,
			'data' =>$data
		);
		exit(json_encode($result));
	}
}
