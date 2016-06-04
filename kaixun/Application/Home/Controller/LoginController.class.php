<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function index(){
		$this -> display();
	}
	public function getLogin(){
		$verify = new \Think\Verify();
		$user_account = I('user_account');
		$user = D('user');
		$user_password = I('user_password');
		$verifyMsg = I('verifyMsg');
		$condition = array(
			'user_account' => $user_account,
			'user_status' => 1,
			);
		$data = $user -> where($condition) -> find();
		if (!$verify->check($verifyMsg)) {
			ajax_return('',0,'验证码错误');
		}else if($data['user_password'] != $user_password || $data == ''){
			ajax_return('',0,'账号密码不匹配');
		}else if($verifyMsg == '' || $user_account == "" || $user_password == '') {
			ajax_return('',0,'信息填写不完整');
		}else if($data['user_password'] == $user_password && $data['user_status'] == 1){
			session('name',$data['user_name']);//保存session
			session('id',$data['user_id']);
			ajax_return('',1,'登陆成功');
		}else{
			ajax_return('',0,'未知错误');
		}
	}
	public function register(){
		$this -> display();
	}
	public function getRegister(){
		$verify = new \Think\Verify();
		$user = D('user');
		$data['user_account'] = I('user_account');
		$data['user_password'] = I('user_password');
		$data['user_password2'] = I('user_password2');
		$data['user_name'] = I('user_name');
		$data['user_phone'] = I('user_phone');
		$data['user_status'] = 0;
		$verifyMsg = I('user_verify');
		if ($verify->check($verifyMsg)) {
			if ($user -> create($data) && $user -> add($data)) {
				ajax_return('',1,'注册成功，请等待管理员审核');
			}
		}else if(!$verify->check($verifyMsg)){
			ajax_return('',0,'验证码错误');
		}else{
			$data = $user->getError();
			ajax_return($data,0,'注册失败');
		}
	}
	public function resetting(){
		$this -> display();
	}
	public function getResetting(){
		$user = D('user');
		$user_account = I('user_account');
		$user_phone = I('user_phone');
		$user_password = I('user_password');
		$condition = array(
			'user_account' => $user_account,
			);
		$data = $user -> where($condition) -> find();
		if ($data['user_phone'] == $user_phone && $data != '') {
			$data['user_password'] = $user_password;
			$info = $user -> where($condition) -> save($data);
			ajax_return('',1,'重置密码成功');
		}else{
			ajax_return('',0,'重置密码失败');
		}
	}
	public function logout(){
		//session(null);
		session('name',null);
		session('id',null); 
		$this -> redirect('Index/index');
	}
	public function verify(){
		$cfg = array(
    		'imagesH'   => 45,
    		'imageW'	=> 120,
    		'fontSize'	=> 15,
    		'length'	=> 4,
    		'fontttf'	=> '4.ttf',
    	);
		$Verify = new \Think\Verify($cfg);
		ob_clean();
		$Verify->entry();
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