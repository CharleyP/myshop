
  $(function(){
    //判断是否登录状态ajax
    $.ajax({
      url: window.check,
      type: 'POST',
      dataType: 'json',
      success: function(data){
        if (data['status'] == 0) {
          $("#J_userInfo").show();
          $("#J_userMsg").hide();
        }else{
          $("#J_userInfo").hide();
          $("#J_userMsg").show();
          $("#J_userMsg .user-name span.name").text(data['data']['name']);
        }
      },
      error: function(data){
        //alert('服务器错误');
      }
    })
    //登录成功后页面页面新效果
    $("#J_userMsg .user").hover(function() {
      $(this).addClass('user-active');
      $(this).find('.user-menu').stop(false, true).slideDown();
    }, function() {
      $(this).find('.user-menu').stop(false, true).slideUp();
      $(this).removeClass('user-active');
    });  
   })