<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends CI_Controller {

	public $web_title;

	function __construct() {
		parent::__construct();
		$this->web_title = 'CI学习例子代码';
	}

	public function index()
	{
		$this->load->view('entry/index');
	}

	public function loginpage()
	{
		$header_data['web_title'] = $this->web_title;
		$header_data['page_title'] = '登陆页面';
		$this->load->view('common/header',$header_data); // 头部视图文件
		$this->load->view('entry/login_page'); // 登陆页面
		$this->load->view('common/footer'); // 底部视图文件
	}



}
