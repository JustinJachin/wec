<?php
// +----------------------------------------------------------------------
// | Author: jachin <jachin@qq.com> <https://github.com/JustinJachin/rbac>
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\model\Permission;
use think\Controller;
use think\facade\Request;
use app\admin\model\Module;
use think\Session;

/**
 * 后台基类控制器
 * @author jachin <jachin@qq.com>
 */
class Base extends Controller
{
    /**
     * @description 初始化
     * @author jachin  2019-07-29
     */
    public function initialize(){
        
        $this->is_login();
       

    }
    /**
     * @description 登录判断
     * @author jachin  2019-07-29
     */
    public function is_login(){
        $uid = session('uid');
        // var_dump($uid);exit;
        if(!$uid){
         $this->error('您没有登录无法访问，请登录账号！','login/index');
        }
    }
    /**
     * @description 获取菜单
     * @author jachin  2019-07-29
     */
    public function getMenu(){
        $menu = new Permission();
        $res  = $menu->getMenu();
        $this->assign('menu',$res);
    }
   
}