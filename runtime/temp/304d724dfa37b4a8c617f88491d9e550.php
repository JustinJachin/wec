<?php /*a:5:{s:73:"E:\phpStudy\PHPTutorial\WWW\wec\application\admin\view\article\index.html";i:1571369196;s:70:"E:\phpStudy\PHPTutorial\WWW\wec\application\admin\view\public\top.html";i:1570754430;s:73:"E:\phpStudy\PHPTutorial\WWW\wec\application\admin\view\public\header.html";i:1570756068;s:71:"E:\phpStudy\PHPTutorial\WWW\wec\application\admin\view\public\menu.html";i:1570774412;s:69:"E:\phpStudy\PHPTutorial\WWW\wec\application\admin\view\public\js.html";i:1565071540;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'后台管理系统')); ?></title>

<!--Favicon -->
<!-- <link rel="icon" href="/../static/img/favicon.ico" type="image/x-icon"/> -->

<!--Bootstrap.min css-->
<link rel="stylesheet" href="/../static/plugins/bootstrap/css/bootstrap.min.css">

<!--Icons css-->
<link rel="stylesheet" href="/../static/css/icons.css">

<!--Style css-->
<link rel="stylesheet" href="/../static/css/style.css">

<!--mCustomScrollbar css-->
<link rel="stylesheet" href="/../static/plugins/scroll-bar/jquery.mCustomScrollbar.css">

<!--Sidemenu css-->
<link rel="stylesheet" href="/../static/plugins/toggle-menu/sidemenu.css">

<!--Chartist css-->
<link rel="stylesheet" href="/../static/plugins/chartist/chartist.css">
<link rel="stylesheet" href="/../static/plugins/chartist/chartist-plugin-tooltip.css">

<!--Full calendar css-->
<link rel="stylesheet" href="/../static/plugins/fullcalendar/stylesheet1.css">

<!--Toastr css-->
<link rel="stylesheet" href="/../static/plugins/toastr/build/toastr.css">
<link rel="stylesheet" href="/../static/plugins/toaster/garessi-notif.css">



<!--&lt;!&ndash;morris css&ndash;&gt;-->
<!--<link rel="stylesheet" href="/../static/plugins/morris/morris.css">-->
		<block name="topCss">
			<!--DataTables css-->
			<link rel="stylesheet" href="/../static/plugins/Datatable/css/dataTables.bootstrap4.css">

			<!--iCheck css-->
			<link rel="stylesheet" href="/../static/plugins/iCheck/all.css">

		</block>
	</head>

	<body class="app ">

		<div id="spinner"></div>

		<div id="app">
			<div class="main-wrapper" >
				<nav class="navbar navbar-expand-lg main-navbar">
    <a class="header-brand" >
        <img src="/../static/img/brand/logo.jpg" class="header-brand-img">
    </a>
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i class="ion ion-search"></i></a></li>
        </ul>
        
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                <img src="/../static/img/avatar/avatar-1.jpeg.jpg" alt="profile-user" class="rounded-circle w-32">
                <div class="d-sm-none d-lg-inline-block"><?php echo htmlentities(app('session')->get('admin_name')); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?php echo url('login/logout'); ?>" class="dropdown-item has-icon">
                    <i class="ion-ios-redo"></i> 退出登录
                </a>
            </div>
        </li>
    </ul>
</nav>
				<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown">
            <a class="nav-link pl-2 pr-2 leading-none d-flex" data-toggle="dropdown" href="#">
                <img alt="image" src="/../static/img/avatar/avatar-1.jpeg.jpg" class=" avatar-md rounded-circle">
                <span class="ml-2 d-lg-block">
                    <span class="text-white app-sidebar__user-name mt-5">后台管理</span><br>
                    <span class="text-muted app-sidebar__user-name text-sm"> <?php echo htmlentities(app('session')->get('admin_name')); ?></span>
                </span>
            </a>
        </div>
    </div>
    <ul class="side-menu">
        <li class="slide">
            <a class="side-menu__item"  data-toggle="slide" href="#"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">账号管理</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item"  href="<?php echo url('user/index'); ?>"><span>密码修改</span></a></li>
                <li><a class="slide-item"  href="<?php echo url('user/index'); ?>"><span>头像更改</span></a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-tasks"></i><span class="side-menu__label">文章管理</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="<?php echo url('type/index'); ?>" class="slide-item"> 分类列表</a></li>
                <li><a href="<?php echo url('article/index'); ?>" class="slide-item"> 文章列表</a></li>
            </ul>
        </li>
    </ul>
</aside>
				<block name="bodsy">
					<div class="app-content">
						<section class="section">
							<ol class="breadcrumb">
						        <li class="breadcrumb-item"><a href="<?php echo url('index/index'); ?>">首页</a></li>
						        <li class="breadcrumb-item active" aria-current="page">文章列表</li>
						    </ol>

							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-header">
											<h4>文章列表</h4>
										</div>
										<div class=" col-lg-12" style="margin-top:20px;margin-bottom: -10px;">
											<div class="float-left" style="margin-right: 10px;">
												<a href="<?php echo url('article/add'); ?>" class="btn btn-primary" >添加文章</a> 
											</div>
										</div>
										<div class="card-body">
											<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered border-t0 text-nowrap w-100" >
												<thead>
													<tr class="text-center">
														<th class="wd-20p">ID</th>
														<th class="wd-30p">标题</th>
														<th class="wd-30p">标题图片</th>
														<th class="wd-30p">分类</th>
														<th class="wd-30p">浏览量</th>
														<th class="wd-30p">首页轮播图</th>
														<th class="wd-30p">发布时间</th>
														<th class="wd-30p">更新时间</th>
														<th class="wd-30p">轮播图处理</th>
														<th class="wd-25p">操作</th>
													</tr>
												</thead>
												<tbody>
													<?php if(is_array($volist) || $volist instanceof \think\Collection || $volist instanceof \think\Paginator): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
													<tr class="text-center">
														<td><?php echo htmlentities($vo['id']); ?></td>
														<td><?php echo htmlentities($vo['title']); ?></td>
														<td><img src="/../static<?php echo htmlentities($vo['picture']); ?>" width="100" height="100"></td>
														<td><?php echo htmlentities($vo['typename']); ?></td>
														<td><?php echo htmlentities($vo['read']); ?></td>
														<td>
															<?php if($vo['flag'] ==  '是'): ?>
															<div class="badge badge-info"><?php echo htmlentities($vo['flag']); ?></div>
															<?php else: ?>
															<div class="badge badge-warning"><?php echo htmlentities($vo['flag']); ?></div>
															<?php endif; ?>
														</td>
														<td><?php echo htmlentities($vo['create_time']); ?></td>
														<td><?php echo htmlentities($vo['update_time']); ?></td>
														<td>
															<div class="btn-group align-top ">
																<?php if($vo['flag'] !=  '是'): ?>
																<button onclick="btn(<?php echo htmlentities($vo['id']); ?>,'start','store')" class="btn btn-sm btn-info  m-b-5 m-t-5" >上架轮播</button>
																<?php else: ?>
																<button onclick="btn(<?php echo htmlentities($vo['id']); ?>,'stop','store')" class="btn btn-sm btn-warning  m-b-5 m-t-5" >下架轮播</button>
																<?php endif; ?>
															</div>
														</td>
														<td>
															
															<div class="btn-group align-top">
																<a href="<?php echo url('article/read?id='.$vo['id']); ?>" class="btn btn-sm btn-primary m-b-5 m-t-5" target="_blank">查看文章</a>
															</div>
															<div class="btn-group align-top">
																<a href="<?php echo url('article/edit?id='.$vo['id']); ?>" class="btn btn-sm btn-primary m-b-5 m-t-5">编辑文章</a>
															</div>
															<div class="btn-group align-top">
																<button onclick="btn(<?php echo htmlentities($vo['id']); ?>,'','del')" class="btn btn-sm btn-danger m-b-5 m-t-5 ajax-get"><i class="fa fa-trash"></i></button>
															</div>
														</td>
													
													</tr>
													<?php endforeach; endif; else: echo "" ;endif; ?>
												</tbody>
											</table>
										</div>
										<div id="page" class="page">
												<?php echo $page; ?>
											</div>
										</div>
									</div>
								</div>
							</div>

						</section>
					</div>
					
				</block>
			</div>
		</div>
		<script>
			
		    function btn(id,method,action){
		    	var url="<?php echo url('article/"+action+"'); ?>";
		    	var data={'method':method,'id':id};
		    	// console.log(data);debugger;
		    	AjaxGet(url,data);
		    }
		 
		    

		</script>
		<!--Jquery.min js-->
<script src="/../static/js/jquery.min.js"></script>

<!--popper js-->
<script src="/../static/js/popper.js"></script>

<!--Tooltip js-->
<script src="/../static/js/tooltip.js"></script>

<!--Bootstrap.min js-->
<script src="/../static/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Jquery.nicescroll.min js-->
<script src="/../static/plugins/nicescroll/jquery.nicescroll.min.js"></script>

<!--Scroll-up-bar.min js-->
<script src="/../static/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

<!--Sidemenu js-->
<script src="/../static/plugins/toggle-menu/sidemenu.js"></script>

<!--mCustomScrollbar js-->
<script src="/../static/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- ECharts -->
<script src="/../static/plugins/echarts/dist/echarts.js"></script>

<!--Min Calendar -->
<script src="/../static/plugins/fullcalendar/calendar.min.js"></script>
<script src="/../static/plugins/fullcalendar/custom_calendar.js"></script>

<!--Morris js-->
<script src="/../static/plugins/morris/morris.min.js"></script>
<script src="/../static/plugins/morris/raphael.min.js"></script>

<!--Scripts js-->
<script src="/../static/js/scripts.js"></script>

<!--Toastr js-->
<script src="/../static/plugins/toastr/build/toastr.min.js"></script>
<script src="/../static/plugins/toaster/garessi-notif.js"></script>
<!--公用函数 js-->	
<script src="/../static/js/commont.js"></script>
		<block name="js">
			<!--DataTables css-->
			<script src="/../static/plugins/Datatable/js/jquery.dataTables.js"></script>
			<script src="/../static/plugins/Datatable/js/dataTables.bootstrap4.js"></script>

			<!--Select2 js-->
			<script src="/../static/plugins/select2/select2.full.js"></script>

			<!--Inputmask js-->
			<script src="/../static/plugins/inputmask/jquery.inputmask.js"></script>

			<!--Moment js-->
			<script src="/../static/plugins/moment/moment.min.js"></script>

			<!--Bootstrap-daterangepicker js-->
			<script src="/../static/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

			<!--Bootstrap-datepicker js-->
			<script src="/../static/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

			<!--Bootstrap-colorpicker js-->
			<script src="/../static/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>

			<!--Bootstrap-timepicker js-->
			<script src="/../static/plugins/bootstrap-timepicker/bootstrap-timepicker.js"></script>

			<!--iCheck js-->
			<script src="/../static/plugins/iCheck/icheck.min.js"></script>

			<!--forms js-->
			<script src="/../static/js/forms.js"></script>

		</block>
	</body>
</html>