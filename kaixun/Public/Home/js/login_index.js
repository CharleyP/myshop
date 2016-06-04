$(document).ready(function() {
    $(".wrapper .wrap .layout .login_area form .btns_bg").click(function(event) {
      var account = $(".wrapper .wrap .layout .login_area form #region-code input").val();
      var password = $(".wrapper .wrap .layout .login_area form #region-psw input").val();
      var verify = $(".wrapper .wrap .layout .login_area form #region-verify input").val();
      $.ajax({
        url: window.getLogin,
        data:'POST',
        dataType:'json',
        data: {
          user_account: account,
          user_password: password,
          verifyMsg: verify,
        },
        success: function(data){
          if (data['status'] == 0){
            layer.alert(data['msg'], {
              icon: 5,
              skin: 'layer-ext-moon'
            })
          };
          if (data['status'] == 1) {
            window.location = window.url_index;
          };
        },
        error: function(data){
          alert('服务器错误');
        }
      })
    });   
  })