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
      success: function(data){
        $("#user_old_name").text(data['data']['user_name']);
        $("#user_old_phone").text(data['data']['user_phone']);
        $("#user_old_address").text(data['data']['user_address']);
        if (data['data']['user_address'] == null) {
          layer.alert('请添加收货地址', {
                icon: 5,
                skin: 'layer-ext-moon'
              });
        };
      },
      error: function(data){
        alert('服务器错误');
      }
    })
    $(".J_addressModify").click(function(event) {
      var user_old_name = $("#user_old_name").text();
      var user_old_phone = $("#user_old_phone").text();
      var user_old_address = $("#user_old_address").text();
      layer.open({
        type: 1,
        title: false,
        closeBtn: 0,
        shadeClose: true,
        skin: 'yourclass',
        content: '<div class="address-edit-box" id="changeAddress"><div class="box-main"><div class="form-section form-section-active"> <label class="input-label" for="user_name">昵称</label> <input class="input-text J_addressInput" type="text" id="user_name" name="user_name" placeholder="" value="'+user_old_name+'" /> </div> <div class="form-section"> <label class="input-label" for="user_phone"></label> <input class="input-text J_addressInput" type="text" id="user_phone" name="user_phone" placeholder="" value="'+user_old_phone+'" readonly="true" /> </div> <div class="form-section form-section-active"> <label class="input-label" for="user_adress">收货地址</label> <textarea class="input-text J_addressInput" type="text" id="user_address" name="user_address" placeholder="">'+user_old_address+'</textarea> </div> </div> <div class="form-confirm clearfix"> <a href="javascript:void(0);" class="btn btn-primary" id="J_save">保存</a> </div></div></div>'
      });
      $("#J_save").click(function(event) {
        var user_name = $("#changeAddress #user_name").val();
        var user_phone = $("#changeAddress #user_phone").val();
        var user_address = $("#changeAddress #user_address").val();
        if (user_name == '' || user_phone == '' || user_address == '') {
          alert('信息不能为空');
        }else{
          $.ajax({
            url: window.changeAddress,
            type: 'POST',
            dataType: 'json',
            data: {
              name: user_name,
              phone: user_phone,
              address: user_address
            },
            success: function(data){
              if (data['status'] == 1) {
                window.location.reload();
              }else{
                alert('修改失败，请重试!');
              }
            },
            error: function(data){
              alert('服务器错误');
            }
          })
        }
      });
    });
    //评价
    $('.order-items-table tr td a.evaluate').hover(function() {
      $(this).removeClass('btn-default').addClass('btn-primary');
    }, function() {
      $(this).removeClass('btn-primary').addClass('btn-default');
    });
    $('.order-items-table tr td a.evaluate').click(function(event) {
      var product_name = $(this).parents('tr').find('.name-hidden').val();
      var product_id = $(this).parents('tr').find('.id-hidden').val();
      layer.open({
        type: 1,
        title: false,
        closeBtn: 0,
        shadeClose: true,
        skin: 'yourclass',
        content: '<div class="add-evaluate"><p style="text-align:center;font-size:18px">'+product_name+'</p><textarea style="width:260px;margin-left:50px;height:150px">在次输入评价</textarea><a href="javascript:void(0)" class="submit-evaluate btn btn-default" style="margin-top:20px;margin-left:100px;margin-bottom:20px">评价</a></div>'
      });
      $('.submit-evaluate').click(function(event) {
        var evaluate_con = $('.add-evaluate textarea').text();
        $.ajax({
          url: window.getEvaluate,
          type: 'POST',
          dataType: 'json',
          data: {
            product_id: product_id,
            evaluate:evaluate_con
          },
          success:function(data){
            if (data.status == 1) {
              window.location.reload();
            };
          },
          error:function(data){
            alert('服务器错误');
          }
        })
      });
    });
  })