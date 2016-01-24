<?php


/**
* 网站前台默认控制器
* @author NJ
* @ctime 2016年01月24日07:13:17
* 
*/

class Index extends Front_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['web_title'] = $this->web_title;
		$data['page_title'] = '前台首页';
		$this->load->view('common/head',$data);
		$this->load->view('common/foot');
		// var_dump('index');
	}



}


































