<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class Updateimg extends Base{
	public function updateImage(){
		$file=\request()->file('image');
		$info=$file->validate(['ext'=>'jpg,png,gif'])->rule('md5')->move( '../public/static/uploads/');
		if($info){
            $fileName = $info->getSaveName();
            $msg = "/uploads/".$fileName;
            $status=[
            	'status'=>1,
            	'msg'=>'上传成功！',
            	'info'=>$msg,
            ];
        }else{
            // 上传失败获取错误信息
            $status=[
            	'status'=>1,
            	'msg'=>$file->getError(),
            ];
        }
        return json($status);
	}
}