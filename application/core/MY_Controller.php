<?php

/**
* 网站最高一级的父类控制器， 对CI_Controller控制器进行扩展
* 
* 1. 基本的变量设置
* 网站名字，
* 2. 常用方法的声明
* 简化get，post获取方式的方法
* 
*
* 
*/
class MY_Controller extends CI_Controller
{
	
	public $web_title; // 网站的名字（一般都会显示到title标签里面）
	
	function __construct()
	{
		parent::__construct();
		$this->web_title = 'CI学习例子代码'; // 网站名字，与每个网页的名字不一样
	}

	/**
	 * 简化post获取数据形式
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日16:12:48
	 * @param  string $value 需要获取的前台数据名
	 * @return string        返回post数据
	 * 
	 */
	public function post($value=NULL)
	{
		return $this->input->post($value);
	}

	/**
	 * 简化post获取数据形式
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日16:12:48
	 * @param  string $value 需要获取的前台数据名
	 * @return string        返回post数据
	 * 
	 */
	public function get($value=NULL)
	{
		return $this->input->get($value);
	}

	/**
	 * 发送邮件方法
	 * 
	 * 发送邮件给用户，全站公用方法
	 * 
	 * @author  NJ <ningerjohn@163.com>
	 * @ctime 2016年03月19日11:58:47
	 * @return mixed 发送是否成功，不成功的话，则返回错误信息，上线后需要屏蔽
	 * 
	 */
	public function send_email($email_address='1084046180@qq.com', $subject='系统邮件', $content='测试邮件')
	{
		$this->load->library('email');
		// $this->email->initialize($config);
		$this->email->from('ningerjohn@163.com', 'NingerJohn');
		$this->email->to($email_address);
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');
		$this->email->subject($subject);
		$this->email->message($content);
		$result = $this->email->send();
		if ($result) {
			// vd($result);
			return true;
		} else {
			vd($this->email->print_debugger());
			return $this->email->print_debugger();
		}
		
	}

	/**
	 * 返回数据给前台方法
	 * 
	 * @author NJ
	 * @ctime 2016年03月19日13:06:58
	 * @param  array $data         返回的数据数组
	 * @param  string $data_format 返回的数据格式
	 * @return NULL                输出值
	 * 
	 */
	public function ajax_return($data=NULL, $data_format='json')
	{
		if ( $data_format=='json' ) {
			echo json_encode($data);exit;
		} else if( $data_format == 'xml' ) {
			echo json_encode($data);exit;
		}
	}


	/**
	 * 设置session数据的方法
	 * 
	 * @author NJ ningerjohn@163.com
	 * @ctime 2016年03月19日12:06:27
	 * @param  mixed $sess_name 要设置的session数组或者名字
	 * @param  string $sess_value 要设置的session的值
	 * @return mixed       session值
	 */
	public function set_sess($sess_name=NULL, $sess_value=NULL)
	{
		if ($sess_value==NULL) {
			# 键值对的形式
			$this->session->set_userdata($sess_name);
		} else {
			# 名字和值的形式
			$this->session->set_userdata($sess_name, $sess_value);
		}
		
	}



	/**
	 * 获取session数据的方法
	 * @author NJ ningerjohn@163.com
	 * @ctime 2016年03月19日12:06:27
	 * @param  string $sess_name 获取的session的名字
	 * @return mixed       session值
	 */
	public function get_sess($sess_name=NULL)
	{
		# code...
		return $this->session->userdata($sess_name);
	}
	
	/**
	 * 判断是否存在某个名字的session
	 * @author NJ
	 * @param  string  $name session名字
	 * @return boolean       返回session检查结果
	 */
	public function has_sess($name)
	{
		return $this->session->has_userdata($name);
	}

	/**
	 * 删除session数据的方法
	 * 
	 * @author NJ ningerjohn@163.com
	 * @ctime 2016年03月19日12:22:50
	 * @param  mixed $sess_name 要删除的session的名字字符串或者数组
	 * @return NULL       无
	 */
	public function del_sess($sess_name=NULL)
	{
		# code...
		$this->session->unset_userdata($sess_name);
	}

	/**
	 * 发送邮箱验证码
	 * 注册验证码；找回密码的验证码
	 *
	 * 备注： 因为网站发送不同类型的验证码到用户邮箱，此方法仅仅用来发送验证码
	 * 
	 * @author NJ
	 * @ctime 2016年03月19日12:56:57
	 * @param  string $email   邮箱地址
	 * @param  string $captcha_type 发送验证码类型：register：注册；find_pwd：找回密码；
	 * @return mixed          发送结果
	 */
	public function email_captcha($email=NULL, $captcha_type='register')
	{
		// vde(strlen($email));
		// vd($captcha !== NULL && $captcha === '' && strlen($captcha) != 6);
		// 先进行格式验证
		// if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		// 	$finRes['status'] = 0;
		// 	$finRes['msg'] = '请输入正确的邮箱地址';
		// 	$this->ajax_return($finRes);
		// } else if( $captcha !== NULL && (strlen($captcha) < 6 || strlen($captcha) > 6) ) {
		// 	$finRes['status'] = 0;
		// 	$finRes['msg'] = '请输入正确的验证码';
		// 	$this->ajax_return($finRes);
		// }
		// 如果该邮箱地址在session中不存在的时候，则发送邮箱验证码
		if ( $this->get_sess($captcha_type . '_email') !== $email ) {
			// 验证码为NULL，且session总没有email时，发送6位邮箱验证码给用户并存到session里面
			$captcha = mt_rand(100000,999999);
			$email_title = '注册验证码';
			$email_content = $captcha;
			$send_res = $this->send_email($email, $email_title, $email_content);
			if ($send_res==true) {
				# 发送成功
				$this->set_sess([$captcha_type.'_email'=>$email, $captcha_type.'_captcha'=>$captcha]);
				$finRes['status'] = 1;
				$finRes['msg'] = '获取验证码成功';
				$this->ajax_return($finRes);
			} else {
				# 发送失败
				$finRes['status'] = 0;
				$finRes['msg'] = '获取验证码失败，请稍后重试';
				$this->ajax_return($finRes);
			}
		} else{
			# 验证码已发送
			$finRes['status'] = 0;
			$finRes['msg'] = '验证码已发送，请检查您的邮箱';
			$this->ajax_return($finRes);
		} 
		exit('邮箱验证码方法异常结束');


		// if( $captcha !==NULL ){
		// 	// 进行验证码验证工作
		// 	if( $this->has_sess($captcha_type . '_email') ){
		// 		// 验证码已发送
				
		// 	}else if( $this->has_sess('email') && $this->get_sess('email')==$email && $this->get_sess('captcha') == $captcha ){
		// 		$finRes['status'] = 1;
		// 		$finRes['msg'] = '验证码正确';
		// 		$this->ajax_return($finRes);
		// 	}else{
		// 		// vd($captcha. '  '.$this->get_sess('captcha'));
		// 		// vd($this->get_sess('captcha') == $captcha);
		// 		$finRes['status'] = 0;
		// 		$finRes['msg'] = '验证码不正确';
		// 		$this->ajax_return($finRes);
		// 	}
		// }
	}

	/**
	 * 邮箱验证码验证方法
	 * 
	 * @author NJ ningerjohn@163.com
	 * @ctime 2016年03月20日20:01:23
	 * @param  string $email   邮箱地址
	 * @param  string $captcha 验证码
	 * @param  string $type    验证码类型
	 * @return NULL          无
	 */
	public function mail_captcha_varify($email, $captcha, $type='register')
	{
		// 先进行格式验证
		if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			$finRes['status'] = 0;
			$finRes['msg'] = '请输入正确的邮箱地址';
			return $finRes;
			// $this->ajax_return($finRes);
		} else if( $captcha !== NULL && (strlen($captcha) < 6 || strlen($captcha) > 6) ) {
			$finRes['status'] = 0;
			$finRes['msg'] = '请输入正确的验证码';
			return $finRes;
			// $this->ajax_return($finRes);
		}
		if ( $this->get_sess($type.'_email') == $email && $this->get_sess($type . '_captcha') == $captcha ) {
			$finRes['status'] = 1;
			$finRes['msg'] = '验证码正确';
			return $finRes;
			// $this->ajax_return($finRes);
		} else {
			$finRes['status'] = 1;
			$finRes['msg'] = '验证码错误';
			return $finRes;
			// $this->ajax_return($finRes);
		}
	}


	/**
	 * 简化redirect方法
	 * 
	 * 备注： 可以直接使用redirect方法就可以了，这个只是看起来规范一些而已
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日16:12:48
	 * @param  string $value 需要获取的前台数据名
	 * @return string        返回post数据
	 * 
	 */
	public function redirect($url=NULL)
	{
		if ( $url===NULL || $url == '' ) {
			$url = 'index/index';
		}
		redirect($url);
	}

	/**
	 * 前台页面加载语言文件
	 * 
	 * @author NJ ningerjohn@163.com
	 * @ctime 2016年03月19日12:01:11
	 * @return array 语言数组
	 * 
	 */
	private function load_language()
	{
		$session = $this->session->all_userdata();
		// set the language
		if(isset($session['language']) && $session['language']==='english'){
			// 加载中文
			$this->lang->load('front','chinese');
			return $data = $this->lang->line('language');
			$this->lang->load('front',$session['language']);
			return $data = $this->lang->line('language');
		}else if(isset($session['language']) && $session['language']==='chinese'){
			// 加载英文
			$this->lang->load('front','chinese');
			return $data = $this->lang->line('language');
		}else{
			// 默认加载中文
			$this->lang->load('front','chinese');
			return $data = $this->lang->line('language');
		}
	}




}




























