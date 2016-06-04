<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends BaseController {
    public function index(){
    	//栏目
    	$category1 = D('category1');
    	$data = $category1 -> relation('getCategory2') -> select();
    	$this -> assign('category',$data);
        //dump($data);
    	$this -> display();
    }
    public function changeCategory1_status(){
        $data['category1_id'] = I('category1_id');
        $data['category1_status'] = I('status');
        $category1 = D('category1');
        $condition['category1_id'] = $data['category1_id'];
        $info = $category1 -> where($condition) -> save($data);
        if ($info) {
            ajax_return('',1,'修改一级栏目状态成功');
        }
    }
    public function changeCategory1_name(){
        $data['category1_id'] = I('category1_id');
        $data['category1_name'] = I('name');
        $category1 = D('category1');
        $condition['category1_id'] = $data['category1_id'];
        $info = $category1 -> where($condition) -> save($data);
        if ($info) {
            ajax_return('',1,'修改一级栏目内容成功');
        }
    }
    public function changeCategory2_show(){
        $data['category2_id'] = I('category2_id');
        $data['category2_show'] = I('status');
        $category2 = D('category2');
        $condition['category2_id'] = $data['category2_id'];
        $info = $category2 -> where($condition) -> save($data);
        if ($info) {
            ajax_return('',1,'修改二级栏目状态成功');
        }
    }
    public function changeCategory2_name(){
        $data['category2_id'] = I('category2_id');
        $data['category2_name'] = I('name');
        $category2 = D('category2');
        $condition['category2_id'] = $data['category2_id'];
        $info = $category2 -> where($condition) -> save($data);
        if ($info) {
            ajax_return('',1,'修改二级栏目内容成功');
        }
    }
    public function add(){
        $category1 = D('category1');
        $data = $category1 -> select();
        $this -> assign('category',$data);
        $this -> display();
    }
    public function addCategory1(){
        $data['category1_name'] = I('name');
        $data['category1_status'] = 0;
        $category1 = D('category1');
        if ($category1 -> create($data) && $category1 -> add($data)) {
            ajax_return('',1,'添加一级分类成功');
        }
    }
    public function addCategory2(){
        $data['category2_name'] = I('name');
        $data['category2_show'] = 0;
        $data['category1_id'] = I('id');
        $category2 = D('category2');
        if ($category2 -> create($data) && $category2 -> add($data)) {
            ajax_return('',1,'添加二级分类成功');
        }
    }
    public function delete(){
        $category1 = D('category1');
        $data = $category1 -> relation('getCategory2') -> select();
        $this -> assign('category',$data);
        //dump($data);
        $this -> display();
    }
    public function deleteCategory1(){
        //栏目
        $category1_id = I('id');
        $category1 = D('category1');
        $category2 = D('category2');
        $condition1['category1_id'] = $category1_id;
        $info1 = $category1 -> where($condition1) ->delete();
        $info2 = $category2 -> where($condition1) -> relation('getCategory2') ->delete();
        if ($info1 && $info2) {
            ajax_return('',1,'删除成功');
        }
    }
    public function deleteCategory2(){
        $category2_id = I('id');
        $category2 = D('category2');
        $condition['category2_id'] = $category2_id;
        $info = $category2 -> where($condition) -> relation('getCategory2') ->delete();
        if ($info) {
            ajax_return('',1,'删除成功');
        }
    }
}