<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//左侧导航栏部分
    	$category1 = D('category1');
        $img = D('img');
    	$category = $category1 -> relation('category2') -> select();
    	$this -> assign('category',$category);
    	//顶部导航栏部分
    	$category2 = D('category2');
    	$condition = array(
    		'category2_show' => 1,
    		);
    	$top_menu = $category2 -> where($condition) -> limit(7) -> relation('product') -> select();
        foreach ($top_menu as $key => $value) {
            $top_product = $top_menu[$key]['product'];
            foreach ($top_product as $nav => $value) {
                $product_id = $top_product[$nav]['product_id'];
                $topProductImg = $img -> where('product_id='.$product_id) -> limit(1)-> find();
                $top_product[$nav]['product_img'] = $topProductImg['img_url'];
            }
            $top_menu[$key]['product'] = $top_product;
        }
        //dump($top_menu);
		$this -> assign('top_menu',$top_menu);
        //banner
        $banner = D('banner');
        $bannerImg = $banner -> limit(5) -> select();
        $this -> assign('banner',$bannerImg);
		//最新单品
		$product = D('product');
		$new_product = $product -> limit(15) -> relation('product_img') -> order('product_id desc') ->select();
		foreach ($new_product as $key => $value) {
			$new_product[$key]['product_img'] = $new_product[$key]['product_img']['img_url'];
		}
		//dump($new_product);
		$this -> assign('new_list',$new_product);
		//销量排行
		$record = D('record');
        $img = D('img');
        $selling = $record -> group('product_id') -> field('sum(product_num),product_id') ->order('sum(product_num) desc')->limit(10) -> select();
		foreach ($selling as $key => $value) {
            $product_id = $selling[$key]['product_id'];
            $result = $product -> where('product_id='.$product_id) -> find();
            $selling[$key]['product_name'] = $result['product_name'];
            $selling[$key]['product_price'] = $result['product_price'];
            $selling[$key]['product_info'] = $result['product_info'];
            $selling[$key]['product_specifications'] = $result['product_specifications'];
            $sell_img = $img -> where('product_id='.$product_id) ->limit(1)-> find();
            $selling[$key]['product_img'] = $sell_img['img_url'];
        }
        //dump($selling);
        $this -> assign('selling',$selling);
		//线材系列
		$condition = array(
			'category1_name' => '线材',
			);
		$wire = $category1 -> where($condition) -> relation('category2_name') -> limit(8) -> select();
		$c2 = $wire[0]['category2_name'];
		foreach ($c2 as $key => $value) {
			$c2_id = $c2[$key]['category2_id'];
			$condition = array(
				'category2_id' => $c2_id,
				);
			$pro = $product -> where($condition) -> relation('product_img') -> select();
			foreach ($pro as $nav => $value) {
				$pro[$nav]['product_img'] = $pro[$nav]['product_img']['img_url'];
			}
			$c2[$key]['pro'] = $pro;
			//dump($c2[$key]);
			//dump($pro);
		}
		//dump($c2);
		$this -> assign('wire',$c2);
		//监控器材系列
		$condition = array(
			'category1_name' => '监控器材',
			);
		$monitor = $category1 -> where($condition) -> relation('category2_name') -> limit(8) -> select();
		$c2 = $monitor[0]['category2_name'];
		foreach ($c2 as $key => $value) {
			$c2_id = $c2[$key]['category2_id'];
			$condition = array(
				'category2_id' => $c2_id,
				);
			$pro = $product -> where($condition) -> relation('product_img') -> select();
			foreach ($pro as $nav => $value) {
				$pro[$nav]['product_img'] = $pro[$nav]['product_img']['img_url'];
			}
			$c2[$key]['pro'] = $pro;
			//dump($c2[$key]);
			//dump($pro);
		}
		//dump($c2);
		$this -> assign('monitor',$c2);
    	$this -> display();
    }
    public function alist(){
    	//左侧导航栏部分
        $category1 = D('category1');
        $img = D('img');
        $category = $category1 -> relation('category2') -> select();
        $this -> assign('category',$category);
        //顶部导航栏部分
        $category2 = D('category2');
        $condition = array(
            'category2_show' => 1,
            );
        $top_menu = $category2 -> where($condition) -> limit(7) -> relation('product') -> select();
        foreach ($top_menu as $key => $value) {
            $top_product = $top_menu[$key]['product'];
            foreach ($top_product as $nav => $value) {
                $product_id = $top_product[$nav]['product_id'];
                $topProductImg = $img -> where('product_id='.$product_id) -> limit(1)-> find();
                $top_product[$nav]['product_img'] = $topProductImg['img_url'];
            }
            $top_menu[$key]['product'] = $top_product;
        }
        //dump($top_menu);
        $this -> assign('top_menu',$top_menu);
		//商品部分
    	$category2 = D('category2');
    	$product = D('product');
    	$id = I('cat');
    	$condition = array(
    		'category2_id' => $id,
    		);
    	$pro = $product -> where($condition) -> relation('product_img') ->select();
    	foreach ($pro as $key => $value) {
    		$pro[$key]['product_img'] = $pro[$key]['product_img']['img_url'];
    	}
    	//dump($pro);
    	$this -> assign("alist",$pro);
    	//获取ca1然后找到二级栏目名称

    	$category1_id = $category2 -> where($condition) -> field('category1_id') -> find();
    	$condition1 = array(
    		'category1_id' => $category1_id['category1_id'],
    		);
    	$ca2 = $category2->where($condition1)->select();
    	$this -> assign('ca2',$ca2);
    	$this -> display();
    }
    public function artical(){
    	$product = D('product');
    	$img = D('img');
    	$condition = array(
    		'product_id'	=>	I('id'),
    		);
    	$artical = $product -> where($condition) -> relation('product_img') -> select();
    	foreach ($artical as $key => $value) {
    		$artical[$key]['product_img'] = $artical[$key]['product_img']['img_url'];
    		$product_id = $artical[$key]['product_id'];
    		$img_more = $img -> where('product_id='.$product_id)->select();
    		$artical[$key]['img_more'] = $img_more;
    	}
        //商品评价列表
        $talk = D('talk');
        $user = D('user');
        $condition['product_id'] = I('id');
        $result = $talk -> where($condition)
                        -> join('kaixun_user ON kaixun_talk.user_id=kaixun_user.user_id')
                        -> field('user_name,product_evaluate,talk_time') -> select();
        /*foreach ($result as $key => $value) {
            $condition2['user_id'] = $result[$key]['user_id'];
            $result2 = $user -> where($condition2)->find();
            $result[$key]['user_name'] = $result2['user_name'];
        }*/
        $this -> assign('talk',$result);
    	$this -> assign('product',$artical);
    	//dump($result);
    	$this -> display();
    }
    public function buy_num(){
        $record = D('record');
        $user_id = session('id');
        $condition = array(
            'record_status' => 1,
            'order_num' => 12345,
            'user_id' => $user_id,
            );
        $data = $record -> where($condition) ->count();
        ajax_return($data,1,'');
    }
    public function search(){
        $product = D('product');
        $img = D('img');
        $keywords  = "%".$_POST['keywords']."%";
        $condition = array(
            'product_name'=>array('like',$keywords),
            );
        $data = $product -> where($condition) -> select();
        foreach ($data as $key => $value) {
            $product_id = $data[$key]['product_id'];
            $result = $img -> where('product_id='.$product_id) ->limit(1) -> find();
            $data[$key]['product_img'] = $result['img_url'];
        }
        //dump($data);
        $this -> assign('alist',$data);
        $this -> display();
    }
}