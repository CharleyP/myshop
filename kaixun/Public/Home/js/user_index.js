$(document).ready(function() {
    //检测用户是否登录
    $.ajax({
      url: window.check,
      type: 'POST',
      dataType: 'json',
      success: function(data){
        if (data['status'] == 0) {
          layer.alert('请登录', {
              icon: 5,
              skin: 'layer-ext-moon'
            });
          setTimeout(function(){
            window.location = window.url_index;
          },3000);  
        }
      },
      error: function(data){
        window.location = window.url_index;
      }
    });
    $.ajax({
      url: window.getUser,
      type: 'POST',
      dataType: 'json',
      success:function(data){
        $(".span16 .portal-content-box .user-card .name").text(data['data']['user_name']);
        if (data['data']['user_address'] == null) {
            layer.alert('请添加收货地址', {
                icon: 5,
                skin: 'layer-ext-moon'
              });
        };
        if (data['data']['user_password']<=6) {
          $(".span16 .portal-content-box .user-actions li.user_pass span").text('危险').css({
            color: 'red'
          });
        }else if(data['data']['user_password']<=9 && data['data']['user_password']>6){
          $(".span16 .portal-content-box .user-actions li.user_pass span").text('普通');
        }else{
          $(".span16 .portal-content-box .user-actions li.user_pass span").text('安全').css({
            color: '#000'
          })
        }
      },
      error:function(){}
    })
    $.ajax({
        url: window.order_sum,
        type: 'POST',
        dataType: 'json',
        success: function(data){
         $('.span16 .portal-content-box .info-list .order_num h3 span.num').text(data['data']);
        },
        error: function(data){
          alert('服务器错误');
        }
      })
    $.ajax({
        url: window.record_sum,
        type: 'POST',
        dataType: 'json',
        success: function(data){
         $('.span16 .portal-content-box .info-list .pay_buy_num h3 span.num').text(data['data']);
        },
        error: function(data){
          alert('服务器错误');
        }
      })
    
  })