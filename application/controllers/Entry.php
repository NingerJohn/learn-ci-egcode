<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends MY_Controller {


	function __construct() {
		parent::__construct();
		// 用户登陆以后是无法登陆注册的，这里判断session是否为空
		if ($this->session->front_sess || $this->session->back_sess) {
			$this->redirect(site_url('index/index'));
		}
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
		// vde($this->get_sess());
		// vde($this->session->userdata());
		// vd(time());
		// vd(microtime());
		// $microtime = microtime();
		// vd($microtime);
		// vde(substr($microtime,2,6));
		// $sess_data = ['one'=>4,'two'=>3];
		// vd(mt_rand(100000,999999));
		// $this->set_sess($sess_data);
		// vde($this->get_sess('one'));
		$header_data['web_title'] = $this->web_title;
		$header_data['page_title'] = '注册页面'; // 当前网页的名字，与网站名字不一样
		$this->load->view('common/head',$header_data); // 头部视图文件
		$this->load->view('entry/reg_page'); // 注册页面
		$this->load->view('common/foot'); // 底部视图文件
	}

	/**
	 * 获取注册用的邮箱验证码
	 * 
	 * @author NJ
	 * @ctime 2016年03月20日20:09:05
	 * @return NULL 无
	 */
	public function get_email_captcha()
	{
		# code...
		$email = $this->post('email');
		$this->email_captcha($email, 'register'); // 第二个参数不传，默认发送注册验证码
	}

	/**
	 * ajax过来直接进行验证码验证的方法
	 * 
	 * @author NJ
	 * @ctime 2016年03月20日20:10:23
	 * @return NULL 无
	 * 
	 */
	public function check_register_captcha()
	{
		// vde($this->post());
		$check_res = $this->mail_captcha_varify(trim($this->post('email')), trim($this->post('captcha')), 'register');
		$this->ajax_return($check_res);
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
		// 检查前台邮箱，密码，验证码有效性（虽然javascript前台已经判断了，但是后台必须要进行一次有效性判断）
		// 
		// 
		$email = trim($this->post('email')); // 获取用户传递过来的邮箱
		$password = trim($this->post('pwd')); // 密码
		$pwd_cfm = trim($this->post('pwd_cfm')); // 确认密码
		$captcha = trim($this->post('email_captcha')); // 验证码
		// vd($password.''.$pwd_cfm);
		// 邮箱验证，直接使用的是php5.2版本以后提供的内置函数，如果不放心的话，可以加一个正则匹配
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$fin_res['status'] = 0;
			$fin_res['msg'] = '邮箱格式不合法';
			echo json_encode($fin_res);exit;
		}
		// 密码和确认密码判断
		if ( strlen($password) < 6 ) {
			$fin_res['status'] = 0;
			$fin_res['msg'] = '密码至少6位';
			echo json_encode($fin_res);exit;
		} elseif ( $password !== $pwd_cfm ) {
			$fin_res['status'] = 0;
			$fin_res['msg'] = '请确认两次密码一致';
			echo json_encode($fin_res);exit;
		}
		// 邮箱验证码进行判断，此处直接调用了ajax请求的验证方法
		$captcha_check_res = $this->mail_captcha_varify($email, $captcha, 'register');
		if ($captcha_check_res['status']===0) {
			$this->ajax_return($captcha_check_res);
		}
		// 数据格式通过以后，进行其他验证
		$this->load->model('common/User_m', 'user_m'); // 加载临时用户表模型
		// 调用临时用户表模型中的邮箱检重方法
		$register_check['email'] = $email;
		// $register_check['mail_verified'] = 1;
		$repeat_check_res = $this->user_m->repeat_check($register_check);
		// vde($repeat_check_res); 
		// 判断邮箱是否注册
		if ( count($repeat_check_res) > 0 ) { // 如果数量大于0的话，则说明已注册
			$fin_res['status'] = 0;
			$fin_res['msg'] = '邮箱已经注册';
			echo json_encode($fin_res);exit;
		} else {
			// 
			$reg_data['email'] = $email;
			$reg_data['password'] = pwd_encrypt( $password )['password']; // 加密密码
			$reg_data['salt'] = pwd_encrypt( $password )['salt']; // 加密盐值
			$reg_data['register_time'] = time(); // 注册时间
			$reg_data['register_ip'] = $_SERVER["REMOTE_ADDR"]; // 注册ip地址
			// 进行注册入库
			$reg_res = $this->user_m->register($reg_data);
			if ($reg_res) {
				// 注册成功的话，发送邮件到注册邮箱
				// $res = $this->send_email($reg_data['email'], '注册成功', '恭喜您注册成功');
				$res = true;
				if ($res) {
					// 发送邮件成功的话，则最终提示用户注册成功
					$fin_res['status'] = 1;
					$fin_res['msg'] = '注册成功';
					echo json_encode($fin_res);exit;
				} else {
					// 发送邮件失败的话，则最终提示用户注册失败
					$fin_res['status'] = 0;
					$fin_res['msg'] = '注册失败';
					echo json_encode($fin_res);exit;
				}
			} else {
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
		// var_dump($this->session->front_user);
		$header_data['web_title'] = $this->web_title;
		$header_data['page_title'] = '登陆页面'; // 当前网页的名字，与网站名字不一样
		$this->load->view('common/head',$header_data); // 头部视图文件
		$this->load->view('entry/login_page'); // 登陆页面
		$this->load->view('common/foot'); // 底部视图文件
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
		$email = trim($this->post('email'));
		$password = trim($this->post('pwd'));
		$this->load->model('common/User_m', 'user_m'); // 加载用户表模型
		$reg_check_cond['email'] = $email; // 获取用户传递过来的邮箱
		$mail_check_res = $this->user_m->repeat_check($reg_check_cond); // 调用用户表模型中的邮箱检重方法,用来检测该邮箱是否已注册
		if ( count($mail_check_res) === 0 ) { // 如果数量等于0的话，则说明未注册
			$fin_res['status'] = 0;
			$fin_res['msg'] = '邮箱未注册';
			echo json_encode($fin_res);exit;
		} else {
			$login_cond['email'] = $email;
			// $login_cond['password'] = pwd_encrypt($password)['password']; // 获取用户传递过来的邮箱
			// $login_cond['salt'] = pwd_encrypt($password)['salt']; // 获取用户传递过来的邮箱
			$user_data = $this->user_m->login($login_cond);
			// vde(pwd_encrypt($password, $user_data['password'], $user_data['salt']));
			// var_dump($user_data);exit;
			if (pwd_encrypt($password, $user_data['password'], $user_data['salt'])) { // 登录成功
				// 用户数据存入session
				$this->load->library('session');
				$sess_arr['front_sess'] = $user_data;
				$this->session->set_userdata($sess_arr);
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



	/**
	 * 注册重复性检查
	 * 
	 * 暂定检查用户邮箱，后期如果采取手机号码注册的话，则对手机号码注册
	 * 
	 * @ctime 2016年03月19日11:46:37
	 * @param  array $cond 检查的条件 eg ['email'=>'ningerjohn@163.com'] or ['phone'=>'18*********']
	 * @return object       查询的结果
	 */
	public function repeat_check($cond)
	{
		// 是否注册检查
		$res = $this->tmp_usr_m->repeat_check($cond);
	}


	public function captcha_check($captcha=NULL)
	{
		if ( $captcha !== NULL ) {
			$this->session->userdata();
		} else {
			return false;
		}
		
	}




}
