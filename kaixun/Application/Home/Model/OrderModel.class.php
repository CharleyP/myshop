<?php  
namespace Home\Model;
use Think\Model\RelationModel;
class OrderModel extends RelationModel{
	//建立二级分类关联模型
	protected $_link = array(
		'getRecord'  =>  array(
             'mapping_type' => self::HAS_MANY,
             'class_name'	=> 'record',//表名
             'foreign_key'	=> 'order_num',
         ),
    );
}