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
	function pwd_encrypt($original_password, $salt){
		return md5($original_password.$salt).$salt;
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



















