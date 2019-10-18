<?php
namespace app\index\model;
use think\Model;
class Article extends Model{
    public function check($data){
        $status='';
        if(empty($data['title'])){
            $status=['status'=>0,'msg'=>'请输入文章标题'];
        }
        
        if(!array_key_exists('imgs',$data)){
            $status=['status'=>0,'msg'=>'请上传缩略图'];
        }
        if(empty($data['editordata'])){
            $status=['status'=>0,'msg'=>'请输入文章内容'];
        }
        return $status;
    }
}