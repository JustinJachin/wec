<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Type as TypeModel;
class Type extends Base{
	public function index(){
		$type=TypeModel::paginate(10);
		$page=$type->render();
		$this->assign('volist',$type);
		$this->assign('page',$page);
		return view('index');
	}
	public function add(){
		if(request()->isPost()){
			$data=input('post.');
			$type=new TypeModel();
			$type->name=$data['name'];
			$res=$type->save();
			if($res){
				$status=['status'=>1,'msg'=>'添加成功！'];
			}else{
				$status=['status'=>0,'msg'=>'添加失败！'];
			}
			return json($status);
		}else{
			return view('add');	
		}
		
	}
	public function del(){
		$id=request()->param('id');
		if(empty($id)){
			$status=['status'=>0,'msg'=>'请选择数据'];
			return json($status);
		}
		$res=TypeModel::destroy($id);
		if($res){
			$status=['status'=>1,'msg'=>'删除成功！'];
		}else{
			$status=['status'=>0,'msg'=>'删除失败！'];
		}
		return json($status);
	}
	public function edit(){
		if(request()->isPost()){
			$res=input('post.');
			$type=new TypeModel();
			$result=$type->save(['name'=>$res['name']],['id'=>$res['id']]);
			if($result){
				$status=['status'=>1,'msg'=>'修改成功！'];
			}else{
				$status=['status'=>0,'msg'=>'修改失败！'];
			}
			return json($status);
		}else{
			$id=request()->param('id');
			$data=TypeModel::where('id='.$id)->find();
			$this->assign('list',$data);
			return view('edit');
		}
	}

}