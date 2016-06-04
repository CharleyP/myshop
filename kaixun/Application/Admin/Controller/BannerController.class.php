<?php
namespace Admin\Controller;
use Think\Controller;
class BannerController extends BaseController {
	public function index(){
		$banner = D('banner');
		$data = $banner -> select();
		$this -> assign('bannerList',$data);
		$this -> display();
	}
	public function getList(){

	}
	public function deleteBanner(){
		$condition['banner_id'] = I('id');
		$banner = D('banner');
		$info = $banner -> where($condition) ->delete();
		if ($info) {
			ajax_return('',1,'删除成功');
		}
	}
	public function upload(){
        $setting=C('UPLOAD_SITEIMG_QINIU');
        if (!empty($_POST)) {
            $Upload = new \Think\Upload($setting);
            $Upload->rootPath  = './'; // 设置附件上传根目录
            $Upload->saveName = '';
            $Upload->savePath = 'upload/';
            $info = $Upload->upload($_FILES);
            $img_url = $info['img']['url'];
            $data['banner_url'] = $img_url;
            $banner = D('banner');
            $msg = $banner -> add($data);
            if ($msg) {
                $this -> redirect('Banner/index');
            }
            else{
            	ajax_return($msg,0,'');
            	echo "error";
            }
        }
    }
}