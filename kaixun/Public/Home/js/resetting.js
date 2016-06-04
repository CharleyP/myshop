$(document).ready(function() {
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
          url: window.getResetting,
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
              window.location = window.url_index;
            }else{
              layer.alert('账号和手机号不匹配', {
                icon: 5,
                skin: 'layer-ext-moon'
              })
            }
          },
          error: function(data){alert('服务器错误');}
        })
      }
    });
  })