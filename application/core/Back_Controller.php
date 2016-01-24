<?php

/**
* 网站后台控制器父类，基于MY_Controller
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





























