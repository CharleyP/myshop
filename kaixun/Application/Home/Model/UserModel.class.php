<?php  
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	//注册字段验证
	protected $patchValidate = ture;
	protected $_validate = array(
			array('user_account','require','账号必须填写',1),
			array('user_account','','账号已存在',self::EXISTS_VALIDATE,'unique',self::MODEL_INSERT),
			array('user_password','require','密码必须填写'),
			array('user_password2','require','确认密码必须填写'),
			array('user_password','user_password2','两次密码不相同',0,'confirm'), // 验证确认密码是否和密码一致
			array('user_name','require','昵称必须填写',1),
			array('user_phone','require','手机号必须填写',1),
			array('user_phone',11,'手机号不合法',self::EXISTS_VALIDATE,'length',self::MODEL_INSERT),
	);
}
?>