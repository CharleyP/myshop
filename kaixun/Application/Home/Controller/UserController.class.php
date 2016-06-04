<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController {
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
		
		$this -> display();
	}
	public function allorder(){
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

		$order = D('order');
		$user = D('user');
		$record = D('record');
		$user_id = session('id');
		$condition = array(
			'user_id' => $user_id,
			);
		$data = $order -> where($condition) -> select();
		foreach ($data as $key => $value) {
			$user_id = $data[$key]['user_id'];
			$order_num = $data[$key]['order_num'];
			$user_name = $user -> where('user_id='.$user_id) -> find();
			//$order_record = $record -> where('order_num='.$order_num) -> select();
			$data[$key]['user_name'] = $user_name['user_name'];
			//$data[$key]['record'] = $order_record;
		}
		$this -> assign('order',$data);
		//dump($data);
		$this -> display();
	}
	public function order(){
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

		$order_id = I('num');
		$order = D('order');
		$record = D('record');
		$product = D('product');
		$img = D('img');
		$order_num = $order->where('order_id='.$order_id)->find();
		$order_num_find = $order_num['order_num'];
		$data = $record->join('LEFT JOIN kaixun_product ON kaixun_record.product_id = kaixun_product.product_id')->where('order_num='.$order_num_find)->select();
		foreach ($data as $key => $value) {
			$product_id = $data[$key]['product_id'];
			$img_url = $img -> where('product_id='.$product_id) -> limit(1) -> select();
			$data[$key]['product_img'] = $img_url[0]['img_url'];
		}
		$this -> assign('order',$data);
		//dump($data);
		//金额
		$order_sum = $order->where('order_id='.$order_id)->select();
		$this -> assign('sum',$order_sum);
		//收货人信息
		$user_id = session('id');
		$user = D('user');
		$condition = array(
			'user_id' => $user_id,
			);
		$result = $user -> where($condition) -> field('user_name,user_phone,user_address') -> select();
		$this -> assign('msg',$result);
		$this -> display();
	}
	public function address(){
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
		$this -> display();
	}
	public function changePsw(){
		$this -> display();
	}
	public function order_sum(){
		$order = D('order');
		$user_id = session('id');
		$condition = array(
			'user_id' => $user_id,
			);
		$data = $order -> where($condition)->count();
		ajax_return($data,1,'');
	}
	public function record_sum(){
		$record = D('record');
		$user_id = session('id');
		$condition = array(
			'user_id' => $user_id,
			'status' => 1,
			'order_num' => '12345',
			);
		$data = $record -> where($condition)->count();
		ajax_return($data,1,'');
	}
	public function getUser(){
		$user_id = session('id');
		$user = D('user');
		$condition = array(
			'user_id' => $user_id,
			);
		$data = $user -> where($condition) -> find();
		$data['user_password'] = strlen($data['user_password']);
		ajax_return($data,1,'');
	}
	public function changeAddress(){
		$data['user_name'] = I('name');
		$data['user_phone'] = I('phone');
		$data['user_address'] = I('address');
		$user = D('user');
		$user_id = session('id');
		$condition = array(
			'user_id' => $user_id,
			);
		$info = $user -> where($condition) -> save($data);
		if ($info) {
			ajax_return('',1,'修改成功');
		}else{
			ajax_return('',0,'修改失败');
		}
	}
}