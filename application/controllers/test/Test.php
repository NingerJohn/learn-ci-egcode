<?php

/**
* 测试控制器
*/
class Test extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		var_dump($this->post());exit;
	}

}




























