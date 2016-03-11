<?php
/*
 * 
 * 开发调试常用到的函数
 * 格式化输出数据
 *
 * @author NingerJohn
 * @email ningerjohn@163.com
 * @ctime 2016年03月05日15:14:41
 * 
 */



// print_r调试打印函数，不终止
if (!function_exists('pr')) {
	function pr($val){
		echo '<pre>';
		print_r($val);
		echo '</pre>';
	}
}


// print_r调试打印函数，终止
if (!function_exists('pre')) {
	function pre($val){
		echo '<pre>';
		print_r($val);
		echo '</pre>';
		exit('打印输出结束');
	}
}

// var_dump详细打印调试函数
if (!function_exists('vd')) {
	function vd($val){
		echo '<pre>';
		var_dump($val);
		echo '</pre>';
	}
}

// var_dump详细打印调试函数
if (!function_exists('vde')) {
	function vde($val){
		echo '<pre>';
		var_dump($val);
		echo '</pre>';
		exit('打印输出结束');
	}
}
















