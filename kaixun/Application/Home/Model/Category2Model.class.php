<?php  
namespace Home\Model;
use Think\Model\RelationModel;
class Category2Model extends RelationModel{
	//建立二级分类关联模型
	protected $_link = array(
		'product'  =>  array(
             'mapping_type' => self::HAS_MANY,
             'class_name'	=> 'product',//表名
             'foreign_key'	=> 'category2_id',
         ),
    );
}