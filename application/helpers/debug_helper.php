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



// 调试打印函数，不终止
if (function_exists('pr')) {
	function pr($val){
		echo '<br>';
		print_r($val);
		echo '<br>';
	}
}


// 调试打印函数，终止
if (function_exists('pre')) {
	function pr($val){
		echo '<br>';
		print_r($val);
		echo '<br>';
		exit('打印输出结束');
	}
}

// 



















