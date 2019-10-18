<?php /*a:1:{s:73:"E:\phpStudy\PHPTutorial\WWW\wec\application\index\view\article\index.html";i:1571364597;}*/ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>首页</title>
        <link rel="stylesheet" type="text/css" href="/../static/index/css/bootstrap.css">
        <!-- 默认先调用pc.css样式表 -->
        <link rel="stylesheet" type="text/css" href="/../static/index/css/pc.css">
        <!--[if MicroMessenger]>
        <!-- 如果浏览器是微信内置,调用index.css样式表 -->
        <link rel="stylesheet" type="text/css" href="/../static/index/css/index.css" />
        <![endif]-->
    </head>
    <style type="text/css">
        /*.nav_tab 
        .nav_tab li{
            margin: 10px;
        }*/
    </style>
    <body>
        <div class="container">
            <ul class="nav" style="margin-top: 30px;">
                <li class="nav-item">
                  <h4>旅品荟-出境旅游实时最新集锦</h4>
                </li>
            </ul>
            <div class="logo" style="">
                <img src="/../static/index/img/logo.jpg" id="logo" class="img-circle">
                <span class="nav-title"><a href="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzIzNDg3MzkxMA==&subscene=0#wechat_redirect">旅品荟</a></span>
            </div>
            <div id="demo" class="carousel slide slide-show" data-ride="carousel">
              <!-- 指示符 -->
              <ul class="carousel-indicators">
                <?php if(is_array($slide) || $slide instanceof \think\Collection || $slide instanceof \think\Paginator): $i = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($i == '1'): ?>
                <li data-target="#demo" data-slide-to="{i}" class="active"></li>
                <?php else: ?>
                <li data-target="#demo" data-slide-to="{i}"></li>
                <?php endif; ?>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
             
              <!-- 轮播图片 -->
              
              <div class="carousel-inner">
                <?php if(is_array($slide) || $slide instanceof \think\Collection || $slide instanceof \think\Paginator): $i = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($i == '1'): ?>
                <div class="carousel-item active">
                <?php else: ?>
                <div class="carousel-item">
                <?php endif; ?>
                  <img src="/../static/<?php echo htmlentities($vo['picture']); ?>">
                  <div class="carousel-caption">
                    <h3><?php echo htmlentities($vo['title']); ?></h3>
                  </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </div>
             
              <!-- 左右切换按钮 -->
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
             
            </div>
        </div>
        <div class="top30"></div>
        <div class="container">
        
            <div class="tabbable">
                <!--nav-pills，nav-tabs，nav-stacked :改变选项卡的样式-->
                <ul class="nav nav_tab">
                    <?php if(is_array($lista) || $lista instanceof \think\Collection || $lista instanceof \think\Paginator): $i = 0; $__LIST__ = $lista;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="nav-item">
                        <?php if($i == '1'): ?>
                        <a href="#tab<?php echo htmlentities($vo['id']); ?>" class="active" data-toggle="tab"><?php echo htmlentities($vo['name']); ?></a>
                        <?php else: ?>
                        <a href="#tab<?php echo htmlentities($vo['id']); ?>" data-toggle="tab"><?php echo htmlentities($vo['name']); ?></a>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    
                </ul>
                <!-- 选项卡相对应的内容 -->
                <div class="tab-content" style="margin-top: 10px">
                    <?php if(is_array($lista) || $lista instanceof \think\Collection || $lista instanceof \think\Paginator): $i = 0; $__LIST__ = $lista;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($i == '1'): ?>
                            <div class="tab-pane active" id="tab<?php echo htmlentities($vo['id']); ?>">
                                <?php if(is_array($vo['article']) || $vo['article'] instanceof \think\Collection || $vo['article'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['article'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?>
                                <div class="list-content">
                                    <a href="<?php echo url('article/detail?id='.$vs['id']); ?>" class="list-a">
                                        <span class="float-left list-span"><?php echo htmlentities($vs['title']); ?></span>
                                        <img class="float-right list-img" src="/../static<?php echo htmlentities($vs['picture']); ?>">
                                    </a>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        <?php else: ?>

                            <div class="tab-pane" id="tab<?php echo htmlentities($vo['id']); ?>">
                                <?php if(is_array($vo['article']) || $vo['article'] instanceof \think\Collection || $vo['article'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['article'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?>
                                <div class="list-content">
                                    <a href="<?php echo url('article/detail?id='.$vs['id']); ?>" class="list-a">
                                        <span class="float-left list-span"><?php echo htmlentities($vs['title']); ?></span>
                                        <img class="float-right list-img" src="/../static<?php echo htmlentities($vs['picture']); ?>">
                                    </a>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        
    </body>
    <script type="text/javascript" src="/../static/index/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="/../static/index/js/popper.min.js"></script>
    <script type="text/javascript" src="/../static/index/js/bootstrap.js"></script>
</html>
