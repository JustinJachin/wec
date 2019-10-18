<?php

namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\User as UserModel;
class User extends Base{
	public function index(){
		return view('index');
	}
	public function update(){
		$data=input('post.');
		// var_dump($data);
		if(empty($data['password'])||empty($data['passwordtwo'])){
			$res = [
				'status'=>0,
				'msg'=>'密码为空，请确认后再提交'
			];
			return json($res);
		}
		if($data['password']===$data['passwordtwo']){

			$user= new UserModel();
			$password='wc'.md5($data['password'].'wc');
			$result=$user->save(['password'=>$password],['id'=>$data['id']]);
			if($result){
				$res = [
					'status'=>1,
					'msg'=>'修改成功！'
				];
			}else{
				$res = [
					'status'=>0,
					'msg'=>'修改失败！'
				];
			}
		}else{
			$res = [
				'status'=>0,
				'msg'=>'密码不一致，请重新填写！'
			];
		}
		return json($res);
	}
}