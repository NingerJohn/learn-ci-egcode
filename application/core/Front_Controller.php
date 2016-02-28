<?php

/**
* 网站前台控制器父类，继承自MY_Controller
*
* 声明了网站后台会经常用到的成员变量和方法
* 
* @author NJ
* @ctime 2016年01月24日08:45:52
* 
*/

class Front_Controller extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		// echo 'front parent controller';
		// 有些网站限制用户必须登陆了以后才能访问所有的页面，因为Front_Controller控制器是前台所有控制器的基类，
		// 所以这里可以直接做登陆判断及跳转
		if ($this->session->front_sess==NULL) {
			// 未登陆的话，直接跳转到entry/login页面，让用户登陆
			// redirect(site_url('entry/login'));
		}
	}
}





























