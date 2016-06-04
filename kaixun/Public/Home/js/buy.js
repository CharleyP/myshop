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
            window.location = window.url_index;//'{:U("Index/index")}';
          },3000);  
        }
      },
      error: function(data){
        window.location = window.url_index;//'{:U("Index/index")}';
      }
    });
    //获取用于是否有收货地址
    $.ajax({
      url: window.getUser,
      type: 'POST',
      dataType: 'json',
      success: function(data){
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
    /*$(".site-mini-header #J_miniHeaderTitle").append('<h2>我的购物车</h2><p>温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</p>');  */  
    //点击加减改变一项总金额
    $("#J_cartListBody .col-num .change-goods-num a").click(function(event) {
      var num = $(this).parents('.item-box').find('.change-goods-num input').val();
      var price = parseFloat($(this).parents('.item-box').find('.col-price span').text()).toFixed(1);
      var product_stock = parseInt($(this).parents('.item-box').find('.col-name input').val());
      if ($(this).hasClass('J_minus')) {
        num--;
        if (num < 0) {
          num = 0;
        };
      }else{
        if (num >= product_stock) {
          alert('超出库存数量！');
        }else{
          num++;
        }
      }
      $(this).parents('.item-box').find('.change-goods-num input').attr('value',num);
      $(this).parents('.item-box').find('.col-total span').text(parseFloat(num*price).toFixed(1));
      changeAll();
    });

    //获取购物车总金额
    changeAll();
    function changeAll(){
      var box_num = $("#J_cartListBody .item-box").length;
      var all = 0,total = 0;
      for (var i = 0; i < $("#J_cartListBody .item-box").length; i++) {
        total = parseFloat($("#J_cartListBody .item-box").eq(i).find(".col-total span").text());
        if ($("#J_cartListBody .item-box").eq(i).find(".item-table .item-row .col-check i.icon-checkbox").hasClass('icon-checkbox-selected')) {
          all += total;
        };
      };
      all = parseFloat(all).toFixed(1);
      $("#J_cartBar .section-left #J_cartTotalNum").text(box_num);
      $("#J_cartBar #J_cartTotalPrice").text(all);
    }  
    //获取已经选择的商品
    box_check_num();
    function box_check_num(){
      var box_check_num = 0;
      for (var i = 0; i < $("#J_cartListBody .item-box").length; i++) {
        if ($("#J_cartListBody .item-box .item-table .item-row .col-check i.icon-checkbox").hasClass('icon-checkbox-selected')) {
          box_check_num++;
        };
      };
      $("#J_cartBar .section-left #J_selTotalNum").text(box_check_num);
    }  
    //单个选项选择是否
    $("#J_cartListBody .item-box .item-table .item-row .col-check i.icon-checkbox").click(function(event) {
      var product_id = $(this).parent('.col-check').find('input').val();
      if ($(this).hasClass('icon-checkbox-selected')) {
        $(this).removeClass('icon-checkbox-selected');
        var change_box_check_num = $("#J_cartBar .section-left #J_selTotalNum").text();
        change_box_check_num--;
        $("#J_cartBar .section-left #J_selTotalNum").text(change_box_check_num);
        changeAll();
        changeOneStatus(0,product_id);  
      }else{
        $(this).addClass('icon-checkbox-selected');
        var change_box_check_num = $("#J_cartBar .section-left #J_selTotalNum").text();
        change_box_check_num++;
        $("#J_cartBar .section-left #J_selTotalNum").text(change_box_check_num);
        changeAll();
        changeOneStatus(1,product_id);
      }
      function changeOneStatus(shop_buy_status,product_id){
        $.ajax({
          url: window.buyOneStatus,//'{:U("Order/buyOneStatus")}',
          type: 'POST',
          dataType: 'json',
          data: {
            product_id: product_id,
            shop_buy_status: shop_buy_status,
          },
          success: function(data){
            if (data['status'] == 1) {

            };
          },
          error: function(data){
            alert('服务器错误');
          }
        })
      }
      
    });
    //全选
    $("#J_cartBox .cart-goods-list .list-head .col-check i.icon-checkbox").click(function(event) {
      if ($(this).hasClass('icon-checkbox-selected')) {
        $(this).removeClass('icon-checkbox-selected');
        $("#J_cartListBody .item-box .item-table .item-row .col-check i.icon-checkbox").removeClass('icon-checkbox-selected');
        box_check_num();
        changeAll();
        changeAllStatus(0);
      }else{
        $(this).addClass('icon-checkbox-selected');
        $("#J_cartListBody .item-box .item-table .item-row .col-check i.icon-checkbox").addClass('icon-checkbox-selected');
        box_check_num();
        changeAll();
        changeAllStatus(1);
      }
    });
    function changeAllStatus(shop_buy_status){
      $.ajax({
        url: window.buyAllStatus,//'{:U("Order/buyAllStatus")}',
        type: 'POST',
        dataType: 'json',
        data: {
          shop_buy_status: shop_buy_status
        },
        success: function(data){
          
        },
        error: function(data){
          alert('服务器错误');
        }
      })
    }
    //生成订单
    $("#J_cartBar #J_goCheckout").click(function(event) {
      var buy_list_num = $("#J_cartListBody .item-box").length;
      var data= new Object();
      for (var i = 0; i < buy_list_num; i++) {
        var buy_list = new Object();
        buy_list['product_id'] = $("#J_cartListBody .item-box").eq(i).find('.col-check input').val();
        buy_list['product_buy_num'] = $("#J_cartListBody .item-box").eq(i).find('.col-num input').val();
        data[i] = buy_list;
      };
      $.ajax({
          url: window.buyOneNum,
          type: 'POST',
          dataType: 'json',
          data: {
            buy_list: data,
          },
          success: function(data){
            if (data['status'] == 1) {
            };
          },
          error: function(data){
            //alert('服务器错误');
          }
        })
      var MoneySum = $("#J_cartBar #J_cartTotalPrice").text();
      $.ajax({
        url: window.buySubmit,//'{:U("Order/buySubmit")}',
        type: 'POST',
        dataType: 'json',
        data: {
          order_sum: MoneySum,
        },
        success: function(data){
          window.location = window.allorder;//'{:U("User/allorder")}';
        },
        error: function(data){
          alert('服务器错误');
        }
      })
      
    });
    //在购物车中删去某一个物品
    $(".col-action a").click(function(event) {
      $(this).parents('.item-box').remove();
      var product_id = $(this).parent('.col-action').siblings('.col-check').find('input').val();
      changeAll();
      $.ajax({
        url: window.remove,//'{:U("Order/remove")}',
        type: 'POST',
        dataType: 'json',
        data: {
          product_id: product_id,
        },
        success: function(data){
          if (data['status'] == 1) {
              alert('删除成功')
          }else{
              alert('删除失败')
          }
        },
        error: function(data){
          alert('服务器错误');
        }
      })
    });
  })