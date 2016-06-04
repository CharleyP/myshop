$(function(){
  //顶部 左侧 全部商品分类下拉
    $("#J_navCategory").hover(function() {
      $('#J_navMenu').slideUp();
      $('#J_navCategory .site-category').show();
    }, function() {
      $('#J_navMenu').slideUp();
      $('#J_navCategory .site-category').hide();
      $('#J_navCategory .site-category ul li').removeClass('category-item-active');
    });
    
    $("#J_navCategory .site-category ul li").hover(function() {
      $(this).addClass('category-item-active').siblings().removeClass('category-item-active');
    });
})

    