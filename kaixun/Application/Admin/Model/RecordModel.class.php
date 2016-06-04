<?php  
namespace Admin\Model;
use Think\Model\RelationModel;
class RecordModel extends RelationModel{
	//建立二级分类关联模型
	protected $_link = array(
		'img_url'  =>  array(
             'mapping_type' => self::HAS_ONE,
             'class_name'	=> 'img',//表名
             'foreign_key'	=> 'product_id',
         ),
    );
}