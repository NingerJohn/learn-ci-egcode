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

	/**
	 * 注册页面
	 * 
	 * @author NJ
	 * @ctime 2016年01月22日20:57:08
	 * @return page 渲染后的页面
	 * 
	 */
	public function regPage()
	{
		$header_data['web_title'] = $this->web_title;
		$header_data['page_title'] = '登陆页面';
		$this->load->view('common/header',$header_data); // 头部视图文件
		$this->load->view('entry/login_page'); // 登陆页面
		$this->load->view('common/footer'); // 底部视图文件
	}

	public function registerSubmit()
	{
		// 下面的代码可以打印前台页面用户提交过来的数据
		// var_dump($this->input->post());exit;
		$this->load->model('frontend/User_m', 'user_m');
		$cond['email'] = 'ningerjohn@163.com';
		$res = $this->user_m->repeat_check($cond);
		var_dump($res);
	}


}
