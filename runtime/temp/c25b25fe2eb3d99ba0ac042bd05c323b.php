<?php /*a:1:{s:75:"E:\phpStudy\PHPTutorial\WWW\wec\application\index\view\article\article.html";i:1571364992;}*/ ?>
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
			      <h4>旅品荟</h4>
			    </li>
			</ul>
			<div class="logo" style="">
				<img src="/../static/index/img/logo.jpg" id="logo" class="img-circle">
				<span class="nav-title"><a href="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzIzNDg3MzkxMA==&subscene=0#wechat_redirect">旅品荟</a></span>
			</div>
			
		</div>
		<div class="top30"></div>
		<div class="container">
        
	        <div class="tabbable">
	            <!--nav-pills，nav-tabs，nav-stacked :改变选项卡的样式-->
	            <div class="tab-pane active" id="tab1">
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                	<div class="list-content">
                		<a href="<?php echo url('article/detail?id='.$vo['id']); ?>" class="list-a">
                			<span class="float-left list-span"><?php echo htmlentities($vo['title']); ?></span>
							<img class="float-right list-img" src="/../static/<?php echo htmlentities($vo['picture']); ?>">
                		</a>
                	</div>
                	<?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
	        </div>
	    </div>
		
	</body>
	<script type="text/javascript" src="/../static/index/js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="/../static/index/js/popper.min.js"></script>
	<script type="text/javascript" src="/../static/index/js/bootstrap.js"></script>
</html>
