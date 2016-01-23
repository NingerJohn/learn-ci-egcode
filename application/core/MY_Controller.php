<?php

/**
* 
*/
class MY_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
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

}




























