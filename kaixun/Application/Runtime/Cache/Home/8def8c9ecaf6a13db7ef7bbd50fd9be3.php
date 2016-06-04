<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN" xml:lang="zh-CN">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" /> 
  <meta charset="UTF-8" /> 
  <title>查看订单</title> 
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
    window.getEvaluate = '<?php echo U("Order/addEvaluate");?>'
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
      <a href="<?php echo U('Index/index');?>">首页</a>
      <span class="sep">&gt;</span>
      <span>订单详情</span> 
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
            <div class="uc-content-box order-view-box"> 
            <div class="box-hd"> 
             <h1 class="title">订单详情<small>请谨防钓鱼链接或诈骗电话</small></h1> 
             <div class="more clearfix"> 
              <h2 class="subtitle">订单号：<?php if(is_array($sum)): $i = 0; $__LIST__ = $sum;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["order_num"]); endforeach; endif; else: echo "" ;endif; ?></h2> 
             </div> 
            </div> 
            <div class="box-bd"> 
             <div class="uc-order-item uc-order-item-finish"> 
              <div class="order-detail"> 
               <table class="order-items-table"> 
                <tbody>
                <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> 
                  <td class="col col-thumb"> 
                   <div class="figure figure-thumb"> 
                    <a target="_blank" href="<?php echo U('Index/artical',array('id'=>$vo[pk_product_id]));?>"> <img src="<?php echo ($vo["product_img"]); ?>" width="80" height="80" alt="<?php echo ($vo["product_img"]); ?>" /> </a> 
                   </div> </td> 
                   <input type="hidden" class="name-hidden" value="<?php echo ($vo["product_name"]); ?>" />
                   <input type="hidden" class="id-hidden" value="<?php echo ($vo["product_id"]); ?>" />
                  <td class="col col-name"> <p class="name"> <a class="pro_name" target="_blank" href="<?php echo U('Index/artical',array('id'=>$vo[product_id]));?>"><?php echo ($vo["product_name"]); ?></a> </p> </td> 
                  <td class="col col-price"> <p class="price">0元 &times; <?php echo ($vo["product_num"]); ?></p> </td> 
                  <td class="col col-actions"><a href="javascript:void(0)" class="evaluate btn btn-default">评价</a></td> 
                 </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
               </table> 
              </div> 
              <div id="editAddr" class="order-detail-info"> 
               <h3>收货信息</h3> 
               <?php if(is_array($msg)): $i = 0; $__LIST__ = $msg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table class="info-table"> 
                  <tbody>
                   <tr> 
                    <th>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</th> 
                    <td><?php echo ($vo["user_name"]); ?></td> 
                   </tr> 
                   <tr> 
                    <th>联系电话：</th> 
                    <td><?php echo ($vo["user_phone"]); ?></td> 
                   </tr> 
                   <tr> 
                    <th>收货地址：</th> 
                    <td><?php echo ($vo["user_address"]); ?></td> 
                   </tr> 
                  </tbody>
                 </table><?php endforeach; endif; else: echo "" ;endif; ?>
              </div>  
              <div class="order-detail-total"> 
               <table class="total-table"> 
                <tbody>
                 <tr> 
                  <th class="total">订单金额：</th> 
                  <td class="total"><span class="num"><?php if(is_array($sum)): $i = 0; $__LIST__ = $sum;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["order_sum"]); endforeach; endif; else: echo "" ;endif; ?></span>元</td> 
                 </tr> 
                </tbody>
               </table> 
              </div> 
             </div> 
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