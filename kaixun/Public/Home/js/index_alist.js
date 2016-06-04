$(document).ready(function() {
    //点击一下加入购物车向数据表里写入一条数据
    $(".channel-list .span5 .channel-list-con p.channel-list-btn").click(function(event) {
      $.ajax({
      url: window.checkLogin,
      type: 'post',
      dataType: 'json',
      data: {param1: 'value1'},
      success:function(data){
        if (data.status == 1) {
            var product_id = $(this).parents('.span5').find(".channel-list-con dl dt input").attr('value');//商品id
            var product_price = $(this).parents('.span5').find(".channel-list-con dl dt b.price").text();//商品价格
            var product_num = 1;//商品数量
            //商品状态,1表示添加进购物车，0表示在购物车页面取消选择，2表示在购物车页面已生成订单
            $.ajax({
              url: window.addBuyMsg,
              type: 'POST',
              dataType: 'json',
              data: {
                product_id: product_id,
                product_num: product_num,
                product_price: product_price,
              },
              success: function(data){
                if (data['status'] == 1) {
                  layer.alert('加入购物车成功', {
                    icon: 1,
                    skin: 'layer-ext-moon'
                  })
                };
              },
              error: function(data){
                alert('服务器错误');
              }
            })
        }else{
          alert('你还没有登录!');
        }
      },
      error:function(data){
        console.log('ajax error');
      }
    })      
    });
  })