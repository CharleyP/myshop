$(document).ready(function() {
    $("#submit_register").click(function(event) {
      var user_account = $("#user_account").val();
      var user_password = $("#user_password").val();
      var user_password_again = $("#user_password_again").val();
      var user_name = $("#user_name").val();
      var user_phone = $("#user_phone").val();
      var user_verify = $("#user_verify").val();
      $.ajax({
        url: window.getRegister,
        type: 'POST',
        dataType: 'json',
        data: {
          user_account: user_account,
          user_password: user_password,
          user_password2: user_password_again,
          user_name: user_name,
          user_phone: user_phone,
          user_status: 0,
          user_verify: user_verify,
        },
        success: function(data){
          if (data['status'] == 1) {
            alert(data['msg']);
            window.location = window.url_index;
          };
          if (data['data']['user_account'] == '账号必须填写' || data['data']['user_account'] == '账号已存在') {
            $(".inputbg .user_account span").show();
          };
          if (data['data']['user_password'] == '密码必须填写' || data['data']['user_password'] == '两次密码不相同') {
            $(".inputbg .user_password_again span").show();
          };
          if (data['data']['user_name'] == '昵称必须填写') {
            $(".inputbg .user_name span").show();
          };
          if (data['data']['user_phone'] == '手机格式不正确' || data['data']['user_phone'] == '手机号必须填写') {
            $(".inputbg .user_phone span").show();
          };
          if (data['msg'] == '验证码错误') {
            $(".inputbg .user_verify span").show();
          };
        },
        error: function(data){
            alert('服务器错误');
        }
      })
    });
    
  })