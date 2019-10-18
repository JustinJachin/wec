<?php

// +----------------------------------------------------------------------
// | Author: jachin <jachin@qq.com> <https://github.com/JustinJachin/rbac>
// +----------------------------------------------------------------------

namespace app\admin\model;


use think\Model;
use think\Session;
use think\facade\Validate;

/**
 * 管理员模型
 * @author jachin <jachin@qq.com>
 */
class User extends Model
{
    
    /**
     * @description  获取器获取状态，重新赋值
     * @param  int    $value
     * @return string 
     * @author jachin  2019-07-29
     */
    public function scopeStatus($query){

      $query->where('status','<',2);

    }
    /**
     * @description  获取器获取状态，重新赋值
     * @param  int    $value
     * @return string 
     * @author jachin  2019-07-29
     */
    public function getStatusAttr($value){

      $status=[2=>'删除',0=>'禁用',1=>'正常'];

      return $status[$value];

    }
    

    /**
     * @description  获取器获取时间，重新赋值
     * @param  int    $value
     * @return string 
     * @author jachin  2019-07-29
     */
    public function getLogin_timeAttr($value){

      if($value)

        $login_time=date('Y-m-s h:i:s',$value);

      else

        $login_time='暂无登录';

      return $login_time;

    }

    /**
     * @description  登录验证
     * @param  string $name 用户名 string $pwd 密码 
     * @return bool 正确返回1错误返回0
     * @author jachin  2019-07-29
     */
    public function check($name,$pwd){
    
      $user=User::where('username',$name)->find();
      
      if(empty($user)){
        $status=[
          'status'=>1,
          'msg'=>'账号或者密码错误'
        ];
      }
      if($user['status']!='正常'){
        $status=[
          'status'=>2,
          'msg'=>'该用户被禁用或删除'
        ];
      }
      $res=$this->loginRepeat($user['id']);
      if($res){
        $status=[
            'status'=>4,
            'msg'=>'您账号已登录，请勿重复登录'
          ];
      }
      if('wc'.md5($pwd.'wc')===$user['password']){
        $status=[
          'status'=>0,
          'msg'=>'登录成功'
        ];
        \session('uid',$user['id']);
        \session('admin_name',$user['username']);

       }else{
          $status=[
            'status'=>1,
            'msg'=>'账号或者密码错误'
          ];
          
       }
      return $status;
    }
    /**
     * @description 判断是否重复登录
     * @param  string $id 用户id
     * @author jachin  2019-08-21
     */
    public function loginRepeat($id){
      $uid=session('uid');
      if($id==$uid){
        return true;
      }
      return false;
    }
    /**
     * @description  更新登录信息
     * @param  string $ip ip地址
     * @author jachin  2019-07-29
     */
    public function updateLogin($ip){

      $data=array(

        'login_time' => time(),

        'login_ip'   => $ip,

      );

      $userId=session('uid');
      
      User::save($data,['id'=>$userId]);
    }
    
    
}