<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends BaseController {
    public function index(){
    	$order = D('order');
    	$data = $order ->join('kaixun_user ON kaixun_order.user_id = kaixun_user.user_id') ->field('order_id,order_num,order_sum,order_time,user_account,user_name,user_phone,user_address') ->order('order_time desc') -> select();
    	$this -> assign('list',$data);
    	//dump($data);dump($data);dump($data);dump($data);
    	$this -> display();
    }
    public function order(){
    	$order_num = I('num');
    	$order = D('order');
    	$record = D('record');
    	$img = D('img');
        $condition['order_num'] = $order_num;
        $orderMsg = $order->where($condition)->select();
        //dump($orderMsg);
        $this->assign('orderMsg',$orderMsg);

    	$condition['order_num'] = $order_num;
    	$data1 = $order ->join('kaixun_user ON kaixun_order.user_id = kaixun_user.user_id')
    		 ->where($condition)->field('order_id,order_num,order_sum,order_time,user_account,user_name,user_phone,user_address') ->order('order_time desc') -> select();
    	//dump($data1);dump($data1);dump($data1);dump($data1);
    	$this -> assign('userMsg',$data1);
    	$data2 = $record->where($condition)->join('kaixun_product ON kaixun_record.product_id = kaixun_product.product_id')->select();
    	foreach ($data2 as $key => $value) {
    		$product_id = $data2[$key]['product_id'];
    		$condition2['product_id'] = $product_id;
    		$img_list = $img -> where($condition2)->limit(1)->find();
    		$data2[$key]['img_url'] = $img_list['img_url'];
    	}
    	//dump($data2);dump($data2);dump($data2);dump($data2);
    	$this -> assign('productMsg',$data2);
    	$this -> display();
    }
}