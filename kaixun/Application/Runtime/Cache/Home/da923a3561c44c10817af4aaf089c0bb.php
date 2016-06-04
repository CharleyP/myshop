<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN" xml:lang="zh-CN">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" /> 
  <meta charset="UTF-8" /> 
  <title>我的购物车</title> 
  <meta name="viewport" content="width=1226" /> 
  <link rel="stylesheet" href="/Public/Home/css/base.min.css" /> 
  <link rel="stylesheet" type="text/css" href="/Public/Home/css/cart.min.css" /> 
  <script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/Public/Home/layer/layer.js"></script>
  <script type="text/javascript" src="/Public/Home/js/buy.js"></script>
  <script type="text/javascript">
    window.getUser = '<?php echo U("User/getUser");?>';
    window.check = '<?php echo U("Base/check");?>';
    window.buyOneStatus = '<?php echo U("Order/buyOneStatus");?>';
    window.buyAllStatus = '<?php echo U("Order/buyAllStatus");?>';
    window.buyOneNum = '<?php echo U("Order/buyOneNum");?>';
    window.buySubmit = '<?php echo U("Order/buySubmit");?>';
    window.remove = '<?php echo U("Order/remove");?>';
    window.url_index = '<?php echo U("Index/index");?>';
    window.allorder = '<?php echo U("User/allorder");?>';
  </script>
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

  
    <div class="page-main"> 
     <div class="container"> 
      <div class="cart-loading loading hide" id="J_cartLoading"> 
       <div class="loader"></div> 
      </div> 
      <div class="cart-empty hide" id="J_cartEmpty"> 
       <h2 style="margin-left:-60px">您的购物车还是空的！</h2> 
       <a href="<?php echo U('Index/index');?>" class="btn btn-primary btn-shoping J_goShoping">马上去购物</a> 
      </div> 
      <div id="J_cartBox" class=""> 
       <div class="cart-goods-list"> 
        <div class="list-head clearfix"> 
         <div class="col col-check">
          <i class="iconfont icon-checkbox icon-checkbox-selected" id="J_selectAll">√</i>全选
         </div> 
         <div class="col col-img">
          &nbsp;
         </div> 
         <div class="col col-name">
          商品名称
         </div> 
         <div class="col col-price">
          单价
         </div> 
         <div class="col col-num">
          数量
         </div> 
         <div class="col col-total">
          小计
         </div> 
         <div class="col col-action">
          操作
         </div> 
        </div> 
        <div class="list-body" id="J_cartListBody"> 
          <?php if(is_array($buy)): $i = 0; $__LIST__ = $buy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item-box"> 
              <div class="item-table J_cartGoods"> 
             <div class="item-row clearfix"> 
              <div class="col col-check"> 
               <i class="iconfont icon-checkbox icon-checkbox-selected J_itemCheckbox">√</i>
               <input type="hidden" value="<?php echo ($vo["product_id"]); ?>" /> 
              </div> 
              <div class="col col-img"> 
                  <a href="<?php echo U('Index/artical',array('id'=>$vo[product_id]));?>" target="_blank"> <img alt="" src="<?php echo ($vo["product_img"]); ?>" width="80" height="80" alt="<?php echo ($vo["product_name"]); ?>" /> 
                  </a> 
              </div> 
              <div class="col col-name"> 
               <div class="tags"> 
               </div> 
               <h3 class="name"> 
                <a href="<?php echo U('Index/artical',array('id'=>$vo[product_id]));?>" target="_blank"> 
                    <?php echo ($vo["product_name"]); ?><span style="font-size:12px"><?php echo ($vo["product_specifications"]); ?></span>
                    <input type="hidden" value="<?php echo ($vo["product_stock"]); ?>" />
                </a> 
               </h3> 
              </div> 
              <div class="col col-price">
                <span>0</span>元 
              </div> 
              <div class="col col-num"> 
               <div class="change-goods-num clearfix J_changeGoodsNum"> 
                <a href="javascript:void(0)" class="J_minus"><i class="iconfont"></i></a> 
                <input tyep="text" name="" value="1" data-num="1" data-buylimit="10" autocomplete="off" class="goods-num J_goodsNum" /> 
                <a href="javascript:void(0)" class="J_plus"><i class="iconfont"></i></a> 
               </div> 
              </div> 
              <div class="col col-total">
                <span>0</span>元 
               <!-- <p class="pre-info"> 已优惠0元 </p>  -->
              </div> 
              <div class="col col-action"> 
               <a id="1160700042_1_buy" data-msg="确定删除吗？" href="javascript:void(0);" title="删除" class="del J_delGoods"><i class="iconfont"></i></a> 
              </div> 
             </div> 
              </div> 
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div> 
       <div class="cart-bar clearfix cart-bar-fixed" id="J_cartBar"> 
        <div class="section-left"> 
         <a href="<?php echo U('Index/index');?>" class="back-shopping J_goShoping">继续购物</a> 
         <span class="cart-total">共 <i id="J_cartTotalNum">3</i> 件商品，已选择 <i id="J_selTotalNum">3</i> 件</span> 
        </div> 
        <span class="total-price"> 合计（不含运费）：<em id="J_cartTotalPrice"> </em> 元 </span> 
        <a href="javascript:void(0);" class="btn btn-a btn btn-primary" id="J_goCheckout">生成订单</a> 
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