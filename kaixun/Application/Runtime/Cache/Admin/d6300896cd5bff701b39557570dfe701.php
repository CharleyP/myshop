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
    .product{
      margin-top:20px;
      border:1px solid red;
    }
    .product .row{
      margin: 10px 0px;
    }
    .product .row .img{
      width:100px;
      height:100px;
      position: relative;
      float: left;
      margin: 5px;
    }
    .product .row .img img{
      width: 100%;
      height: 100%;
    }
    .product .row .img span{
      width: 10px;
      height: 10px;
      position: absolute;
      top: 0px;
      right: 5px;
      cursor: pointer;
    }
    </style>
    <script type="text/javascript">
    $(function(){
      $(".select-ca1 select").change(function(event) {
        var id = $(this).val();
        $.ajax({
          url: '<?php echo U("Product/getCategory2");?>',
          type: 'POST',
          dataType: 'json',
          data: {
            category1_id: id,
          },
          success:function(data){
            var len = data['data'].length;
            var add = '';
            for (var i = 0; i < len; i++) {
              add += '<option value="'+data['data'][i]['category2_id']+'">'+data['data'][i]['category2_name']+'</option>';
            };
            $(".select-ca2 .form-control").empty();
            $(".select-ca2 .form-control").append(add);
          },
          error:function(){
            alert('服务器错误');
          },
        })
      });
      $('.submit a').click(function(event) {
        var category2_id = $('.select-ca2 select').val();
        var name = $('.name1 .product_name').val();
        var specifications = $('.specifications input').val();
        var price = $('.price input').val();
        var info = $('.info textarea').val();
        var stock = $('.stock input').val();
        var product_id = $('.name1 .hidden').val();
        $.ajax({
          url: '<?php echo U("Product/changeSubmit");?>',
          type: 'POST',
          dataType: 'json',
          data: {
            product_id: product_id,
            category2_id: category2_id,
            product_name: name,
            product_price: price,
            product_specifications: specifications,
            product_info: info,
            product_stock: stock,
          },
          success:function(data){
            if (data['status'] == 1) {
              alert('修改成功');
            };
          },
          error:function(data){
            alert('系统错误');
          },
        })
      });
      //删除图片
      $('.img-one span.delete').click(function(event) {
        var img_id = $(this).siblings('.img-id').val();
        $.ajax({
          url: '<?php echo U("Product/delete_img");?>',
          type: 'POST',
          dataType: 'json',
          data: {id: img_id},
          success:function(data){
            if (data['status'] == 1) {
              window.location.reload();
            };
          },
          error:function(){alert('服务器错误');},
        })
      });
      //
      $(".add-img .submitImg").click(function(event) {
        $.ajax({
          url: '<?php echo U("Product/add_img");?>',
          type: 'POST',
          dataType: 'json',
          success:function(data){
            if (data['status'] == 1) {
              window.location.reload();
            };
          },
          error:function(){alert('服务器错误');},
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
            <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-md-7 col-md-offset-2 product">
              <div class="row name name1">
                <div class="col-md-3 text-right">商品名称：</div>
                <div class="col-md-7">
                  <input type="text" class="form-control product_name" value="<?php echo ($vo["product_name"]); ?>" required="required">
                  <input type="hidden" value="<?php echo ($vo["product_id"]); ?>" class="hidden" />
                </div>
              </div>
              <div class="row specifications">
                <div class="col-md-3 text-right">商品规格：</div>
                <div class="col-md-7"><input type="text" name="" id="input" class="form-control" value="<?php echo ($vo["product_specifications"]); ?>" required="required" pattern="" title=""></div>
              </div>
              <div class="row price">
                <div class="col-md-3 text-right">商品价格：</div>
                <div class="col-md-7"><input type="text" name="" id="input" class="form-control" value="<?php echo ($vo["product_price"]); ?>" required="required" pattern="" title=""></div>
              </div>
              <div class="row stock">
                <div class="col-md-3 text-right">商品大类：</div>
                <div class="col-md-7 select-ca1">
                  <select name="" id="input" class="form-control" required="required">
                    <option value=""><?php echo ($vo["category1_name"]); ?></option>
                    <?php if(is_array($ca1)): $i = 0; $__LIST__ = $ca1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo3["category1_id"]); ?>"><?php echo ($vo3["category1_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                </div>
              </div>
              <div class="row stock">
                <div class="col-md-3 text-right">商品小类：</div>
                <div class="col-md-7 select-ca2">
                  <select name="" id="input" class="form-control" required="required">
                    <option value="<?php echo ($vo["category2_id"]); ?>"><?php echo ($vo["category2_name"]); ?></option>
                    <?php if(is_array($ca2)): $i = 0; $__LIST__ = $ca2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo4): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo4["category2_id"]); ?>"><?php echo ($vo4["category2_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                </div>
              </div>
              <div class="row info">
                <div class="col-md-3 text-right">商品简介：</div>
                <div class="col-md-7"><textarea style="width:100%;height:100px;"><?php echo ($vo["product_info"]); ?></textarea></div>
              </div>
              <div class="row stock">
                <div class="col-md-3 text-right">商品库存：</div>
                <div class="col-md-7"><input type="text" name="" id="input" class="form-control" value="<?php echo ($vo["product_stock"]); ?>" required="required"></div>
              </div>
              <div class="row img">
                <div class="col-md-3 text-right">商品图片：</div>
                <div class="col-md-7">
                  <?php if(is_array($vo[product_img])): $i = 0; $__LIST__ = $vo[product_img];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><div class="img img-one">
                      <input type="hidden" value="<?php echo ($vo2["img_id"]); ?>" class="img-id" />
                      <img src="<?php echo ($vo2["img_url"]); ?>">
                      <span class="glyphicon glyphicon-trash delete" aria-hidden="true"></span>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
              </div>
              <div class="row add-img">
                <form action="<?php echo U('Product/add_img');?>" enctype="multipart/form-data" method="post" >
                  <div class="col-md-3 text-right">添加图片：</div>
                  <div class="col-md-5"><input type="file" name="img"/></div>
                  <input type="hidden" value="<?php echo ($vo["product_id"]); ?>" name="id" />
                  <div class="col-md-2"><input type="submit" value="提交" class="submitImg" ></div>
                </form>
              </div>
              <div class="row stock submit">
                <div class="col-md-1 col-md-offset-5">
                  <a class="btn btn-success">确定</a>
                </div>
              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
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