<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends BaseController {
	public function buy(){
		$record = D('record');
		$product = D('product');
		$user_id = session('id');
		$img = D('img');
		$condition = array(
			'user_id' => $user_id,
			'order_num' => 12345,
			'record_status' => 1,
			);
		$data = $record -> where($condition) -> select();
		foreach ($data as $key => $value) {
			$id = $data[$key]['product_id'];
			$result = $product -> where('product_id='.$id) ->select();
			$data[$key]['product_name'] = $result[0]['product_name'];
			$data[$key]['product_stock'] = $result[0]['product_stock'];
			$data[$key]['product_specifications'] = $result[0]['product_specifications'];
			$info = $img -> where('product_id='.$id) -> limit(1) -> find();
			$data[$key]['product_img'] = $info['img_url'];
		}
		$this -> assign('buy',$data);
		//dump($data);
		$this -> display();
	}
	public function addBuyMsg(){
		$record = D('record');
		$data['product_id'] = I('product_id');
		$data['product_price'] = I('product_price');
		$data['product_num'] = I('product_num');
		$data['order_num'] = 12345;
		$data['user_id'] = session('id');
		$data['record_status'] = 1;
		if ($record -> create($data) && $record -> add($data)) {
			ajax_return('',1,'添加购物车成功');
		}
	}
	public function remove(){
		$record = D('record');
		$product_id = I('product_id');
		$user_id = session('id');
		$condition = array(
			'product_id' => $product_id,
			'user_id' => $user_id,
			);
		$data = $record -> where($condition) ->delete();
		if ($data) {
			ajax_return('',1,'删除成功');
		}
	}
	public function buyOneStatus(){
		$record = D('record');
		$product_id = I('product_id');
		$data['record_status'] = I('shop_buy_status');
		$user_id = session('id');
		$condition = array(
			'product_id' => $product_id,
			'user_id' => $user_id,
			);
		$info = $record -> where($condition) -> save($data);
		if ($info) {
			ajax_return('',1,'修改成功');
		}
	}
	public function buyAllStatus(){
		$record = D('record');
		$data['record_status'] = I('shop_buy_status');
		$user_id = session('id');
		$condition = array(
			'order_num' => 12345,
			'user_id' => $user_id,
			);
		$info = $record -> where($condition) -> save($data);
		if ($info) {
			ajax_return('',1,'修改成功');
		}
	}
	public function buyOneNum(){
		$record = D('record');
		$result = I('buy_list');
		$user_id = session('id');
		$len = count($result);
		$j = 0;
		for ($i=0; $i < $len; $i++) { 
			$condition = array(
				'product_id' => $result[$i]['product_id'],
				'user_id' => $user_id,
				'record_status' => 1,
				);
			$data['product_num'] = $result[$i]['product_buy_num'];
			$info = $record -> where($condition) -> save($data);
			if ($info) {
				$j++;
			}
		};
		if ($j == $len) {
			ajax_return($len,1,'');
		}
	}
	public function buySubmit(){
		$order = D('order');
		$data['order_num'] = time();
		$data['order_sum'] = I('order_sum');
		$data['user_id'] = session('id');
		$data['order_time'] = time();
		$order -> startTrans();
		$info1 = $order -> add($data);
		$record = D('record');
		$condition = array(
			'user_id' => $data['user_id'],
			'record_status' => 1,
			);
		$data1['order_num'] = time();
		$data1['record_status'] = 2;
		$info2 = $record -> where($condition) -> save($data1);
		if ($info1 && $info2) {
			$order -> commit();
			ajax_return('',1,'');
		}else{
			$order -> rollback();
		}
	}
	public function addEvaluate(){
		$talk = D('talk');
		$data['product_id'] = I('product_id');
		$data['product_evaluate'] = I('evaluate');
		$data['user_id'] = session('id');
		$data['talk_time'] = time();
		$result = $talk->add($data);
		if ($result) {
			ajax_return('',1,'评价成功');
		}
	}
}