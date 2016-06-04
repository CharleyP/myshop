<?php  
namespace Admin\Model;
use Think\Model\RelationModel;
class ProductModel extends RelationModel{
	//建立二级分类关联模型
	protected $_link = array(
		'category2_name'  =>  array(
             'mapping_type' => self::BELONGS_TO,
             'class_name'	=> 'category2',//表名
             'foreign_key'	=> 'category2_id',
             'mapping_fields'=> 'category2_name',
             'as_fields'	=>'category2_name',
         ),
        'product_img'  =>  array(
             'mapping_type' => self::HAS_MANY,
             'class_name'   => 'img',//表名
             'foreign_key'  => 'product_id',
         ),
    );
}