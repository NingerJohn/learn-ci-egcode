<?php
/**
* 
* 临时用户表模型
*
* 注意： 因为用户注册直接使用邮箱验证码，则暂时不再使用临时用户表来作为中间表（2016年03月20日21:19:55）
* 
* 
* @author NJ
* @ctime 2016年3月10日18:25:38
* @used
* 
*/
class Temp_user_m extends CI_Model
{
	static $table_name='tt_temp_user';
	
	function __construct()
	{
		# code...
		parent::__construct();
		// self::$table_name = 'tt_temp_user';
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
	public function repeat_check($cond, $needed_field = ['email','mail_verified','register_time'])
	{
		# code...
		$query_result = $this->db->select($needed_field)->from(self::$table_name)->where($cond)->get();
		// vd($query_result->row());
		// $result = $query->num_rows(); // 查询条数
		// 返回结果
		return $query_result->row_array();
		// $error = $this->db->error(); // 可以打印错误
	}

	/**
	 * 注册方法
	 * 
	 * @author NJ
	 * @ctime 2016年1月23日16:21:11
	 * @param  array $reg_data 插入的数据
	 * @return int          影响的条数（一般都是一条）
	 * 
	 */
	public function register($reg_data)
	{
		$temp_reg_data = $reg_data;
		$main_reg_data = $reg_data;
		$this->db->trans_begin();

		$temp_reg_res = $this->db->insert(self::$table_name, $reg_data);
		$this->load->model('common/user_m');
		$main_reg_res = $this->db->insert($this->user_m->get_table_name(), $reg_data);
		// vd($this->user_m->get_table_name());


		// $this->db->query('AN SQL QUERY...');
		// $this->db->query('ANOTHER QUERY...');
		// $this->db->query('AND YET ANOTHER QUERY...');

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			vde('成功');
		}
		else
		{
			$this->db->trans_commit();
			vde('失败');
		}
		// $this->db->where(['email'=>$reg_data['email'], 'mail_verified'=>0, 'register_time <'=>(time()-3600*24)]);
		// $email_rows = $this->db->count_all_results(self::$table_name);
		// vde($email_rows);
		// if ($email_rows > 0) {
		// 	// 邮箱存在的话，则更新
		// 	$register_res = $this->db->update(self::$table_name, $reg_data);
		// 	// vd('update');
		// } else {
		// 	// 邮箱存在的话，则插入
		// 	$register_res = $this->db->insert(self::$table_name, $reg_data);
		// 	$this->load->model('common/user_m');
		// 	// vd($this->user_m->get_table_name());
		// 	// vd('insert');
		// }
		// vde($register_res);
		// $result = $this->db->replace(self::$table_name, $reg_data); // 插入数据成功的话为true，失败的话为false
		return $register_res;
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
	public function login($cond)
	{
		# code...
		$query = $this->db->select('*')->from(self::$table_name)->where($cond)->get();
		var_dump($query->row());exit;
		return $query->row(); // 直接返回用户数据，因为返回到控制器时需要存到session里面
		$result = $query->num_rows(); // 如果根据邮箱和密码查询到的条数
		return $result;
		// $error = $this->db->error(); // 可以打印错误
	}


}

































