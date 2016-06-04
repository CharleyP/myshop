<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" /> 
  <title>忘记密码</title> 
  <script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/Public/Home/layer/layer.js"></script>
  <link type="text/css" rel="stylesheet" href="/Public/Home/css/reset.css" /> 
  <link type="text/css" rel="stylesheet" href="/Public/Home/css/layout.css" /> 
  <link type="text/css" rel="stylesheet" href="/Public/Home/css/registerpwd.css" /> 
  <script type="text/javascript">
  $(function(){
    $("#submit_button").click(function(event) {
      var user_account = $("#user_account").val();
      var user_phone = $("#user_phone").val();
      var user_password = $("#user_password").val();
      var user_password_again = $("#user_password_again").val();
      if (user_account == "") {
        $("#user_account").parent().find('span').show();
      }
      if(user_phone == ""){
        $("#user_phone").parent().find('span').show();
      }
      if(user_password == ""){
        $("#user_password").parent().find('span').show();
      }
      if(user_password_again == ""){
        $("#user_password_again").parent().find('span').show();
      }
      if(user_phone != "" && user_account != "" && user_password != "" && user_password_again != ""){
        $.ajax({
          url: '<?php echo U("Login/getResetting");?>',
          type: 'POST',
          dataType: 'json',
          data: {
            user_account: user_account,
            user_phone: user_phone,
            user_password: user_password,
          },
          success: function(data){
            if (data['status'] == 1) {
              alert(data['msg']);
              window.location = '<?php echo U("Index/index");?>';
            }else{
              layer.alert('账号和手机号不匹配', {
                icon: 5,
                skin: 'layer-ext-moon'
              })
            }
          },
          error: function(data){console.log('修改密码出错')}
        })
      }
    });
  })
  </script>
 </head>  
 <body class="zh_CN"> 
  <div class="wrapper"> 
   <div class="wrap"> 
    <div class="layout"> 
     <div class="n-frame device-frame reg_frame" style="padding-top:100px;"> 
      <div class="title-item t_c"> 
       <h4 class="title_big30">忘记密码</h4> 
      </div> 
      <form action="" method="post" id="forgetpwd_form" target="postee"> 
       <input type="hidden" name="qs" value="" /> 
       <div class="regbox"> 
        <h5 class="n_tit_msg">请输入账号及手机号：</h5> 
        <div class="inputbg"> 
         <!-- 错误添加class为err_label --> 
         <label class="labelbox labelbox-user" for="user"> <input type="text" name="id" id="user_account" autocomplete="off" placeholder="账号" /> <span class="labelbox_err" style="display:none">* 请输入账号</span> </label>  
        </div> 
        <div class="inputbg" id="email_check"> 
         <!-- 错误添加class为err_label --> 
         <label class="labelbox labelbox-user err" for="user"> <input type="text" name="id" id="user_phone" autocomplete="off" placeholder="邮箱" />
         <a class="btn email_check_submit"></a>
        <span class="labelbox_err" style="display:none">* 请输入手机</span> </label>  
        </div> 
        <div class="inputbg"> 
         <!-- 错误添加class为err_label --> 
         <label class="labelbox labelbox-user" for="user"> <input type="password" name="id" id="user_password" autocomplete="off" placeholder="新密码" />
         <span class="labelbox_err" style="display:none">* 请输入密码</span> </label>  
        </div> 
        <div class="inputbg"> 
         <!-- 错误添加class为err_label --> 
         <label class="labelbox labelbox-user" for="user"> <input type="password" name="id" id="user_password_again" autocomplete="off" placeholder="确认新密码" /> <span class="labelbox_err" style="display:none">* 请输入确认密码</span> </label>  
        </div> 
        <div class="fixed_bot"> 
         <input class="btn332 btn_reg_1" type="button" id="submit_button" value="修改密码" /> 
        </div>
          <div class="n_links_area" id="custom_display_64" style="margin-top:30px;text-align:center"> 
           <a class="outer-link" href="<?php echo U('Login/register');?>" target="_blank">登录帐号</a>
           <span>|</span> 
           <a class="outer-link" href="<?php echo U('Login/resetting');?>" target="_blank">注册账号</a> 
          </div> 
       </div> 
      </form> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="n-footer"> 
   <p class="nf-intro"><span>公司版权所有<a class="beianlink beian-record-link" target="_blank" href="">公网安备号</a>ICP证号</span></p> 
  </div> 
</script> 
 </body>
</html>