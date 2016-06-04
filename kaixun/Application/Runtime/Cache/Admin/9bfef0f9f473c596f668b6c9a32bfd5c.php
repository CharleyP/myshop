<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
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
		//设置一级栏目是否在主页显示
		$(".treeview-menu .ca-1").each(function(index, el) {
			var i = $(this).find('.check_show .show input').val();
			if (i==1) {
				$(this).find('.check_show .show .glyphicon').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
			}else{
				$(this).find('.check_show .show .glyphicon').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
			}
		});
		//修改是否在主页显示状态
		$('.treeview-menu .ca-1 .check_show .show').click(function(event) {
			var id = $(this).parents('.ca-1').find('.category1_name .hidden').val();
			var i = $(this).parents('.ca-1').find('.check_show .hidden').val();
			if (i==0) {
				$(this).find('span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
				i=1;
			}else{
				$(this).find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
				i=0;
			}
			$.ajax({
				url: '<?php echo U("Category/changeCategory1_status");?>',
				type: 'POST',
				dataType: 'json',
				data: {
					category1_id: id,
					status: i,
				},
				success:function(data){
					if (data['status'] == 1) {
						
					};
				},
				error:function(){
					alert('服务器错误');
				},
			})
		});
		//修改一级栏目名称
		$(".treeview-menu .operation .change").click(function(event) {
			var category1_id = $(this).parents(".ca-1").find('.hidden').val();
			$(this).parents(".ca-1").find('.c1_name').attr('disabled', false);
			$(this).parents(".ca-1").find('.operation .change span').removeClass('glyphicon-pencil').addClass('glyphicon-ok');
			var tip = $(this).parents(".ca-1").find('.operation button').removeClass('change').addClass('sub');
			$(this).parents(".ca-1").find('.operation .sub').click(function(event) {
				var name = $(this).parents('.ca-1').find('.category1_name .c1_name').val();
				$.ajax({
					url: '<?php echo U("Category/changeCategory1_name");?>',
					type: 'POST',
					dataType: 'json',
					data: {
						category1_id: category1_id,
						name: name,
					},
					success:function(data){
						if (data['status'] == 1) {
							
							window.location.reload();
						};
					},
					error:function(){
						alert('服务器错误');
					},
				})
			});
		});

		//修改二级栏目名称
		$(".treeview-menu .operation .change").click(function(event) {
			var category2_id = $(this).parents(".ca-2").find('.hidden').val();
			$(this).parents(".ca-2").find('.c2_name').attr('disabled', false);
			$(this).parents(".ca-2").find('.operation .change span').removeClass('glyphicon-pencil').addClass('glyphicon-ok');
			var tip = $(this).parents(".ca-2").find('.operation button').removeClass('change').addClass('sub');
			$(this).parents(".category2").find('.operation .sub').click(function(event) {
				var name = $(this).parents('.category2').find('.category2_name .c2_name').val();
				$.ajax({
					url: '<?php echo U("Category/changeCategory2_name");?>',
					type: 'POST',
					dataType: 'json',
					data: {
						category2_id: category2_id,
						name: name,
					},
					success:function(data){
						if (data['status'] == 1) {
							
							window.location.reload();
						};
					},
					error:function(){
						alert('服务器错误');
					},
				})
			});
		});
		//设置二级栏目是否在主页显示
		$(".treeview-menu .ca-2").each(function(index, el) {
			var i = $(this).find('.check_show .show input').val();
			if (i==1) {
				$(this).find('.check_show .show .glyphicon').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
			}else{
				$(this).find('.check_show .show .glyphicon').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
			}
		});
		//修改二级栏目是否在主页显示状态
		$('.treeview-menu .ca-2 .check_show .show').click(function(event) {
			var id = $(this).parents('.ca-2').find('.category2_name .hidden').val();
			var i = $(this).parents('.ca-2').find('.check_show .show .hidden').val();
			if (i==0) {
				$(this).find('span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
				i=1;
			}else{
				$(this).find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
				i=0;
			}
			$.ajax({
				url: '<?php echo U("Category/changeCategory2_show");?>',
				type: 'POST',
				dataType: 'json',
				data: {
					category2_id: id,
					status: i,
				},
				success:function(data){
					if (data['status'] == 1) {
						
					};
				},
				error:function(){
					alert('服务器错误');
				},
			})
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
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="/Public/Admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs">
              <?php if(is_array($admin)): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo5): $mod = ($i % 2 );++$i; echo ($vo5["user_name"]); endforeach; endif; else: echo "" ;endif; ?>
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="/Public/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
                <a class="btn btn-default btn-flat logout">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  </header>
  <script type="text/javascript">
  $(function(){
    $('.user-footer a.logout').click(function(){
      $.ajax({
        url: '<?php echo U("Login/logout");?>',
        type: 'POST',
        dataType: 'json',
        success:function(data){
          if (data['status'] == 1) {
            window.location = "<?php echo U('Login/index');?>";
          };
        },
        error:function(data){
          alert('服务器错误');
        },
      })
    })
  })
  </script>
      <aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/Public/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>
          <?php if(is_array($admin)): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo5): $mod = ($i % 2 );++$i; echo ($vo5["user_name"]); endforeach; endif; else: echo "" ;endif; ?>
        </p>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">内容列表</li>
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
          <span>商品管理</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo U('Product/index');?>"><i class="fa fa-circle-o"></i>商品列表</a></li>
          <li><a href="<?php echo U('Product/add');?>"><i class="fa fa-circle-o"></i> 添加商品</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>用户管理</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo U('User/index');?>"><i class="fa fa-circle-o"></i>用户列表</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>订单管理</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo U('Order/index');?>"><i class="fa fa-circle-o"></i>订单列表</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>轮播管理</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo U('Banner/index');?>"><i class="fa fa-circle-o"></i>图片列表</a></li>
        </ul>
      </li>
    </ul>
  </section>
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
						        		<div class="col-md-1 check_show">
						        			<button type="button" class="btn btn-default btn-xs show" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="是否在主页显示"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><input type="hidden" value="<?php echo ($vo["category1_status"]); ?>" class="hidden" /></button>
						        			
						        		</div>
						        		<div class="col-md-6 category1_name">
						        			<input type="text" class="form-control c1_name" value="<?php echo ($vo["category1_name"]); ?>" required="required" disabled='true'>
						        			<input type="hidden" name=""class="form-control hidden" value="<?php echo ($vo["category1_id"]); ?>">
						        		</div>
						        		<div class="col-md-5 operation">
						        			<button type="button" class="btn btn-default btn-xs change" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="编辑"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
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
							        		<div class="col-md-1 check_show">
							        			<button type="button" class="btn btn-default btn-xs show" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="是否在主页显示"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><input type="hidden" value="<?php echo ($vo2["category2_show"]); ?>" class="hidden" /></button>
							        		</div>
							        		<div class="col-md-6 category2_name">
							        			<input type="text" class="form-control c2_name" value="<?php echo ($vo2["category2_name"]); ?>" required="required" disabled='true'>
						        				<input type="hidden" name=""class="form-control hidden" value="<?php echo ($vo2["category2_id"]); ?>">
							        		</div>
							        		<div class="col-md-5 operation">
							        			<button type="button" class="btn btn-default btn-xs change" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="编辑"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
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