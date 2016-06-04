<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN" xml:lang="zh-CN">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" /> 
  <meta charset="UTF-8" /> 
  <title>订单列表</title> 
  <meta name="viewport" content="width=1226" /> 
  <meta name="description" content="" /> 
  <link rel="stylesheet" href="/Public/Home/css/base.min.css" /> 
  <link rel="stylesheet" type="text/css" href="/Public/Home/css/main.min.css" /> 
  <script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/Public/Home/js/top_slide.js"></script> 
  <script type="text/javascript" src="/Public/Home/js/left_slide.js"></script>
  <script type="text/javascript" src="/Public/Home/layer/layer.js"></script>
  <script type="text/javascript" src="/Public/Home/js/address.js"></script>
  <script type="text/javascript">
  window.check = '<?php echo U("Base/check");?>';
  window.url_index = '<?php echo U("Index/index");?>';
  window.getUser = '<?php echo U("User/getUser");?>';
  window.changeAddress = '<?php echo U("User/changeAddress");?>';
  </script>
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
  
    <div class="breadcrumbs"> 
     <div class="container"> 
      <a href="<?php echo U('Index/index');?>" data-stat-id="b0bcd814768c68cc">首页</a>
      <span class="sep">&gt;</span>
      <span>我的订单</span> 
     </div> 
    </div> 
    <div class="page-main user-main"> 
     <div class="container"> 
      <div class="row"> 
       <block name="right"><div class="span4"> 
<div class="uc-box uc-sub-box"> 
 <div class="uc-nav-box"> 
  <div class="box-hd"> 
   <h3 class="title">订单中心</h3> 
  </div> 
  <div class="box-bd"> 
   <ul class="uc-nav-list"> 
    <li class=""><a href="<?php echo U('User/allorder');?>">我的订单</a></li>  
   </ul> 
  </div> 
 </div> 
 <div class="uc-nav-box"> 
  <div class="box-hd"> 
   <h3 class="title">个人中心</h3> 
  </div> 
  <div class="box-bd"> 
   <ul class="uc-nav-list"> 
    <li><a href="<?php echo U('User/index');?>">我的个人中心</a></li>  
    <li><a href="<?php echo U('User/address');?>">收货地址</a></li> 
   </ul> 
  </div> 
 </div> 
 <div class="uc-nav-box"> 
  <div class="box-hd"> 
   <h3 class="title">账户管理</h3> 
  </div> 
  <div class="box-bd"> 
   <ul class="uc-nav-list"> 
    <li><a href="<?php echo U('User/changePsw');?>" target="_blank">修改密码</a></li> 
   </ul> 
  </div> 
 </div> 
</div> 
</div>   
       <div class="span16"> 
        <div class="uc-box uc-main-box"> 
         <div class="uc-content-box order-list-box"> 
          <div class="box-hd"> 
           <h1 class="title">我的订单<small>请谨防钓鱼链接或诈骗电话</small></h1> 
         
          </div> 
          <div class="box-bd"> 
           <div id="J_orderList">
            <ul class="order-list">
              <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="uc-order-item uc-order-item-finish"> 
                <div class="order-detail">  
                 <table class="order-detail-table"> 
                  <thead> 
                   <tr> 
                    <th class="col-main"> <p class="caption-info"><?php echo (date('y-m-d H:i:s',$vo["order_time"])); ?><span class="sep">|</span><?php echo ($vo["user_name"]); ?><span class="sep">|</span>订单号：<a href="<?php echo U('User/order',array('num' => $vo[order_id]));?>"><?php echo ($vo["order_num"]); ?></a></p> </th> 
                    <th class="col-sub"> <p class="caption-price">订单金额：<span class="num"><?php echo ($vo["order_sum"]); ?></span>元</p> </th> 
                   </tr> 
                  </thead> 
                  <tbody> 
                   <tr> 
                    <td class="order-items"> 
                     <ul class="goods-list">
                      
                      <a href="<?php echo U('User/order',array('num' => $vo[order_id]));?>" class="btn btn-line-gray" style="margin-left:300px">点击查看完整订单</a> 
                     </ul> </td> 
                   </tr> 
                  </tbody> 
                 </table> 
                </div> </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
           </div> 
          </div> 
         </div> 
        </div> 
       </div> 
      
     </div> 
    </div>
  </block>
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