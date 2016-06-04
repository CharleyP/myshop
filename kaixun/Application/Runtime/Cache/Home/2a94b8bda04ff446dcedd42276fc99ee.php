<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN" xml:lang="zh-CN">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" /> 
  <meta charset="UTF-8" /> 
  <title>凯训线材-专卖网站</title> 
  <script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/Public/Home/js/top_slide.js"></script>
  <script type="text/javascript" src="/Public/Home/js/index.js"></script> 
  <link rel="stylesheet" href="/Public/Home/css/base.min.css" /> 
  <link rel="stylesheet" href="/Public/Home/css/index.min.css" />
 </head> 
 <body>
   <div class="site-topbar"> 
    <div class="container"> 
     <div class="topbar-cart" id="J_miniCartTrigger"> 
      <a class="cart-mini" id="J_miniCartBtn" href="<?php echo U('Order/buy');?>"><i class="iconfont"></i>购物车&nbsp;<span class="cart-mini-num J_cartNum">（0）</span></a> 
      <div class="cart-menu" id="J_miniCartMenu" style="display: none;">
       <div class="loading">
        <div class="loader"></div>
       </div>
      </div> 
     </div> 
     <div class="topbar-info" id="J_userInfo" style="display:block"> 
       <a class="link" href="<?php echo U('Login/index');?>" data-needlogin="true" >登录</a>
       <span class="sep">|</span>
       <a class="link" href="<?php echo U('Login/register');?>" >注册</a> 
      </div>
     <div class="topbar-info" id="J_userMsg" style="display:none">
       <span class="user">
         <a class="user-name" href="<?php echo U('User/index');?>" target="_blank">
            <span class="name"> </span><i class="iconfont"></i>
         </a>
          <ul class="user-menu" style="display: none;">
            <li><a href="<?php echo U('User/index');?>" target="_blank">个人中心</a></li>
            <li><a href="<?php echo U('Login/resetting');?>" target="_blank">修改密码</a></li>
            <li><a href="<?php echo U('User/address');?>" target="_blank">收货地址</a></li>
            <li><a href="<?php echo U('Login/logout');?>">退出登录</a></li>
          </ul>
       </span>
       <span class="sep">|</span>
       <a class="link link-order" href="<?php echo U('User/allorder');?>" target="_blank">我的订单</a>
     </div>
    </div> 
   </div>
   <script type="text/javascript">
   window.check = '<?php echo U("Base/check");?>';
   </script>
   <script type="text/javascript" src="/Public/Home/js/top1.js"></script>
   <div class="site-header"> 
   <div class="container"> 
    <div class="header-logo"> 
     <a href="<?php echo U('Index/index');?>"><img src="/Public/Home/img/logo.png" width="300px" height="60px" /> </a>
    </div>
    <div class="header-nav"> 
     <ul class="nav-list J_navMainList clearfix"> 
      <li id="J_navCategory" class="nav-category"> 
       <a class="link-category" href="javascript:void(0)" style="height:88px"><span class="text"></span></a> 
       <div class="site-category"> 
        <ul id="J_categoryList" class="site-category-list clearfix" style="border:1px solid #000"> 
          <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="category-item"> <a class="title" href="javascript:void(0)"><?php echo ($vo["category1_name"]); ?><i class="iconfont"></i></a>
              <div class="children clearfix children-col-1">
                <ul class="children-list children-list-col children-list-col-1">
                  <?php if(is_array($vo['category2'])): $i = 0; $__LIST__ = $vo['category2'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li> 
                      <a class="link" href="<?php echo U('Index/alist',array('cat' => $vo2[category2_id]));?>" >
                        <img class="thumb" src="/Public/Home/img/ca2.png"  width="40" height="40" alt="" />
                        <span class="text"><?php echo ($vo2["category2_name"]); ?></span>
                      </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
              </div> 
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
       </div></li> 
      <?php if(is_array($top_menu)): $i = 0; $__LIST__ = $top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="nav-item"> <a class="link" href="javascript:void(0);"><span class="text"><?php echo ($vo["category2_name"]); ?></span><span class="arrow"></span></a> 
          <div class="item-children"> 
           <div class="container"> 
            <ul class="children-list clearfix"> 
              <?php if(is_array($vo['product'])): $i = 0; $__LIST__ = $vo['product'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li class=""> 
                <div class="figure figure-thumb"> 
                 <a href="<?php echo U('Index/artical',array('id'=>$vo2[product_id]));?>" >
                  <img src="<?php echo ($vo2["product_img"]); ?>"  alt="<?php echo ($vo2["product_name"]); ?>" width="160" height="110" />
                 </a> 
                </div> 
                <div class="title">
                 <a href="" ><?php echo ($vo2["product_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo2["product_specifications"]); ?></a>
                </div> <p class="price">0元</p> 
               </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul> 
           </div> 
          </div> 
         </li><?php endforeach; endif; else: echo "" ;endif; ?>
     </ul> 
    </div> 
    <div class="header-search"> 
     <form id="J_searchForm" class="search-form clearfix" action="<?php echo U('Index/search');?>" method="post">
      <label for="search" class="hide">站内搜索</label> 
      <input class="search-text" type="search" id="search" name="keywords" autocomplete="off" /> 
      <input type="submit" class="search-btn iconfont" value="" /> 
      <div id="J_keywordList" class="keyword-list hide">
       <ul class="result-list"></ul>
      </div>
     </form> 
    </div> 
   </div> 
   <div id="J_navMenu" class="header-nav-menu header-nav-menu-active" style="display: none;">
    <div class="container">
     <ul class="children-list clearfix"> 

     </ul>
    </div>
   </div>
  </div>
   
    <div class="home-hero-container container"> 
     <div class="home-hero"> 
      <div class="home-hero-slider"> 
       <div class="ui-wrapper" style="max-width: 100%;">
        <div class="ui-viewport" style="width: 100%; overflow: hidden; position: relative; height: 460px;">
         <div id="J_homeSlider" class="xm-slider" data-stat-title="焦点图轮播" style="width: auto; position: relative;"> 
          <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo4): $mod = ($i % 2 );++$i;?><div class="slide loaded"  style="float: none; list-style: none; position: absolute; width: 1226px; z-index: 0; display: none;"> 
             <a href="" target="_blank" ><img src="<?php echo ($vo4["banner_url"]); ?>"/></a> 
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
         </div>
        </div>
        <div class="ui-controls ui-has-pager ui-has-controls-direction">
         <div class="ui-pager ui-default-pager">
          <div class="ui-pager-item">
           <a href="javascript:void(0)" data-slide-index="0" class="ui-pager-link active">1</a>
          </div>
          <div class="ui-pager-item">
           <a href="javascript:void(0)" data-slide-index="1" class="ui-pager-link">2</a>
          </div>
          <div class="ui-pager-item">
           <a href="javascript:void(0)" data-slide-index="2" class="ui-pager-link">3</a>
          </div>
          <div class="ui-pager-item">
           <a href="javascript:void(0)" data-slide-index="3" class="ui-pager-link">4</a>
          </div>
          <div class="ui-pager-item">
           <a href="javascript:void(0)" data-slide-index="4" class="ui-pager-link">5</a>
          </div>
         </div>
         <!-- <div class="ui-controls-direction">
          <a class="ui-prev" href="javascript:void(0)" >上一张</a>
          <a class="ui-next" href="javascript:void(0)" >下一张</a>
         </div> -->
        </div>
       </div> 
      </div> 
     </div> 
     <div class="home-star-goods xm-carousel-container" id="J_homeStar"> 
      <div class="xm-plain-box"> 
       <div class="box-hd"> 
        <h2 class="title">销量排行</h2> 
        <div class="more">
         <div class="xm-controls xm-controls-line-small xm-carousel-controls">
          <a class="control control-prev iconfont control-disabled" href="javascript: void(0);"></a>
          <a class="control control-next iconfont" href="javascript: void(0);"></a>
         </div>
        </div> 
       </div> 
       <div class="box-bd"> 
        <div class="xm-carousel-wrapper" style="height: 340px; overflow: hidden;">
         <ul class="xm-carousel-list xm-carousel-col-5-list goods-list rainbow-list clearfix J_carouselList" style="width: 2480px; margin-left: 0px; transition: margin-left 0.5s ease;"> 
          <?php if(is_array($selling)): $i = 0; $__LIST__ = $selling;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="rainbow-item-1"> <a class="thumb" href="<?php echo U('Index/artical',array('id' => $vo[product_id]));?>" target="_blank" ><img src="<?php echo ($vo["product_img"]); ?>"  alt="<?php echo ($vo["product_name"]); ?>" height="100%" /></a> <h3 class="title"><a target="_blank"><?php echo ($vo["product_name"]); ?></a></h3> <p class="desc"><?php echo ($vo["product_specifications"]); ?></p> <p class="price">0元</p> </li><?php endforeach; endif; else: echo "" ;endif; ?>
         </ul>
        </div> 
       </div> 
      </div> 
     </div>
    </div> 
    <div class="page-main home-main"> 
     <div class="container"> 
      <div id="match" class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded" data-from-stat="true" data-region-stat="1"> 
       <div class="box-hd"> 
        <h2 class="title">搭配</h2> 
        <div class="more J_brickNav">
         <ul class="tab-list J_brickTabSwitch" data-tab-target="match-content">
          <?php if(is_array($wire)): $i = 0; $__LIST__ = $wire;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php echo ($vo["category2_name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
         </ul>
        </div> 
       </div> 
       <div class="box-bd J_brickBd">
        <div class="row">
         <div class="span4 span-first">
          <ul class="brick-promo-list clearfix"> 
              <li class="brick-item brick-item-m"> <a href="javascript:void(0)" target="_blank"><img src="/Public/Home/img/logo1.jpg" width="160" height="160" alt="<?php echo ($vo["category2_name"]); ?>"/></a> </li>
              <li class="brick-item brick-item-m"> <a href="javascript:void(0)" target="_blank"><img src="/Public/Home/img/logo2.jpg" width="160" height="160" alt="<?php echo ($vo["category2_name"]); ?>"/></a> </li>
          </ul>
         </div>
         <div class="span16">
          <div id="match-content" class="tab-container">
            <?php if(is_array($wire)): $i = 0; $__LIST__ = $wire;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="brick-list tab-content clearfix tab-content-hide">  
                <?php if(is_array($vo['pro'])): $i = 0; $__LIST__ = $vo['pro'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li class="brick-item brick-item-m"> 
                 <div class="figure figure-img"> 
                  <a href="<?php echo U('Index/artical',array('id' => $vo2[product_id]));?>" ><img src="<?php echo ($vo2["product_img"]); ?>" width="150" height="150" alt="<?php echo ($vo2["product_name"]); ?>" /></a> 
                 </div> <h3 class="title"> <a href="<?php echo U('Index/artical',array('id' => $vo2[product_id]));?>" ><?php echo ($vo2["product_name"]); ?> </a></h3> <p class="price"> <span class="num">0</span>元 </p> <h3 class="title"> <a><?php echo ($vo2["product_specifications"]); ?> </a></h3>
                 <div class="review-wrapper"> 
                  <a href="<?php echo U('Index/artical',array('id' => $vo2[product_id]));?>"> <span class="review"><?php echo ($vo2["product_info"]); ?></span></a> 
                 </div> </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
         </div>
        </div>
       </div> 
      </div> 
      <div id="recommend" class="home-recm-box home-brick-box home-brick-row-1-box xm-plain-box J_itemBox J_recommendBox is-visible" data-region-stat="1"> 
       <div class="box-hd"> 
        <h2 class="title">最新产品</h2> 
        <div class="more J_brickNav">
         <div class="xm-controls xm-controls-line-small xm-carousel-controls">
          <a class="control control-prev iconfont sell_prev" href="javascript: void(0);"></a>
          <a class="control control-next iconfont sell_next" href="javascript: void(0);"></a>
         </div>
        </div> 
       </div> 
       <div id="recommend-bd" class="box-bd J_brickBd J_recommend-like container xm-carousel-container">
        <div class="xm-recommend">
         <div class="xm-carousel-wrapper" style="height: 330px; overflow: hidden;">
          <ul class="xm-carousel-col-5-list xm-carousel-list clearfix" data-carousel-list="true" style="width: 4960px; margin-left: 0px; transition: margin-left 0.5s ease;"> 
            <?php if(is_array($new_list)): $i = 0; $__LIST__ = $new_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="J_xm-recommend-list"> 
              <dl> 
             <dt> 
              <a href="<?php echo U('Index/artical',array('id'=>$vo[product_id]));?>"> <img src="<?php echo ($vo["product_img"]); ?>" alt="<?php echo ($vo["product_name"]); ?>" style="height:100%" /> </a> 
             </dt> 
             <dd class="xm-recommend-name"> 
              <a href="<?php echo U('Index/artical',array('id'=>$vo[product_id]));?>" target="_blank"> <?php echo ($vo["product_name"]); ?> </a> 
             </dd> 
             <dd class="xm-recommend-price">
              0元
             </dd> 
             <dd class="xm-recommend-tips">
               <?php echo ($vo["product_specifications"]); ?> 
             </dd> 
              </dl>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
         </div>
        </div>
       </div> 
      </div> 
    </div>   
   
  <div class="site-footer"> 
   <div class="container"> 
    <div class="footer-service"> 
     <ul class="list-service clearfix"> 
      <li><a rel="nofollow" href="http://www.mi.com/service/exchange#repaire" target="_blank" data-stat-id="da46b3d5586757a4" ><i class="iconfont"></i>1小时快修服务</a></li> 
      <li><a rel="nofollow" href="http://www.mi.com/service/exchange#back" target="_blank" data-stat-id="78babcae8a619e26" ><i class="iconfont"></i>7天无理由退货</a></li> 
      <li><a rel="nofollow" href="http://www.mi.com/service/exchange#free" target="_blank" data-stat-id="d1745f68f8d2dad7" ><i class="iconfont"></i>15天免费换货</a></li> 
      <li><a rel="nofollow" href="http://www.mi.com/service/exchange#mail" target="_blank" data-stat-id="f1b5c2451cf73123" ><i class="iconfont"></i>满150元包邮</a></li> 
      <li><a rel="nofollow" href="http://www.mi.com/c/service/poststation/" target="_blank" data-stat-id="caf836ab93cdfd31" ><i class="iconfont"></i>520余家售后网点</a></li> 
     </ul> 
    </div> 
   </div> 
  </div> 
  <div class="site-info"> 
   <div class="container"> 
    <div class="logo ir">
     小米官网
    </div> 
    <div class="info-text"> 
     <p class="sites" style="color:#000"><a href="javascript:void(0)" target="_blank"  style="color:#000">烟台****工业有限公司</a><span class="sep">&nbsp;|&nbsp;</span><a href="javascript:void(0)" target="_blank"  style="color:#000">公司地址：山东省烟台市芝罘区红旗中路鲁东大学</a><span class="sep">&nbsp;|&nbsp;</span><a href="javascript:void(0)" target="_blank"  style="color:#000">邮政编码：000000</a></p>
     <p class="sites" style="color:#000"><a href="javascript:void(0)" target="_blank"  style="color:#000">客服热线：1300000000</a><span class="sep">&nbsp;|&nbsp;</span><a href="javascript:void(0)" target="_blank"  style="color:#000">业务热线：1300000000</a><span class="sep">&nbsp;|&nbsp;</span><a href="javascript:void(0)" target="_blank"  style="color:#000">图片传真：1300000000</a><span class="sep">&nbsp;|&nbsp;</span><a href="javascript:void(0)" target="_blank"  style="color:#000">联系电话：1300000000</a></p> 
    </div> 
    <div class="info-links"> 
     <a href="" target="_blank" ><img src="/Public/Home/images/v-logo-2.png" alt="诚信网站" /></a> 
     <a href="" target="_blank" ><img src="/Public/Home/images/v-logo-1.png" alt="可信网站" /></a> 
     <a href="" target="_blank" ><img src="/Public/Home/images/v-logo-3.png" alt="网上交易保障中心" /></a> 
    </div> 
   </div> 
   <div class="slogan ir">
    探索黑科技，小米为发烧而生
   </div> 
  </div>
 </body>
</html>