<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize(){
		if(session('?admin_name') || session('?admin_id')){
			$data['id'] = session('admin_id');
			$data['name'] = session('admin_name');
			$user = D('user');
			$info = $user -> where('user_id='.$data['id']) -> field('user_name,user_id') -> select();
			$this -> assign('admin',$info);
		}else{
			$this -> redirect('Login/index');
		}
	}
	public function check(){
		if(session('?admin_name') || session('?admin_id')){
			$data['id'] = session('admin_id');
			$data['name'] = session('admin_name');
			ajax_return($data,1,'保存用户信息成功');
		}else{
			ajax_return('',0,'保存用户信息失败');
		}
	}
}