<?php  
namespace Home\Model;
use Think\Model\RelationModel;
class ProductModel extends RelationModel{
	//建立二级分类关联模型
	protected $_link = array(
		'product_img'  =>  array(
             'mapping_type' => self::HAS_ONE,
             'class_name'	=> 'img',//表名
             'foreign_key'	=> 'product_id',
             'mapping_fields'=>'img_url',
         ),
    );
}