<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
    	$user = D('user');
    	$count = $user ->count();
    	$Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$show = $Page->show();// 分页显示输出
    	$condition['user_status'] = array('neq',3);
    	$list = $user-> where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
    	//dump($data);
    	$this -> assign('user',$list);
    	$this -> assign('page',$show);// 赋值分页输出
    	$this -> display();
    }
    public function changeStatus(){
    	$user = D('user');
    	$condition['user_id'] = I('user_id');
    	$status = I('user_status');
    	if ($status == 1) {
    		$data['user_status'] = 0;
    	}
    	if ($status == 0){
    		$data['user_status'] = 1;
    	};
    	$info = $user -> where($condition) -> save($data);
    	if ($info) {
    		ajax_return('',1,'修改成功');
    	}
    }
}