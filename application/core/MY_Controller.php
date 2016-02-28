<?php

/**
* 网站最高级的父类控制器， 对CI_Controller控制器进行扩展
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





}




























