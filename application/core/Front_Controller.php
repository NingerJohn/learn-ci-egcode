<?php

/**
* 网站前台控制器父类，基于MY_Controller
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
		echo 'front parent controller';
	}
}





























