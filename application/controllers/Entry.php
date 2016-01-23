<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends MY_Controller {

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
	public function register()
	{
		$header_data['web_title'] = $this->web_title;
		$header_data['page_title'] = '登陆页面';
		$this->load->view('common/header',$header_data); // 头部视图文件
		$this->load->view('entry/reg_page'); // 登陆页面
		$this->load->view('common/footer'); // 底部视图文件
	}

	public function register_submit()
	{
		// 下面的代码可以打印前台页面用户提交过来的数据
		// var_dump($this->post('email'));exit;
		$this->load->model('common/User_m', 'user_m'); // 加载用户表模型
		$cond['email'] = trim($this->post('email')); // 获取用户传递过来的邮箱
		$mail_check_res = $this->user_m->repeat_check($cond); // 调用用户表模型中的邮箱检重方法
		if ($mail_check_res > 0) { // 如果数量大于0的话，则说明已注册
			$fin_res['status'] = 0;
			$fin_res['msg'] = '邮箱已经注册';
			echo json_encode($fin_res);exit;
		} else {
			$cond['password'] = md5(trim($this->post('pwd'))); // 获取用户传递过来的邮箱
			$cond['reg_time'] = time(); // 注册时间
			$cond['reg_ip_address'] = $_SERVER["REMOTE_ADDR"]; // 注册ip地址
			$reg_res = $this->user_m->register($cond);
			if ($reg_res==1) { // 注册成功
				$fin_res['status'] = 1;
				$fin_res['msg'] = '注册成功';
				echo json_encode($fin_res);exit;
			} else { // 注册失败
				$fin_res['status'] = 0;
				$fin_res['msg'] = '注册失败';
				echo json_encode($fin_res);exit;
			}
			
		}
	}


}
