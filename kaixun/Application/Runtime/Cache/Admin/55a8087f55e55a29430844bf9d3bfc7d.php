<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/bootstrap.min.js"></script>  
    <script src="/Public/Admin/js/app.min.js"></script>
    <script src="/Public/Admin/js/demo.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <link rel="stylesheet" href="/Public/Admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/Public/Admin/dist/css/skins/_all-skins.min.css">
    <style type="text/css">
    *{
      margin: 0px;
      padding: 0px;
    }
    .content-wrapper{
      background: #fff;
    }
    .span2 ul li{
    	list-style-type: none;
    	margin: 10px 0px;
    }
    .category-nav .category1{
    	font-size: 18px;
    	color: #000;
    }
    .category-nav .category2 a{
    	font-size: 16px;
    }
    .category-nav .category2 a:hover{
    	color: #000;
    }
    .category-nav .treeview-menu{
    	margin-left: 40px;
    }
    </style>
    <script type="text/javascript">
    $(function(){
		$(".treeview .treeview-menu").hide();
    	$(".treeview a.category1").click(function(event) {
			$(this).siblings('.treeview-menu').slideToggle();
		});
		//删除一级栏目
		$(".ca1 .operation .delete").click(function(event) {
			var category1_id = $(this).parents(".ca-1").find('.hidden').val();
			//console.log(category1_id);
			if (confirm('删除将导致该栏目下所有内容清空，你确认删除吗？')) {
				$.ajax({
				url: '<?php echo U("Category/deleteCategory1");?>',
				type: 'POST',
				dataType: 'json',
				data: {
					id: category1_id,
				},
				success:function(data){
					if (data['status'] == 1) {
						console.log(data['msg']);
					};
				},
				error:function(){
					//console.log('修改一级栏目状态失败');
				},
			})
			};
		});
		//删除二级栏目
		$(".ca2 .operation .delete").click(function(event) {
			var category2_id = $(this).parents(".ca-2").find('.hidden').val();
			console.log(category2_id);
			if (confirm('删除将导致该栏目下所有内容清空，你确认删除吗？')) {
				$.ajax({
				url: '<?php echo U("Category/deleteCategory2");?>',
				type: 'POST',
				dataType: 'json',
				data: {
					id: category2_id,
				},
				success:function(data){
					if (data['status'] == 1) {
						console.log(data['msg']);
					};
				},
				error:function(){
					//console.log('修改一级栏目状态失败');
				},
			})
			};
		});
    })
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
  <a href="javascript:void(0)" class="logo">
    <span class="logo-mini"><b>J</b>c</span>
    <span class="logo-lg"><b>Jun</b>chao</span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span><!-- 控制收缩 -->
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">4</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">你有4条评论</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="/Public/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      评论标题
                    </h4>
                    <p>评论内容</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-red"></i> 5 new members joined
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-red"></i> You changed your username
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-danger">9</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 9 tasks</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Design some buttons
                      <small class="pull-right">20%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                  </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Create a nice theme
                      <small class="pull-right">40%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">40% Complete</span>
                      </div>
                    </div>
                  </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Some task I need to do
                      <small class="pull-right">60%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Make beautiful transitions
                      <small class="pull-right">80%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">80% Complete</span>
                      </div>
                    </div>
                  </a>
                </li><!-- end task item -->
              </ul>
            </li>
            <li class="footer">
              <a href="#">View all tasks</a>
            </li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="/Public/Admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs">Alexander Pierce</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="/Public/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p>
                Alexander Pierce - Web Developer
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="col-xs-12 text-center">
                <a href="#">Fol俊超棒棒哒俊超棒棒哒俊超棒棒哒俊超棒棒哒俊超棒棒哒俊超棒棒哒俊超棒棒哒俊超棒棒哒俊超棒棒哒俊超棒棒哒俊超棒棒哒sss</a>
              </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  </header>
      <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/Public/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class=".active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>栏目管理</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class=".active"><a href="<?php echo U('Category/index');?>"><i class="fa fa-circle-o"></i>查看栏目</a></li>
          <li><a href="<?php echo U('Category/add');?>"><i class="fa fa-circle-o"></i>添加栏目</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>商品管理</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo U('Product/index');?>"><i class="fa fa-circle-o"></i>商品列表</a></li>
          <li><a href="<?php echo U('Product/add');?>"><i class="fa fa-circle-o"></i> 添加商品</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>用户管理</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo U('User/index');?>"><i class="fa fa-circle-o"></i>用户列表</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
      
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-10 col-md-offset-1" >
				<div class="row">
				<div class="col-md-6 span2 ca1">
					<h2>一级栏目管理</h2>
					<div class="category-nav">
						<div class="active treeview">
					      <a href="javascript:void(0)" class="category1">
					        <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;一级栏目列表
					      </a>
					      <ul class="treeview-menu">
					      	<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="category2 ca-1">
						        	<div class="row">
						        		<div class="col-md-6 category1_name">
						        			<input type="text" class="form-control c1_name" value="<?php echo ($vo["category1_name"]); ?>" required="required" disabled='true'>
						        			<input type="hidden" name=""class="form-control hidden" value="<?php echo ($vo["category1_id"]); ?>">
						        		</div>
						        		<div class="col-md-5 operation">
						        			<button type="button" class="btn btn-default btn-xs delete" aria-label="Left Align" data-toggle="tooltip" data-placement="right" title="删除" style="margin-left:5px;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						        		</div>
						        	</div>
						        </li><?php endforeach; endif; else: echo "" ;endif; ?>
					      </ul>
					    </div>
					</div>
				</div>
				<div class="col-md-6 span2 ca2">
					<h2>二级栏目管理</h2>
					    <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="active treeview">
						      <a href="javascript:void(0)" class="category1">
						        <span class="glyphicon glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>&nbsp;<?php echo ($vo["category1_name"]); ?>
						      </a>
						      <ul class="treeview-menu">
						      	<?php if(is_array($vo['getCategory2'])): $i = 0; $__LIST__ = $vo['getCategory2'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li class="category2 ca-2">
							        	<div class="row">
							        		<div class="col-md-6 category2_name">
							        			<input type="text" class="form-control c2_name" value="<?php echo ($vo2["category2_name"]); ?>" required="required" disabled='true'>
						        				<input type="hidden" name=""class="form-control hidden" value="<?php echo ($vo2["category2_id"]); ?>">
							        		</div>
							        		<div class="col-md-5 operation">
						        				<button type="button" class="btn btn-default btn-xs delete" aria-label="Left Align" data-toggle="tooltip" data-placement="right" title="删除" style="margin-left:5px;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
							        		</div>
							        	</div>
							        </li><?php endforeach; endif; else: echo "" ;endif; ?>
						      </ul>
						    </div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
            </div>
          </div>
        </div>
      
      <footer class="main-footer">
	<div class="pull-right hidden-xs">
	  <b>Version</b> 2.3.0
	</div>
	<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>
    </div>
  </body>
</html>