<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xml:lang="zh-CN">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" /> 
  <title>立即购买</title> 
  <meta name="viewport" content="width=1226" /> 
  <link rel="stylesheet" href="/Public/Home/css/base.min.css" /> 
  <link rel="stylesheet" type="text/css" href="/Public/Home/css/buy-choose.min.css" />
  <script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/Public/Home/layer/layer.js"></script> 
  <script type="text/javascript" src="/Public/Home/js/index_artical.js"></script>
  <script type="text/javascript">
  window.addBuyMsg = '<?php echo U("Order/addBuyMsg");?>';
  window.checkLogin = '<?php echo U("Login/check");?>';
  </script> 
  <style type="text/css">
    .active-tab{
      background-color:#ccc;
    }
    .tabs{
      position: relative;
    }
    .tabs .tab-content{
      position: relative;
      top: 41px;
      left: 0px;
      border-top: 1px solid #ccc;
    }
    .tabs .tab-content .talk{
      height: 200px;
      overflow-y: scroll;
    }
  </style>
 </head> 
 <body> 
  <div class="site-header site-mini-header"> 
     <div class="container"> 
      <div class="header-logo"> 
       <a href="<?php echo U('Index/index');?>"><img src="/Public/Home/img/logo.png" width="300px" height="60px" /> </a>
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
<script type="text/javascript" src="/Public/Home/js/top1.js"></script>
<script type="text/javascript">
   window.check = '<?php echo U("Base/check");?>';
</script>

  
    <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="container buy-choose-box">  
       <div class="bd"> 
        <div class="pro-choose-main clearfix" style="margin:0px" id="J_chooseMain"> 
         <div class="pro-view" style="border:1px solid #ccc;"> 
            <div class="img-show" style="height:75%;">
              <img src="<?php echo ($vo["product_img"]); ?>" id="J_proImg" width="100%" height="100%" alt="<?php echo ($vo["product_img"]); ?>" />
            </div>
            <div class="tab-img" style="width:100%;height:25%;border:1px solid #eee">
              <ul>
                <?php if(is_array($vo[img_more])): $i = 0; $__LIST__ = array_slice($vo[img_more],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li style="width:130px;height:130px;border:1px solid #ccc;float:left;margin-left:10px;margin-top:10px;">
                  <img class="lazyload" src="<?php echo ($vo2["img_url"]); ?>" alt="<?php echo ($vo["img_url"]); ?>" width="100%;" height="100%" />
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
         </div> 
         <div class="pro-info"> 
          <div class="pro-title clearfix"> 
           <h1> <span class="pro-name J_proDesc"><?php echo ($vo["product_name"]); ?></span> <span class="pro-price J_proPrice">0元</span> </h1> 
           <input id="product_id" type="hidden" value="<?php echo ($vo["product_id"]); ?>" />
          </div> 
          <p></p> 
          <div id="J_proStep">
          <div class="pro-choose-step J_step">
            <p style="line-height:26px;text-indent:30px">简介：<?php echo ($vo["product_info"]); ?></p>
            <p style="line-height:26px;text-indent:30px">规格/参数：<?php echo ($vo["product_specifications"]); ?></p>
          </div>
          </div> 
          <div class="choose-result-msg" id="J_chooseResultMsg"> 
           <p class="msg-bd"></p> 
          </div> 
          <div class="pro-choose-result" id="J_chooseResultInit"> 
           <a href="javascript:void(0)" class="btn btn-line-primary">加入购物车</a> 
          </div> 
         </div> 
        </div>  
       </div> 
      </div>
      <div class="main-pro-box" id="J_proDetailBox"> 
       <div class="pro-detail-box"> 
        <div class="container">
          <div class="tabs" style="height:300px;border:1px solid #ccc;margin-top:50px;">
            <ul class="title">
              <li class="active-tab" style="float:left;list-style:none;padding:10px;border-right:1px solid #ccc">商品简介</li>
              <li style="float:left;list-style:none;padding:10px;border-right:1px solid #ccc">商品评价</li>
              <li style="float:left;list-style:none;padding:10px;border-right:1px solid #ccc">商品购买记录</li>
            </ul>
            <div class="tab-content">
              <ul>
                <li class="info" style="display:block;clear:both;margin-left:20px;">
                  <p>简介：<?php echo ($vo["product_info"]); ?></p>
                  <p>规格/参数：<?php echo ($vo["product_specifications"]); ?></p>
                </li>
                <li class="info talk" style="display:none;clear:both;margin-left:20px;">
                  <ul>
                    <?php if(is_array($talk)): $i = 0; $__LIST__ = $talk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><li style="clear:both">
                        <div style="width:80px;float:left">
                          <img src="/Public/Home/img/user.jpg" width="50px" height="50px">
                          <p><?php echo ($vo3["user_name"]); ?></p>
                        </div>
                        <div style="width:400px;float:left;margin-left:20px;border-bottom:1px solid #ccc;">
                          <p style="text-indent:30px;"><?php echo ($vo3["product_evaluate"]); ?></p>
                          <p style="float:right"><?php echo (date('y-m-d H:i:s',$vo["talk_time"])); ?></p>
                        </div>
                      </li><?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>
                </li>
                <li class="info" style="display:none;clear:both;margin-left:20px;">
                  
                </li>
              </ul>
            </div>
          </div>
        </div>
       </div> 
      </div>
      <div class="header-bar" id="J_headerBar" style="top:0px"> 
       <div class="container"> 
        <span class="pro-desc" id="J_headerBarDesc">购买<?php echo ($vo["product_name"]); ?></span>
        <a href="javascript:void(0)" class="btn btn-primary buy_btn">立即购买</a> 
       </div> 
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
  
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