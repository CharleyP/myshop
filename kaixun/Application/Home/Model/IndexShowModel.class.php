<?php  
namespace Home\Model;
use Think\Model;
class IndexShowModel extends Model{
	function head_left(){
		//左侧模板输出
        $category1 = D('category1');
        $category = $category1 -> relation('category2') -> select();
        return $category;
	}
	function head_top(){
		//顶部模板输出
        $category2 = D('Category2');
        $product = D('Product');
        $data_top1 = $category2 -> where('top_menu=1') -> select();
        foreach ($data_top1 as $key => $value) {
            $pk_category2_id = $data_top1[$key]['pk_category2_id'];
            $data_top2 = $product -> where("category2_id=".$pk_category2_id) ->relation('product_img_one') -> select();
            $data_top1[$key]['product'] = $data_top2;
        }
        return $data_top1;
	}
}