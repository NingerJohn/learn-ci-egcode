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
if (!function_exists('pwd_encrypt')) {
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
			$res['salt'] = md5($salt);
			$salt_arr = str_split($res['salt']);
			$tmp_pwd = md5($original_password);
			$tmp_pwd_arr = str_split($tmp_pwd);
			$final_pwd = [];
			foreach ($salt_arr as $k => $v) {
				$final_pwd[] = $tmp_pwd_arr[$k];
				$final_pwd[] = $v;
			}
			$res['password'] = md5(implode('',$final_pwd));
		} else {
			$salt_arr = str_split($salt);
			$tmp_pwd = md5($original_password);
			$tmp_pwd_arr = str_split($tmp_pwd);
			$final_pwd = [];
			foreach ($salt_arr as $k => $v) {
				$final_pwd[] = $tmp_pwd_arr[$k];
				$final_pwd[] = $v;
			}
			$res = ( $password === md5(implode('', $final_pwd)) ) ? true : false;
		}
		return $res;
	}
}


// 



















