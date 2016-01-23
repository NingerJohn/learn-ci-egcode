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

	/**
	 * 用户邮箱重复性检测
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日16:16:47
	 * @param  array $cond 查询条件
	 * @return int       结果数
	 * 
	 */
	public function repeat_check($cond)
	{
		# code...
		$query = $this->db->select('*')->from(self::$table_name)->where($cond)->get();
		$result = $query->num_rows(); // 查询条数
		return $result;
		// $error = $this->db->error(); // 可以打印错误
	}

	/**
	 * 注册方法
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日16:21:11
	 * @param  array $val_arr 插入的数据
	 * @return int          影响的条数（一般都是一条）
	 * 
	 */
	public function register($val_arr)
	{
		$result = $this->db->insert(self::$table_name, $val_arr); // 插入数据成功的话为true，失败的话为false
		return $result;
	}


}

































