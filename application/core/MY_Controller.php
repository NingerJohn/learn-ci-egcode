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
	 * 简化post获取数据形式
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日16:12:48
	 * @param  string $value 需要获取的前台数据名
	 * @return string        返回post数据
	 * 
	 */
	public function redirect($value=NULL)
	{
		if ($value===NULL) {
			$value = 'index/index';
		}
		redirect($value);
	}

	/**
	 * [sendemail description]
	 * @return [type] [description]
	 */
	public function send_email($email_address='ningerjohn@163.com', $subject='系统邮件', $content='测试邮件')
	{
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.163.com';
		$config['smtp_user'] = 'ningerjohn@163.com';
		$config['smtp_pass'] = "Ninger1486";//填写腾讯邮箱开启POP3/SMTP服务时的授权码，即核对密码正确
		$config['smtp_port'] = 25;
		$config['charset'] = 'utf-8';
		$config['smtp_timeout'] = 100;
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$config['crlf'] = PHP_EOL; // '\r\n'
		$config['newline'] = PHP_EOL; // '\r\n'
		$this->email->initialize($config);
		$this->email->from('ningerjohn@163.com', 'NingerJohn');
		$this->email->to($email_address);
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');
		$this->email->subject($subject);
		$this->email->message($content);
		$result = $this->email->send();
		if ($result) {
			return true;
		} else {
			return $this->email->print_debugger();
		}
		
	}


	/**
	 * 前台页面加载语言文件
	 * @return array 语言数组
	 */
	private function load_language(){
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




























