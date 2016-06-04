<?php  
namespace Admin\Model;
use Think\Model\RelationModel;
class OrderModel extends RelationModel{
	//建立二级分类关联模型
	protected $_link = array(
		'userMsg'  =>  array(
             'mapping_type' => self::BELONGS_TO,
             'class_name'	=> 'user',//表名
             'foreign_key'	=> 'user_id',
             'mapping_fields'=> 'user_name,user_phone,user_address,user_account',
         ),
    );
}