<?php
/**
* 
* 用户表模型
*
* 
* @author NJ
* @ctime 2016年01月22日21:21:41
* @used
* 
*/
class User_m extends CI_Model
{
	static $table_name='tt_user';
	function __construct()
	{
		# code...
		parent::__construct();
		// self::$table_name = 'tt_user';
	}

	public function get_table_name()
	{
		# code...
		return self::$table_name;
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
	public function repeat_check($cond, $needed_field = ['email','register_time'])
	{
		# code...
		$query = $this->db->select($needed_field)->from(self::$table_name)->where($cond)->get();
		$result = $query->row_array(); // 查询结果数组
		return $result;
		// $error = $this->db->error(); // 可以打印错误
	}

	/**
	 * 注册方法
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日16:21:11
	 * @param  array $reg_data 插入的用户数据
	 * @return int          影响的条数（一般都是一条）
	 * 
	 */
	public function register($reg_data)
	{
		// 插入数据成功的话为true，失败的话为false
		$result = $this->db->insert(self::$table_name, $reg_data);
		// vde($result);
		return $result;
	}


	/**
	 * 用户登录方法
	 * 
	 * @author NJ
	 * @ctime 2016-1-23 17:27:59
	 * @param  array $cond 查询条件(用户输入的邮箱和密码)
	 * @return int       结果数
	 * 
	 */
	public function login($cond, $field=['email','password','salt'])
	{
		# code...
		$query = $this->db->select($field)->from(self::$table_name)->where($cond)->get();
		$result = $query->row_array();
		// 直接返回用户数据，因为返回到控制器时需要进行密码验证并存到session里面
		return $result;
	}


}

































