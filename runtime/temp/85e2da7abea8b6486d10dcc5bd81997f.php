<?php /*a:1:{s:74:"E:\phpStudy\PHPTutorial\WWW\wec\application\index\view\article\detail.html";i:1571364182;}*/ ?>
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
    <body>
	<div class="container">
            <ul class="nav" style="margin-top: 30px;">
        	<li class="nav-item">
        	   <h4><?php echo htmlentities($content['title']); ?></h4>
        	</li>
            </ul>
            <div class="logo" style="">
        	<span class="nav-title"><a href="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzIzNDg3MzkxMA==&subscene=0#wechat_redirect">旅品荟</a></span>
                <span class="nav-time"><?php echo htmlentities(date("Y-m-d",!is_numeric($content['create_time'])? strtotime($content['create_time']) : $content['create_time'])); ?></span>
            </div>
			
	</div>
	<div class="top60"></div>
	<div class="container">
        <div class="top-img">
            <img src="/../static/index/img/top.jpg">
        </div>
	    <div class="article-content">
	           <?php echo htmlspecialchars_decode($content['content']); ?>
	     </div>
         <div class="top-img">
               <img src="/../static/index/img/footer.jpg">
         </div>
	</div>
    <div class="container">
        <div class="top30">
           <span class="footer">阅读 <?php echo htmlentities($content['read']); ?></span> 
        </div>
        
    </div>
		
    </body>
    <script type="text/javascript" src="/../static/index/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="/../static/index/js/popper.min.js"></script>
    <script type="text/javascript" src="/../static/index/js/bootstrap.js"></script>

<script>

</script>
</html>
