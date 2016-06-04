<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize(){
		if(session('?name') || session('?id')){
			$data['id'] = session('id');
			$data['name'] = session('name');
			//ajax_return($data,1,'保存用户信息成功');
		}else{
			$this -> redirect('Login/index');
		}
	}
	public function check(){
		if(session('?name') || session('?id')){
			$data['id'] = session('id');
			$data['name'] = session('name');
			ajax_return($data,1,'保存用户信息成功');
		}else{
			ajax_return($data,0,'保存用户信息失败');
		}
	}
}