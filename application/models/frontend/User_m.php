<?php

/**
* 
* 用户表模型
*
* 
* @ctime 2016年01月22日21:21:41
* @author NJ
* @used
* 
*/
class User_m extends CI_Model
{
	static $table_name;
	function __construct()
	{
		# code...
		parent::__construct();
		self::$table_name = 'vf_user';
	}
	public function repeat_check($cond)
	{
		# code...
		$this->db->select('*');
		$this->db->from(self::$table_name);
		$this->db->where($cond);
		$result = $this->db->get(); // 查询的结果
		$finRes = $result->num_rows(); // 查询条数
		var_dump($finRes);exit;
		// $count = $Q->num_rows(); // num_rows方法回返回结果的条数
		$error = $this->db->error();
		return $error;
		return $count;
	}
}

































