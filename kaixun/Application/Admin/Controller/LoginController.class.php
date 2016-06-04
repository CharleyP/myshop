<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function index(){
		$this -> display();
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
	public function loginCheck(){
		$verify = new \Think\Verify();
		$account = I('account');
		$condition['user_account'] = $account;
		$password = md5(I('password'));
		$verifyMsg = I('verify');
		$user = D('user');
		$accoutMsg = $user -> where($condition) -> find();
		if (!$verify->check($verifyMsg)) {
			ajax_return('',0,'验证码错误');
		}else if($accoutMsg['user_password'] != $password){
			ajax_return('',0,$password);
		}else if($verifyMsg == '' || $account == "" || $password == '') {
			ajax_return('',0,'信息填写不完整');
		}else if($accoutMsg['user_password'] == $password && $accoutMsg['user_status'] == 3){
			session('admin_name',$accoutMsg['user_name']);//保存session
			session('admin_id',$accoutMsg['user_id']);
			ajax_return('',1,'登陆成功');
		}else{
			ajax_return('',0,'未知错误');
		}
	}
	public function logout(){
		//session(null);
		session('admin_name',null);
		session('admin_id',null); 
		ajax_return('',1,'退出成功');
	}
}