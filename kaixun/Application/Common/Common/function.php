<?php 
	function ajax_return($data,$status,$msg){
		$r = array(
			'data'   =>$data,
			'status' =>$status,
			'msg'	 =>$msg
			);
		header('Content-Type:application/json;charset=utf-8');
		exit(json_encode($r));
	}
	function str_to($str){
		$str=str_replace("&nbsp;", " ", $str);
		$str=str_replace("&lt;", "<", $str);
		$str=str_replace("&gt;", ">", $str);
		$str=str_replace("&quot;", '"', $str);
		$str=nl2br($str);
		return $str;
	}
?>

