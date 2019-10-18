<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Article as ArticleModel;
use app\admin\model\Type;
use think\Request;
class Article extends Base {
	public function index(){
		$data=ArticleModel::where('status=1')->order('id desc')->paginate(5);
		foreach ($data as $key => $value) {
			$type=Type::where('id='.$value['typeId'])->field('name')->find();
			if($type){
				$data[$key]['typename']=$type['name'];
			}else{
				$data[$key]['typename']='暂无分类';
			}
			
		}
		// var_dump($data);exit;
		$page=$data->render();
		$this->assign('volist',$data);
		$this->assign('page',$page);
		return view('index');
	}
	public function add(){
		if(request()->isPost()){
			// $file = request()->file('img');
			$data=input('post.');

			$article=new ArticleModel();
			$res=$article->check($data);
			if($res){
				return json($res);
			}
			$data['picture']=$data['imgs'];
			
			unset($data['imgs']);

			// var_dump($data);exit;
			$result=$article->save($data);
			if($result){
				$status=['status'=>1,'msg'=>'新添文章成功!'];
			}else{
				$status=['status'=>0,'msg'=>'新添文章失败!'];
			}
			return json($status);
		}else{
			$type=Type::select();
			$this->assign('list',$type);
			return view('add');
		}
	}
	public function read(Request $request){
		$id=$request->param('id');
		if(empty($id)){
			$this->error('参数错误，请重新获取！');
		}
		// $article=new ArticleModel();
		$list=ArticleModel::where('id='.$id)->find();
		$this->assign('article',$list);
		return view();
	}
	public function edit(Request $request){
		if(request()->isPost()){
			$data=input('post.');

			$article=new ArticleModel();
			$res=$article->check($data);
			if($res){
				return json($res);
			}
			$data['picture']=$data['imgs'];
			$id['id']=$data['id'];
			unset($data['imgs']);
			unset($data['id']);
			// var_dump($data);exit;
			$result=$article->save($data,$id);
			if($result){
				$status=['status'=>1,'msg'=>'文章修改成功!'];
			}else{
				$status=['status'=>0,'msg'=>'文章修改失败!'];
			}
			return json($status);
		}else{
			$id=$request->param('id');
			if(empty($id)){
				$this->error('参数错误，请重新获取！');
			}
			$list=ArticleModel::where('id='.$id)->find();
			$type=Type::where('id='.$list['typeId'])->find();
			$list['typename']=$type['name'];
			// var_dump($list);exit;
			$types=Type::select();
			$this->assign('list',$types);
			$this->assign('article',$list);
			return view();
		}
	}
	public function del(Request $request){
		$id=$request->param('id');
		if(empty($id)){
			$status=['status'=>0,'msg'=>'参数错误！请重新选择'];
			return json($status);
		}
		$data['status']=0;
		$data['delete']=time();
		$article=new ArticleModel();
		$map['id']=$id;
		$result=$article->save($data,$map);
		if($result){
			$status=['status'=>1,'msg'=>'删除成功!'];
		}else{
			$status=['status'=>0,'msg'=>'删除失败!'];
		}
		return json($status);
	}
	public function store(Request $request){
       	$data['status']=0;
        $id= intval($request->param('id'));
        $method=$request->param('method');

       
        if(empty($id)||empty($method)){
        	$data['msg']='参数错误';
        	return json($data);
        }

		$article=ArticleModel::where('id',$id)->find();
		if($method==='start'){
			$article->flag =1;
		}else{
			$article->flag =0;
		}
		$res=$article->save();
		if($res){

			if($method==='start'){
				$msg='上架轮播成功';
			}else{
				$msg='下架轮播成功';
			}
			$data=array(
				'status' => 1,
				'msg'    => $msg
			);
		}else{
			if($method==='start'){
				$msg = '上架轮播失败';
			}else{
				$msg = '下架轮播失败';
			}
			$data['msg'] = $msg;
		}
		return json($data);
	}
}