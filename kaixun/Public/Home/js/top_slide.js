$(function(){
  //顶部下拉栏
      $("li.nav-item").hover(function() {
        $(this).addClass("nav-item-active");
        $('#J_navMenu').slideDown();
        var navMenu = $(this).find("ul.children-list").html();
        $("#J_navMenu ul.children-list").empty();
        $("#J_navMenu ul.children-list").append(navMenu);
        //console.log(navMenu);
      }, function() {
        $(this).removeClass("nav-item-active");
      });
      $('#J_navMenu').hover(function() {
        
      }, function() {
        $('#J_navMenu').slideUp();
      });
      $(".site-topbar").hover(function() {
       $('#J_navMenu').slideUp();
      });

      //登录成功后页面页面新效果
          $("#J_userMsg .user").hover(function() {
            $(this).addClass('user-active');
            $(this).find('.user-menu').slideDown();
          }, function() {
            $(this).find('.user-menu').slideUp();
            $(this).removeClass('user-active');
          });
})


      
