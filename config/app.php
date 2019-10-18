<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 应用设置
// +----------------------------------------------------------------------

return [
    // 应用名称
    'app_name'               => '',
    // 应用地址
    'app_host'               => '',
    // 应用调试模式
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => true,
    // 是否支持多模块
    'app_multi_module'       => true,
    // 入口自动绑定模块
    'auto_bind_module'       => false,
    // 注册的根命名空间
    'root_namespace'         => [],
    // 默认输出类型
    'default_return_type'    => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'    => 'json',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler'  => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler'      => 'callback',
    // 默认时区
    'default_timezone'       => 'Asia/Shanghai',
    // 是否开启多语言
    'lang_switch_on'         => false,
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'         => '',
    // 默认语言
    'default_lang'           => 'zh-cn',
    // 应用类库后缀
    'class_suffix'           => false,
    // 控制器类后缀
    'controller_suffix'      => false,

    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    // 默认模块名
    'default_module'         => 'index',
    // 禁止访问模块
    'deny_module_list'       => ['common'],
    // 默认控制器名
    'default_controller'     => 'Index',
    // 默认操作名
    'default_action'         => 'index',
    // 默认验证器
    'default_validate'       => '',
    // 默认的空模块名
    'empty_module'           => '',
    // 默认的空控制器名
    'empty_controller'       => 'Error',
    // 操作方法前缀
    'use_action_prefix'      => false,
    // 操作方法后缀
    'action_suffix'          => '',
    // 自动搜索控制器
    'controller_auto_search' => false,

    // +----------------------------------------------------------------------
    // | URL设置
    // +----------------------------------------------------------------------

    // PATHINFO变量名 用于兼容模式
    'var_pathinfo'           => 's',
    // 兼容PATH_INFO获取
    'pathinfo_fetch'         => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr'          => '/',
    // HTTPS代理标识
    'https_agent_name'       => '',
    // IP代理获取标识
    'http_agent_ip'          => 'X-REAL-IP',
    // URL伪静态后缀
    'url_html_suffix'        => 'html',
    // URL普通方式参数 用于自动生成
    'url_common_param'       => false,
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type'         => 0,
    // 是否开启路由延迟解析
    'url_lazy_route'         => false,
    // 是否强制使用路由
    'url_route_must'         => false,
    // 合并路由规则
    'route_rule_merge'       => false,
    // 路由是否完全匹配
    'route_complete_match'   => false,
    // 使用注解路由
    'route_annotation'       => false,
    // 域名根，如thinkphp.cn
    'url_domain_root'        => '',
    // 是否自动转换URL中的控制器和操作名
    'url_convert'            => true,
    // 默认的访问控制器层
    'url_controller_layer'   => 'controller',
    // 表单请求类型伪装变量
    'var_method'             => '_method',
    // 表单ajax伪装变量
    'var_ajax'               => '_ajax',
    // 表单pjax伪装变量
    'var_pjax'               => '_pjax',
    // 是否开启请求缓存 true自动缓存 支持设置请求缓存规则
    'request_cache'          => false,
    // 请求缓存有效期
    'request_cache_expire'   => null,
    // 全局请求缓存排除规则
    'request_cache_except'   => [],
    // 是否开启路由缓存
    'route_check_cache'      => false,
    // 路由缓存的Key自定义设置（闭包），默认为当前URL和请求类型的md5
    'route_check_cache_key'  => '',
    // 路由缓存类型及参数
    'route_cache_option'     => [],

    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => Env::get('think_path') . 'tpl/dispatch_jump.tpl',
    'dispatch_error_tmpl'    => Env::get('think_path') . 'tpl/dispatch_jump.tpl',

    // 异常页面的模板文件
    'exception_tmpl'         => Env::get('think_path') . 'tpl/think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'          => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'         => false,
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'       => '',

     /*redis数据库配置*/
    'REDIS_HOST'=>'127.0.0.1',//服务器地址
    'REDIS_PORT'=>'6379',//服务器端口
    'REDIS_NAME'=>'deviceUUID:user',
    'REDIS_TIME'=>3600,//设置登录在线时长



    /*短信配置*/
    'MESSAGE_APPID'=>1400217955,
    'MESSAGE_APPKEY'=>'435a3154b6650c7b8709a79232a4ed32',
    'MESSAGE_SIGN'=>'怀念那年',
    'MESSAGE_YEMPLATEID'=>345476,
   
    /*支付宝支付配置*/
    "ALIPAY_CONFIG" => [
        //应用ID,您的APPID。
       'app_id' => "2016092100559401",

       //商户私钥
       'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCGGBdZtZIiKoy5SF9BDimD18kmF/sCHx/lOxjn7ZqZ9S4CW7P0QItswi1F1qGB39Wg+HD4tCSt0Mrxa6NDHOqlggit3/so/FOMhparZyhjiVva1n+H4yhjDp2pLybJzhCsGno0JCqDVTMe3jA3oVPArY59IqSWxzMCEdo0uEbu09rTQxg5oWDLRAgFIBCr1PxLgF2GMOc65EkJ18WFkyfBiQO03enJm+uQWQuukFxbWU6mcUAv2gkVpYfGszWQNKKnBMKdh2meOgtPbGFI/Ka81QmIIPMZjaWtY51vZnTChedy3jr/w7sIiOdVBtD9yAdUzUsWrmAED9co437N2rdXAgMBAAECggEANNNkz4iCK0eL7KogLGbB4BiwO3uS/QD59bpUU3n9P82g9Hjf6cdLperRHwQw2BMv+5wkFTYShQ8OBBGdXaEUp2MUvDrSnRDacS/MR3X6KUxBjXKXBxdsH6nwXmge5b1yP/qmTcg5n0d/PhfV8vRxJCS7T3zITkXnSFd0GPTHrOniMi6DgDrW7/pmO8HZrGpMKXvrvB8iI0MrNV9t9LxmTq9WF6U218n5XO7VET1ELiruBvxZvlpLVtfALP7fUO3YRreC3s3mXBkyv8L8+GKi7uWEy6ID17Z2FfD3OLL+c8KIdYKNyl+QSxY8rahZUbo4r9klN+wBa8jBvXGJ0zt7sQKBgQDNpw46VyIJsebHOxCzd4a509jxfdWmF6LBKGHPsSU6g+3n6ddLZw8IXGpbcqtGk2RhHKKPIVUBUo/imM9i3PHMeAkhrTg33sBLcnePM0WoRZxYld37HVDJaTG9n0jt63pwZEitRYsRLATmcVteVjnQaerUs3CnwdBkZFsYr10zHQKBgQCm7DlpRTagtEB+8EEBzM6uJw850d8rJB2XlOLwX+XvMXP0R5yi5YHKXYQs6Vq6pJEn0qSzr/HTsa6NjZCRouOOVG0bQQOviWuZ+eR+C/Y47rgmHfYbw2sl9HGFSYT0VwuAp6F6pARSlAH+MX8nwGiSKOsE2AjG9KquD4+k/vc2AwKBgBFL4550haBbHhXTmev+OY6Xir+E3dtCUaX9R3y4YXEyd2fx+vGUkWcanrdiRZWCAAdK6UEwhH2/++oLACZIfu27iskSUJAiY/n0fqnEni8w651nvWvJY2oNNunD49Ze38VkKdio6LFhCmh3UD/28JXe0qlhDjCN1IEdD6xb03LhAoGAA+zICM6k0zCJ17JEhQtQzM2EUSK7MaN+wqKwl2BZ4r7x8AuDBl2JKL38LqYqCPt3ok0UrFj1wbmK1i8+9/2xhhY8Hojv0j/T9OHoWoJjfsE2OUc5EzwMF+9gf/bTln85eQP4Cw8yPtLWHSkCyWd/zfgCVrHRuwPjw4YAJawNGgsCgYEAunRgC7lOTwJ5ELmBKUW36UiLUdO61s8KhfJhn8XWP9FDRP0mN0zsr9BG2NmrtMnu5+F/B4r6wYKJg9Y41A21g2sS3nUZ5V6udqd73rsRmVwsqKds2OMkHxosyVgVFGAz8uHTJQzhvKnHMqh1mTfBACigv5QV+1wVNonEpDPctZs=",

       //异步通知地址
       'notify_url' => "http://www.fcc.cn/index.php/admin/alipay/notify",
       // 'notify_url' => "http://www.fcc.cn/index.php/alipay/notify_url.php",

       //同步跳转
       // 'return_url' => "http://www.fcc.cn/index.php/alipay/return_url.php",
       'return_url' => "http://www.fcc.cn/index.php/admin/alipay/returnfy",

       //编码格式
       'charset' => "UTF-8",

       //签名方式
       'sign_type' => "RSA2",

       //支付宝网关
       'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

       //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
       'alipay_public_key' => 
       "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAybaiQBvlbn9y6+p6V/BC5LWW6KWvXLMEbzYp0WTKT6FIdAYqElj3W+X3ErWipM3Q8+MRg9T+A4Sce3DJmVaMnDUqPJUpMETnnMRMj67B9XJtlHUMNUw7qaA6d4ZWPsrPvqk1epL/OGTPCJVlIWAJ4kZGhy007Mg1olS37qWqoaN8XAfuVuffdcq2Qtxt5xHw0954hBn3oG1L7h+LuKh0JFMVfBNMKfiXl8/Jx74QFL35nTi82Tx5BMLxzVxb0tfIyLZrnT++2HBEoMyuf+FPggYyFk0xvgo6+quhDHF/DtMgBMnlKDmkhqGbmlNyye9olXdHc8zrtMHHEuo5bp/VAQIDAQAB",
    ],

    /*天气配置*/

    'WEATHER_APPID'=>87913429,
    'WEATHER_APPSECRET'=>'JdzS9JIl',

];
