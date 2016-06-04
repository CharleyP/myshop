<?php  
namespace Admin\Model;
use Think\Model\RelationModel;
class Category1Model extends RelationModel{
	//建立二级分类关联模型
	protected $_link = array(
		'getCategory2'  =>  array(
             'mapping_type' => self::HAS_MANY,
             'class_name'	=> 'category2',//表名
             'foreign_key'	=> 'category1_id',
         ),
    );
}