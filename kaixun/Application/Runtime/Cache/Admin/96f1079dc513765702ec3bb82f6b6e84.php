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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
    .banner-list{
      margin-top:20px;
      border:1px solid #ccc;
    }
    .banner-list ul li{
      list-style-type: none;
      width: 200px;
      height: 200px;
      position: relative;
      margin: 5px;
      float: left;
    }
    .banner-list ul li img{
      width: 200px;
      height: auto;
    }
    .banner-list ul li span{
      position: absolute;
      top: 5px;
      right: 5px;
      cursor: pointer;
    }
    </style>
    <script type="text/javascript">
    $(function(){
      //删除图片
      $('.img-one span.delete').click(function(event) {
        var img_id = $(this).siblings('.img-id').val();
        $.ajax({
          url: '<?php echo U("Banner/deleteBanner");?>',
          type: 'POST',
          dataType: 'json',
          data: {id: img_id},
          success:function(data){
            if (data['status'] == 1) {
              window.location.reload();
            };
          },
          error:function(data){
            alert('服务器错误');
          },
        })
      });
      //
      $(".add-img .submitImg").click(function(event) {
        $.ajax({
          url: '<?php echo U("Banner/upload");?>',
          type: 'POST',
          dataType: 'json',
          success:function(data){
            if (data['status'] == 1) {
              window.location.reload();
            };
          },
          error:function(){},
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
            <div class="col-md-10 col-md-offset-1 banner-list">
              <ul>
                <?php if(is_array($bannerList)): $i = 0; $__LIST__ = $bannerList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="img-one">
                    <input type="hidden" value="<?php echo ($vo["banner_id"]); ?>" class="img-id" />
                    <img src="<?php echo ($vo["banner_url"]); ?>">
                    <span class="glyphicon glyphicon-trash delete" aria-hidden="true"></span>
                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="add_img col-md-7 col-md-offset-2">
              <form action="<?php echo U('Banner/upload');?>" enctype="multipart/form-data" method="POST" >
                <div class="col-md-3 text-right">添加图片：</div>
                <div class="col-md-5"><input type="file" name="img"/></div>
                <input type="hidden" value="1" name="status" />
                <div class="col-md-2"><input type="submit" value="上传" class="submitImg" ></div>
              </form>
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