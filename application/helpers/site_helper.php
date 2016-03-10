<?php
/*
 * 
 * 整个网站用到的函数
 * 密码加密函数
 *
 * @author NingerJohn
 * @email ningerjohn@163.com
 * @ctime 2016年03月05日15:14:41
 * 
 */



// 密码加密函数
if (function_exists('pwd_encrypt')) {
	/**
	 * 密码处理函数
	 * @param  string $original_password 初始密码
	 * @param  string $password          数据库存储的加密密码
	 * @param  string $salt              盐值
	 * @return mixed                     返回的结果，加密密码或者对比结果
	 */
	function pwd_encrypt($original_password, $password=NULL, $salt=NULL){
		// $salt为NULL的时候，默认是加密，返回加密密码和盐值
		if ($password===NULL && $salt===NULL) {
			$salt = microtime(true);
			$res['salt'] = $salt;
			$res['password'] = md5(md5($original_password.$salt)).md5($salt);
		} else {
			$res = ( $password === md5(md5($original_password.$salt)).md5($salt) ) ? true : false;
		}
		return $res;
	}
}


// 调试打印函数，终止
if (function_exists('pr')) {
	function pr($val){
		echo '<br>';
		print_r($val);
		echo '<br>';
		exit('打印输出结束');
	}
}

// 



















