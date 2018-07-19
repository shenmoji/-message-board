<?php if ( ! defined('BASEPATH')) eit('No direct script access allowed');

class MsgModel extends CI_Model
{
	const TBL = 'msg';

	//构造函数
	public function __construct(){
		//调用父类构造函数，必不可少
		parent::__construct();
		//手动载入数据库操作类
		$this->load->database();
	}

	/**
	 * @access public
	 * @param $data array
	 * @return bool 成功返回true，失败返回false
	 */
	public function add($data)
	{
		return $this->db->insert(self::TBL,$data);
	}

	/**
	 * @access public
	 * @return array 查询的结果
	 */
	public function all()
	{
		$query = $this->db->get(self::TBL);
		return $query->result_array();
	}
}