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
    <script type="text/javascript">
    $(function(){
      $('.login a').click(function(event) {
        var verify = $('.verify input').val();
        var account = $('.account input').val();
        var password = $('.password input').val();
        if (verify == '' || account == '' || password == "") {
          alert('请填写完整登录信息');
        }else{
          $.ajax({
            url: '<?php echo U("Login/loginCheck");?>',
            type: 'POST',
            dataType: 'json',
            data: {
              account: account,
              password: password,
              verify: verify,
            },
            success:function(data){
              if (data['status'] == 1) {
                window.location = '<?php echo U("Product/index");?>';
              }else{
                alert(data['msg']);
              }
            },
            error:function(data){
              alert('服务器错误');
            }
          })
        }
      });
      
    })
    </script>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a><b>Kai</b>Xun</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <div class="account">
          <input type="text" class="form-control" value="" required="required" placeholder="账号">
        </div>
        <div class="password" style="margin-top:10px;">
          <input type="password" class="form-control" value="" required="required" placeholder="密码">
        </div>
        <div class="verify" style="margin-top:10px;">
          <div class="row">
            <div class="col-md-6">
              <input type="text" class="form-control" value="" required="required" placeholder="验证码">
            </div>
            <div class="col-md-4">
              <img src="<?php echo U('Login/verify');?>"/>
            </div>
          </div>
        </div>
        <div class="login" style="margin-top:10px;margin-left:130px;">
          <a class="btn btn-info">登录</a>
        </div>
      </div>
    </div>
  </body>
</html>