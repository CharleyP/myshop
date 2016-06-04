<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" /> 
  <title>登录</title> 
  <script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/Public/Home/layer/layer.js"></script>
  <link rel="stylesheet" type="text/css" href="/Public/Home/css/login_main.css">
  <script type="text/javascript" src="/Public/Home/js/login_index.js"></script>
  <script type="text/javascript">
  window.getLogin = '<?php echo U("Login/getLogin");?>';
  window.url_index = "<?php echo U('Index/index');?>";
  </script>
 </head> 
 <body class="en"> 
  <div class="wrapper"> 
   <div class="wrap"> 
    <div class="layout" id="layout"> 
     <!--表单输入登录--> 
     <div class="mainbox" id="login-main"> 
      <div class="lgnheader"> 
       <div class="header_tit t_c"> 
        <h4 class="header_tit_txt" id="login-title">帐号登录</h4> 
       </div> 
      </div> 
      <!-- header e --> 
      <div> 
       <div class="login_area"> 
        <form action="" id="login-main-form"> 
         <div class="loginbox c_b"> 
          <!-- 输入框 --> 
          <div class="lgn_inputbg c_b"> 
           <!--验证用户名--> 
           <div class="single_imgarea" id="account-info"> 
            <div class="na-img-area" id="account-avator" style="display:block"> 
             <div class="na-img-bg-area" id="account-avator-con"></div> 
            </div> 
            <p class="us_name" id="account-displayname"></p> 
            <p class="us_id"></p> 
           </div> 
           <label id="region-code" class="labelbox login_user c_b" for=""> 
            <input class="item_account" autocomplete="off" type="text" name="user" id="username" placeholder="请输入账号" /> </label> 
           <label class="labelbox c_b" id="region-psw"> 
            <input type="password" placeholder="密码" name="pwd" id="pwd" /> </label>
           <label class="labelbox c_b" id="region-verify"> 
            <input type="password" placeholder="验证码" name="pwd" id="pwd" /> </label> <img src="<?php echo U('Login/verify');?>" style="float:left">
          </div> 
          <div class="lgncode c_b" id="captcha"> 
          </div> 
          <div class="btns_bg"> 
           <input class="btnadpt btn_orange" id="login-button" type="button" value="立即登录" /> 
          </div> 
         </div> 
        </form> 
       </div> 
      </div> 
      <div class="n_links_area" id="custom_display_64"> 
       <a class="outer-link" href="<?php echo U('Login/register');?>">注册帐号</a>
       <span>|</span> 
       <a class="outer-link" href="<?php echo U('Login/resetting');?>">忘记密码？</a> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="n-footer"> 
   <p class="nf-intro"><span>公司版权所有<a class="beianlink beian-record-link" target="_blank" href="">公网安备号</a>ICP证号</span></p> 
  </div> 
 </body>
</html>