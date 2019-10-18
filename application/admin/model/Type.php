<?php

// +----------------------------------------------------------------------
// | Author: jachin <jachin@qq.com> <https://github.com/JustinJachin/rbac>
// +----------------------------------------------------------------------

namespace app\admin\model;


use think\Model;


/**
 * 管理员模型
 * @author jachin <jachin@qq.com>
 */
class Type extends Model
{
    public function article(){
        return $this->hasMany('Article');
    }
    
}