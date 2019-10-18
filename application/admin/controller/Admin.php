<?php
// +----------------------------------------------------------------------
// | Author: jachin <jachin@qq.com> <https://github.com/JustinJachin/rbac>
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\controller\Base;
use app\admin\model\Admin as AdminModel;
use think\Request;
use app\admin\validate\Admin as AdminValidate;
use app\admin\model\Role;
use app\admin\model\AdminRole;
use app\admin\model\Icon;
/**
 * 管理员控制器
 * @author jachin <jachin@qq.com>
 */

class Admin extends Base 
{
	/**
     * @description 管理员列表页
     * @author jachin  2019-07-29
     */
	public function index(){
		$keyword=input('get.keyword');
		$type=input('get.types');
		$pageParam    = ['query' =>[]];

		if($keyword){
			$pageParam['query']['keyword'] = $keyword;
			$pageParam['query']['types'] = $type;
		}
		if($type){
			$map=[
				['status','<',2],
				['email','like',"%{$keyword}%"],
			];
		}else{
			$map=[
				['status','<',2],
				['name','like',"%{$keyword}%"],
			];
		}
		

		$list=AdminModel::where($map)->order('id')->paginate(10,false,$pageParam);//每页查询10条数据

		$page=$list->render();
		$this->assign('users',$list);

		$this->assign('page',$page);
		$this->assign('keyword',$keyword);
		$this->assign('types',$type);

		return view('index');
	}

	/**
     * @description 管理员禁用与启用
     * @author jachin  2019-07-30
     */
	public function addRole(Request $request){
		if(Request()->isPost()){
			$role=input('post.');
			$id=$role['id'];
			unset($role['id']);
			$data=implode('，',$role);
			
			$adminRole=AdminRole::where('uid',$id)->find();
			if($adminRole){
				$adminRole->role_id=$data;
				$res=$adminRole->save();
			}else{
				$map=array(
					'uid'=>$id,
					'role_id'=>$data,
					'create_time'=>time(),
				);
				$res=AdminRole::create($map);
			}
			if($res){
				get_log('add',\session('uid'),'给账号id为'.$id.'成功授予了角色');
				$status=array(
					'status'=>1,
					'msg'=>'给该账号成功授予了角色'
				);
			}else{
				$status=array(
					'status'=>0,
					'msg'=>'给该账号授予了角色失败'
				);
			}
			return json($status);
		}else{
			$id=$request->param('id');
			$data=array();

			$role=Role::where('status',1)->field("id,name,description")->select();
			$admin_role=AdminRole::where('uid',$id)->field('role_id')->find();
			$data=explode('，',$admin_role['role_id']);
			$count = count($role);
			foreach ($role as $key => $value) {
				if($key%4===0){
					$value['lineFeed']=1;
				}else{
					$value['lineFeed']=0;
				}
				if($key%4==3||$key==$count-1){
					$value['lineEnd']=1;
				}else{
					$value['lineEnd']=0;
				}
				if(in_array($value['id'], $data)){
					$value['flat']=1;
				}else{
					$value['flat']=0;
				}
			}
			$this->assign('id',$id);
			$this->assign('role',$role);
			return view('editRole');
		}
	}


	/**
     * @description 个人信息修改
     * @author jachin  2019-07-30
     */
	public function edit(Request $request){
		if(Request()->isPost()){
			$data['status']=0;
			$user=input('post.');
			switch($user['sex']){
				case '0':$sexs='女';break;
				case '1':$sexs='男';break;
				case '2':$sexs='保密';break;
			};
			$res=array();
			$admin=AdminModel::where('id',session('uid'))->find();
			
			$adminValidate=new AdminValidate();
			if($admin['name']!=$user['name']){
				$name=$adminValidate->scene('personName')->check($user);
				if(!$name){
					$data['msg']=$adminValidate->getError();
					return json($data);
				}
				$res['name']=$user['name'];
			}
			if($admin['sex']!=$sexs){
				
				$sex=$adminValidate->scene('personSex')->check($user);
				if(!$sex){
					$data['msg']=$adminValidate->getError();
					return json($data);
				}
				$res['sex']=$user['sex'];
			}
			if($admin['email']!=$user['email']){
				$email=$adminValidate->scene('personEmail')->check($user);
				if(!$email){
					$data['msg']=$adminValidate->getError();
					return json($data);
				}
				$res['email']=$user['email'];
			}
			if($user['password']){
				
				$password=$adminValidate->scene('personPassword')->check($user);
				if(!$password){
					$data['msg']=$adminValidate->getError();
					return json($data);
				}
				$res['password']='on'.md5('on'.md5($user['password']));   ;
			}
			
			if(empty($res)){
				$data['msg']='您未填写任何信息，如需修改，请填写信息提交即可';
				return json($data);
			}
			$result=AdminModel::where('id',session('uid'))->update($res);
			if($result){
				get_log('update',\session('uid'),'修改了id为'.$res['id'].'的账号信息');
				$data=array(
					'status'=>1,
					'msg'=>'修改成功'
				);
			}else{
				$data['msg']='修改失败';
			}
			return json($data);
		}else{
			$id=session('uid');
			$user=AdminModel::where('id',$id)->find();
			$this->assign('user',$user);
			return view('personEdit');
		}
	}
	/**
     * @description 管理员修改密码
     * @author jachin  2019-07-30
     */
	public function editPass(Request $request){
		if(Request()->isPost()){
			$data['status']=0;
			$password=input('post.password');
			$id=input('post.id');
			$pwd=array(
				'password'=>$password,
			);
			if(empty($password)){
				$data['msg']='密码为空';
				return json($data);
			}
			$adminValidate=new AdminValidate();
			//验证数据是否合法
			$result=$adminValidate->scene('editPass')->check($pwd);
			if(!$result){
				$data['msg']=$adminValidate->getError();
			}else{
				$admin=AdminModel::where('id',$id)->find();
				$admin->password='on'.md5('on'.md5($password));//密码加密
				$admin->update_time=time();//密码加密
				$res=$admin->save();
				if($res){
					get_log('update',\session('uid'),'修改了id为'.$res['id'].'账号的密码');
					$data=array(
						'status'=>1,
						'msg'=>'修改成功'
					);
				}else{
					$data['msg']='修改失败';
				}
			}
			return json($data);

		}else{
			$id=$request->param('id');
			$data=AdminModel::where('id',$id)->field('id,name')->find();
			$this->assign('user',$data);
			return view('edit');
		}
		
	}
	
	/**
     * @description 管理员批量删除
     * @author jachin  2019-07-30
     */
	public function deletes(Request $request){
		
		/*$str = file_get_contents('E:\phpStudy\PHPTutorial\WWW\tp5rbac\public\Kharna_Admin\icons-fontawesome.html');

		$reg1='/data-toggle=\"tooltip\" title=\"(.*?)\".*?>(.*?)<\/li>/i';//匹配所有A标签

		preg_match_all($reg1,$str,$aarray);
		// print_r($aarray[1]);
		$arr=[];
		foreach ($aarray[1] as $key => $value) {
			
			$arr[]=[
				// 'id'=>$i,
				'name'=>$value,
				'create_time'=>time(),
			];
			
		}
		// var_dump($arr);exit;
		$icon=new Icon();
		$res=$icon->saveAll($arr);
		exit;*/
		$data['status']=0;
		$ids=$request->param('check_val');
		// var_dump($ids);exit;
		if(!$ids){
			$data['msg']='你未选择任何选项，请选择后再提交！';
			return json($data);
		}
		foreach($ids as &$k){
			$k=intval($k);
			$msg=$this->is_admin_oneself($k);
			if($msg){
				$data['msg']=$msg;
				return json($data);
			}
		}
		$map=array();
		foreach ($ids as $key => $value) {
			$map[$key]=['id'=>$value,'status'=>2];
		}
		$admin=new AdminModel();
		$res=$admin->saveAll($map);
		if($res){
			get_log('deletes',\session('uid'),'批量删除了id为'.implode(',',$ids).'的账号信息');
			$data['status'] = 1;
			$data['msg']    = '删除成功';
		}else{
			$data['msg']    = '删除失败';
		}
		return json($data);

	}

	/**
     * @description 管理员禁用与启用
     * @author jachin  2019-07-30
     */
	public function store(Request $request){
       	$data['status']=0;
        $id= intval($request->param('id'));
        $method=$request->param('method');

        $msg=$this->is_admin_oneself($id);
        if($msg){
        	$data['msg']=$msg;
        	return json($data);
        }

		$admin=AdminModel::where('id',$id)->find();
		if($method==='start'){
			$admin->status =1;
		}else{
			$admin->status =0;
		}
		$res=$admin->save();
		if($res){

			if($method==='start'){
				$msg='启用成功';
			}else{
				$msg='禁用成功';
			}
			$data=array(
				'status' => 1,
				'msg'    => $msg
			);
		}else{
			if($method==='start'){
				$msg = '启用失败';
			}else{
				$msg = '禁用失败';
			}
			$data['msg'] = $msg;
		}
		return json($data);
	}
	/**
     * @description 管理员删除
     * @author jachin  2019-07-29
     */
	public function delete(Request $request){
		$data['status']=0;
		$id=intval($request->param('id'));
		if(empty($id)){
			$data['msg']='您重新选择';
			return json($status);
		}
		$msg=$this->is_admin_oneself($id);
        if($msg){
        	$data['msg']=$msg;
        }else{
        	$admin=AdminModel::where('id',$id)->find();
			$admin->status=2;
			$admin->delete_time=time();
			$res=$admin->save();
			if($res){
				get_log('delete',\session('uid'),'删除了id为'.$id.'的账号信息');
				$data['status'] = 1;
				$data['msg']    = '删除成功';
				
			}else{
				$data['msg']    = '删除失败';
			}
        }
		return json($data);
	}
	/**
     * @description 查看该账号是否为超级管理员帐号或者是否为自己账号
     * @param  int    $id 要操作的用户id
     * @author jachin  2019-07-29
     */
	public function is_admin_oneself($id){
		$data='';
		if($id===1){
        	$data='该账号是超级管理员，无法对其操作';
        }
        if($id===session('uid')){
        	$data='无法对自己账号操作';
        }
        return $data;
	}
	/**
     * @description 管理员添加页面以及处理
     * @author jachin  2019-07-29
     */
	public function add(){

		//判断页面是否有数据提交

		if(Request()->isPost()){
			//初始化$res
			$status=array(
				'status'=>0,
				'msg'=>'添加失败'
			);
			//获取前台提交的数据
			$data=input('post.');
			
			$adminValidate=new AdminValidate();
			//验证数据是否合法
			$result=$adminValidate->check($data);
			if(!$result){
				$status=array(
					'status'=>0,
					'msg'=>$adminValidate->getError()
				);
			}else{
				$data['password']='on'.md5('on'.md5($data['password']));//密码加密
				unset($data['password_confirm']);//剔除重复密码
				$res=AdminModel::create($data);//加入数据库
				if($res){
					get_log('add',\session('uid'),'添加了id为'.$res['id'].'的账号信息');
					$status=array(
						'status'=>1,
						'msg'=>'添加成功'
					);
				}
			}
			//返回json格式数据
			return json($status);

		}else{
			//页面展示
			return view('add');
		}
		
	}
}