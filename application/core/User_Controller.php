<?php

/**
* 用户控制器父类，基于MY_Controller
* 
* @author NJ
* @ctime 2016年01月24日08:45:52
* 
*/

class User_Controller extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		// echo 'front parent controller';
		// 用户必须登陆才能访问用户中心，用户空间等特定页面，所以在这里做登陆判断（User_Controller控制器是用户相关的操作的父类）
		if ($this->session->front_sess==NULL) {
			// 未登陆的话，直接跳转到entry/login页面，让用户登陆
			redirect(site_url('entry/login'));
		}
	}
}





























