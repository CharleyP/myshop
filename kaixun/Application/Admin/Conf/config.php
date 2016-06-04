<?php
return array(
	//'配置项'=>'配置值'
	//七牛配置
	'UPLOAD_SITEIMG_QINIU' => array ( 
                'maxSize' => 5 * 1024 * 1024,//文件大小
                'rootPath' => './',
                'saveName' => array ('uniqid', ''),
                'driver' => 'Qiniu',
                'driverConfig' => array (
                        'secretKey' => 'knz0s6opIhM7af-IB5blHbvndXbXdbYQFPTPrm1a', 
                        'accessKey' => 'd6dblzfR9UlZGGP6iM0saY8r4nV4iM6BICkYYbSb',
                        'domain' => '7xt9bv.com1.z0.glb.clouddn.com',
                        'bucket' => 'junchao', 
                )
        )
);