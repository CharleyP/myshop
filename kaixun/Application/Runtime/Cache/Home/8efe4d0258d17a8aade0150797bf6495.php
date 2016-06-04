<?php if (!defined('THINK_PATH')) exit();?><div class="site-header"> 
   <div class="container"> 
    <div class="header-logo"> 
     <a href="<?php echo U('Index/index');?>"><img src="/Public/Home/img/index.jpg" width="200px" height="60px" /> </a>
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
                        <img class="thumb" src="/Public/Home/img/index.jpg"  width="40" height="40" alt="" />
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
                  <img src="/Public/Home/img/index.jpg"  alt="<?php echo ($vo2["product_name"]); ?>" width="160" height="110" />
                 </a> 
                </div> 
                <div class="title">
                 <a href="" ><?php echo ($vo2["product_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo2["product_specifications"]); ?></a>
                </div> <p class="price"><?php echo ($vo2["product_price"]); ?></p> 
               </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul> 
           </div> 
          </div> 
         </li><?php endforeach; endif; else: echo "" ;endif; ?>
     </ul> 
    </div> 
    <div class="header-search"> 
     <form id="J_searchForm" class="search-form clearfix" action="<?php echo U('Index/searchProduct');?>" method="post"> 
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