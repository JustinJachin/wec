<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Type;
use app\index\model\Article as ArticleModel;
use think\Request;
class Article extends Controller{
    public function index(){
        $type=Type::select();
        $map=[
            ['status','=',1],
            ['typeId','>',0],
        ];
        $maps=[
            ['status','=',1],
            ['flag','=',1],
        ];
        $article=ArticleModel::where($map)->select();
        $slide=ArticleModel::where($maps)->select();

        $list=array();
        foreach ($type as $key => $value) {
            $flag=0;
            foreach ($article as $k => $v) {
                if($value['id']==$v['typeId']){
                    
                    $list[$key]['article'][$k]['title']=$v['title'];
                    $list[$key]['article'][$k]['id']=$v['id'];
                    $list[$key]['article'][$k]['picture']=$v['picture'];
                    $flag=1;
                }
            }
            if($flag===0){
                $list[$key]['article']=''; 
            }
            $list[$key]['id']=$value['id'];
            $list[$key]['name']=$value['name'];
        }

        $this->assign('lista',$list);
        $this->assign('slide',$slide);
        return view();
    }
    public function detail(Request $request){
        $id=$request->param('id');
        if(empty($id)){
            $this->error('参数错误');
        }

        ArticleModel::where('id', $id)->setInc('read');
        $article=ArticleModel::where('id='.$id)->find();
        $this->assign('content',$article);
        return view();
    }
    public function article(){
        $map=[
            ['status','=',1],
        ];
        $article=ArticleModel::where($map)->select();
        $this->assign('list',$article);
        return view();
    }
}
