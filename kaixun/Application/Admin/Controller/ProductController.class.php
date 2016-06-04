<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends BaseController {
    public function index(){
        $product = D('product'); // 实例化对象
        $count      = $product->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $product->limit($Page->firstRow.','.$Page->listRows)->relation('category2_name')->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    public function add(){
        $category1 = D('category1');
        $data = $category1 -> select();
        $this -> assign('ca1',$data);
    	$this -> display();
    }
    public function addProduct(){
        $product = D('product');
        $data['category2_id'] = I('category2_id');
        $data['product_price'] = I('product_price');
        $data['product_stock'] = I('product_stock');
        $data['product_info'] = I('product_info');
        $data['product_name'] = I('product_name');
        $data['product_specifications'] = I('product_specifications');
        if ($product -> create($data) && $product -> add($data)) {
            ajax_return('',1,'添加成功');
        }
    }
    public function delete(){
        $condition['product_id'] = I('product_id');
        $product = D('product');
        $info = $product -> where($condition) ->delete();
        if ($info) {
            ajax_return('',1,'删除成功');
        }
    }
    public function change(){
        $condition['product_id'] = I('id');
        $product = D('product');
        $category2 = D('category2');
        $category1 = D('category1');
        $data = $product -> where($condition) ->relation('product_img') -> select();
        $info1 = $category2 -> where('category2_id='.$data[0]['category2_id']) ->select();
        $data[0]['category2_name'] = $info1[0]['category2_name'];
        $category2_id = $info1[0]['category1_id'];
        $info2 = $category1 -> where('category1_id='.$category2_id) -> select();
        $data[0]['category1_name'] = $info2[0]['category1_name'];
        $data[0]['ca1'] = $category1 -> select();
        //dump($data);dump($data);dump($data);dump($data);
        $this -> assign('product',$data);
        //
        $info3 = $category1 -> select();
        $this -> assign('ca1',$info3);
        //
        $info4 = $category2 -> where('category1_id='.$info2[0]['category1_id']) -> select();
        $this -> assign('ca2',$info4);
    	$this -> display();
    }
    public function add_img(){
        $setting=C('UPLOAD_SITEIMG_QINIU');
        if (!empty($_POST)) {
            $Upload = new \Think\Upload($setting);
            $Upload->rootPath  = './'; // 设置附件上传根目录
            $Upload->saveName = '';
            $Upload->savePath = 'upload/';
            $info = $Upload->upload($_FILES);
            $img_url = $info['img']['url'];
            $data['img_url'] = $img_url;
            $data['product_id'] = $_POST['id'];
            $img = D('img');
            $msg = $img -> add($data);
            if ($msg) {
                ajax_return('',1,'上传成功');
            }
        }
    }
    public function delete_img(){
        $img = D('img');
        $condition['img_id'] = I('id');
        $info = $img -> where($condition) ->delete();
        if ($info) {
            ajax_return('',1,'删除成功');
        }
    }
    public function getCategory2(){
        $condition['category1_id'] = I('category1_id');
        $category2 = D('category2');
        $data = $category2 -> where($condition) -> select();
        if ($data) {
            ajax_return($data,1,'');
        }
        
    }
    public function changeSubmit(){
        $data['product_id'] = I('product_id');
        $condition['product_id'] = I('product_id');
        $data['category2_id'] = I('category2_id');
        $data['product_price'] = I('product_price');
        $data['product_stock'] = I('product_stock');
        $data['product_info'] = I('product_info');
        $data['product_name'] = I('product_name');
        $data['product_specifications'] = I('product_specifications');
        $product = D('product');
        $info = $product -> where($condition) -> save($data);
        if ($info) {
            ajax_return('',1,'');
        }
    }
}