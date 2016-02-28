<?php

/**
* 网站后台控制器父类，继承自MY_Controller
* 
* 声明了网站后台会经常用到的成员变量和方法
* 
* @author NJ
* @ctime 2016年01月24日08:45:52
* 
*/

class Back_Controller extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		echo 'back parent controller';
	}
}





























