<?php

// +----------------------------------------------------------------------
// | Author: jachin <jachin@qq.com> <https://github.com/JustinJachin/rbac>
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\controller\Base;
use think\facade\Request;

/**
 * 后台首页控制器
 * @author jachin <jachin@qq.com>
 */
class Index extends Base
{
    /**
     * @description 后台首页
     * @author jachin  2019-07-29
     */
    public function index()
    {
        $appId=config('WEATHER_APPID');
        $appsecret=config('WEATHER_APPSECRET');
        //获取天气信息返回数据是json格式 87913429   JdzS9JIl
        // $weather=$this->getUrl("https://www.tianqiapi.com/api/?appid=".$appId."&appsecret=".$appsecret."&version=v1");
        // var_dump($weather);exit;
        $weatherData=array();
        //重组数组,将有用的数据提取出来
        // foreach($weather as $k=>$v){
        //     if($k=='city'){
        //         $city=$v;
        //     }
        //     if(is_array($v)){
        //         foreach($v as $key=>$val){
        //             if($key===0){
        //                 $date=$val['date'];
        //             }
        //             $weatherData[$key]['week']=$val['week'];
        //             $weatherData[$key]['wea']=$val['wea'];
        //             $weatherData[$key]['wea_img']='wi-'.$val['wea_img'];
        //             $weatherData[$key]['tem']=$val['tem'];
        //             $weatherData[$key]['id']=$key;

        //         }
        //     }
        // }

        // $this->assign('vo',$weatherData);
        // $this->assign('vodate',$date);
        $this->assign('title','后台首页');
        // $this->assign('vocity',$city);
        return view('index');
    }
    
     /**
     * @description  获取天气
     * @param  string $data url
     * @return string json格式数据
     * @author jachin  2019-07-29
     */
    // private function getUrl($data){
    //     //组成数组
    //     $arrContextOptions=array(
    //         "ssl"=>array(
    //             "verify_peer"=>false,
    //             "verify_peer_name"=>false,
    //         ),
    //     );

    //     //将数据传入file_get_contents函数中
    //     $city=file_get_contents($data, false, stream_context_create($arrContextOptions));
    //     return json_decode($city,true);
    // }

}
