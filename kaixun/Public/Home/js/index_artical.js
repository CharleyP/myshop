$(document).ready(function() {
      $("#J_chooseResultInit .btn-line-primary,#J_headerBar .buy_btn").click(function(event) {
        $.ajax({
          url: window.checkLogin,
          type: 'post',
          dataType: 'json',
          data: {param1: 'value1'},
          success:function(data){
            if (data.status == 1) {
                var product_id = $('#product_id').attr('value');//商品id
                var product_price = parseFloat($('.J_proPrice').text());//商品价格
                var product_num = 1;//商品数量
                $.ajax({
                  url: window.addBuyMsg,
                  type: 'POST',
                  dataType: 'json',
                  data: {
                    product_id: product_id,
                    product_num: product_num,
                    product_price: product_price,
                  },
                  success:function(data){
                    if (data['status'] == 1) {
                      layer.alert('加入购物车成功', {
                        icon: 1,
                        skin: 'layer-ext-moon'
                      })
                    };
                  },
                  error:function(data){
                    alert('服务器错误，请检测您是否未登录!')
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
      //鼠标滑动切换图片
      $('.tab-img ul li').hover(function() {
        var img_src = $(this).find('img').attr('src');
        console.log(img_src);
        $('.img-show img').attr('src', img_src);
      });
      //tab
      var tab_index = 0;
      $('.tabs ul.title li').hover(function() {
        $(this).addClass('active-tab').siblings().removeClass('active-tab');
        tab_index = $(this).index();
        $('.tab-content ul li.info').eq(tab_index).show().siblings().hide();
      });
    }) 