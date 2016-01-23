<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends MY_Controller {


	function __construct() {
		parent::__construct();
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
		$header_data['page_title'] = '注册页面'; // 当前网页的名字，与网站名字不一样
		$this->load->view('common/header',$header_data); // 头部视图文件
		$this->load->view('entry/reg_page'); // 注册页面
		$this->load->view('common/footer'); // 底部视图文件
	}

	/**
	 * 用户注册处理方法
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日16:53:20
	 * @return json 注册结果
	 * 
	 */
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

	/**
	 * 登录页面
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日17:14:39
	 * @return page 渲染后的页面
	 * 
	 */
	public function login()
	{
		$header_data['web_title'] = $this->web_title;
		$header_data['page_title'] = '登陆页面'; // 当前网页的名字，与网站名字不一样
		$this->load->view('common/header',$header_data); // 头部视图文件
		$this->load->view('entry/login_page'); // 登陆页面
		$this->load->view('common/footer'); // 底部视图文件
	}

	/**
	 * 用户登录处理方法
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日17:24:17
	 * @return json 登录结果
	 * 
	 */
	public function login_action()
	{
		// 下面的代码可以打印前台页面用户提交过来的数据
		// var_dump($this->post('email'));exit;
		$this->load->model('common/User_m', 'user_m'); // 加载用户表模型
		$cond['email'] = trim($this->post('email')); // 获取用户传递过来的邮箱
		$mail_check_res = $this->user_m->repeat_check($cond); // 调用用户表模型中的邮箱检重方法,用来检测该邮箱是否已注册
		if ($mail_check_res == 0) { // 如果数量等于0的话，则说明未注册
			$fin_res['status'] = 0;
			$fin_res['msg'] = '邮箱未注册';
			echo json_encode($fin_res);exit;
		} else {
			$cond['password'] = md5(trim($this->post('pwd'))); // 获取用户传递过来的邮箱
			$reg_res = $this->user_m->login($cond);
			if ($reg_res==1) { // 登录成功
				// 存入session
				// 
				// 返回登录的结果
				$fin_res['status'] = 1;
				$fin_res['msg'] = '登录成功';
				echo json_encode($fin_res);exit;
			} else { // 登录失败
				$fin_res['status'] = 0;
				$fin_res['msg'] = '登录失败';
				echo json_encode($fin_res);exit;
			}
		}
	}



}
