<?php  
namespace Home\Model;
use Think\Model\RelationModel;
class Category1Model extends RelationModel{
	//建立二级分类关联模型
	protected $_link = array(
		'category2'  =>  array(
             'mapping_type' => self::HAS_MANY,
             'class_name'	=> 'category2',//表名
             'foreign_key'	=> 'category1_id',
         ),
		'category2_name'  =>  array(
             'mapping_type' => self::HAS_MANY,
             'class_name'	=> 'category2',//表名
             'foreign_key'	=> 'category1_id',
             'mapping_fields'=>'category2_name,category2_id',
         ),
    );
}