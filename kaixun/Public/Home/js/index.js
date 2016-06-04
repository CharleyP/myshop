 $(function(){
      //鼠标滑过添加阴影
      $(".home-main .container #smart .J_brickBd .row .brick-promo-list .brick-item-l,.home-main .container #smart .J_brickBd .row .clearfix .brick-item-m-2,#match .J_brickBd .row .span16 .tab-container ul.tab-content li.brick-item,#match .J_brickBd .row .span4 .brick-promo-list li").hover(function() {
        $(this).css({"box-shadow":"0px 0px 15px #ccc"});
      }, function() {
        $(this).css({"box-shadow":"none"});
      });
      //左侧导航栏显示
      $("#match .box-hd .J_brickNav .J_brickTabSwitch li").hover(function() {
        $(this).addClass('tab-active').siblings().removeClass('tab-active');
        var i = $(this).index();
        $("#match .J_brickBd .row .span16 .tab-container ul.tab-content").eq(i).show().siblings().hide();
      });
      //
      $(".site-header .header-nav .J_navMainList #J_navCategory .site-category #J_categoryList .category-item").hover(function() {
        $(this).addClass('category-item-active');
        $(this).find('.children').show();
      }, function() {
        $(this).removeClass('category-item-active');
        $(this).find('.children').hide();
      });
      $(".home-hero-container .home-hero-slider .ui-wrapper .ui-viewport #J_homeSlider .slide").eq(0).show().siblings().hide();
      $(".home-hero-container .home-hero-slider .ui-has-controls-direction .ui-default-pager .ui-pager-item").hover(function(){
        $(this).addClass('active');
      })
      //banner
      $(".home-hero-container .home-hero-slider .ui-has-controls-direction .ui-default-pager .ui-pager-item").click(function(){
        $(this).find("a").addClass('active').parent().siblings().find('a').removeClass('active');
        var index = $(this).index();
        $(".home-hero-container .home-hero-slider .ui-wrapper .ui-viewport #J_homeSlider .slide").eq(index).fadeIn(500).siblings().fadeOut(500);
      })
      var index=0;
      var timer = setInterval(function(){
        index++;
        if (index==5) {
          index = 0;
        };
        $(".home-hero-container .home-hero-slider .ui-has-controls-direction .ui-default-pager .ui-pager-item").eq(index).find("a").addClass('active').parent().siblings().find("a").removeClass('active');
        $(".home-hero-container .home-hero-slider .ui-wrapper .ui-viewport #J_homeSlider .slide").eq(index).fadeIn(500).siblings().fadeOut(500);
      },5000);
      //主页明星产品切换
      $(".home-star-goods .xm-plain-box .box-hd .xm-controls-line-small a.control-next").click(function(){
        $(".box-bd .xm-carousel-wrapper ul.xm-carousel-col-5-list").css({
          marginLeft: '-100%'
        });
        $(this).addClass('control-disabled').siblings().removeClass('control-disabled');
      })
      $(".home-star-goods .xm-plain-box .box-hd .xm-controls-line-small a.control-prev").click(function(){
        $(".box-bd .xm-carousel-wrapper ul.xm-carousel-col-5-list").css({
          marginLeft: '0'
        });
        $(this).addClass('control-disabled').siblings().removeClass('control-disabled');
      })

      $(".J_brickNav .J_brickTabSwitch li").eq(0).addClass('tab-active');
      $("#match-content ul").eq(0).removeClass('tab-content-hide').addClass('tab-content-active');
      var i=0;
      $(document).on('click', '.J_brickNav .sell_next', function(event) {
        //event.preventDefault();
          i++;
          if (i>=3) {
            $('.J_brickNav .sell_next').unbind('click');
            i=2;
          }else{
            $("#recommend-bd .xm-carousel-col-5-list").css('margin-left', -1240*i+'px');
          }
      });
      $(document).on('click', '.J_brickNav .sell_prev', function(event) {
        //event.preventDefault();
          i--;
          if (i<0) {
            $('.J_brickNav .sell_prev').unbind('click');
            i=0;
          }else{
            $("#recommend-bd .xm-carousel-col-5-list").css('margin-left', -1240*i+'px');
          }
      });      
    })