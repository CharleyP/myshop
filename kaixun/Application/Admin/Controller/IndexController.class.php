<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
    	$user = D('user');
    	$product = D('product');
    	$order = D('order');
    	$img = D('img');
    	$data[0]['user_num'] = $user ->count();
    	$data[0]['product_num'] = $product ->count();
    	$data[0]['order_num'] = $order ->count();
    	$data[0]['img_num'] = $img ->count();
    	$this -> assign('count',$data);
    	$this -> display();
    }
}