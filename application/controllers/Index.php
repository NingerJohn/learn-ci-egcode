<?php
defined('BASEPATH') OR exit('No direct script access allowed');


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

	/**
	 * 退出方法
	 * 
	 * @author NJ
	 * @ctime 2016年01月24日19:38:25
	 * @return NULL 无
	 * 
	 */
	public function logout()
	{
		# code...
		// 清空前台session数据
		if($this->session->has_userdata('front_sess')){
			$this->session->unset_userdata('front_sess');
		}
		// 清空后台session数据
		if($this->session->has_userdata('back_sess')){
			$this->session->unset_userdata('back_sess');
		}
		// 也可以使用下面的三木运算的方式
		// $this->session->has_userdata('front_sess') ? $this->session->unset_userdata('front_sess') : '';
		// $this->session->has_userdata('back_sess') ? $this->session->unset_userdata('back_sess') : '';
		redirect(site_url('entry/login')); // 跳转到entry网站入口页面
	}

	/**
	 * 网站首页
	 * 
	 * @author
	 * @ctime 2016年01月24日19:39:03
	 * @return NULL 无
	 */
	public function index()
	{
		$data['web_title'] = $this->web_title;
		$data['page_title'] = '前台首页';
		$this->load->view('common/head',$data);
		$this->load->view('common/foot');
	}



}


































