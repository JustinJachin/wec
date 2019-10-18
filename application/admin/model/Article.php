<?php
namespace app\admin\model;
use think\Model;
class Article extends Model{
	public function getFlagAttr($value){
		$flag=[0=>'否',1=>'是'];
		return $flag[$value];
	}
	public function type(){
		return $this->belongsTo('Type','typeId')->field('name');
	}
	public function check($data){
		$status='';
		if(empty($data['title'])){
			$status=['status'=>0,'msg'=>'请输入文章标题'];
		}
		
		if(!array_key_exists('imgs',$data)){
			$status=['status'=>0,'msg'=>'请上传缩略图'];
		}
		if(empty($data['content'])){
			$status=['status'=>0,'msg'=>'请输入文章内容'];
		}
		return $status;
	}
}