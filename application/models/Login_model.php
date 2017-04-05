<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function __destruct()
	{
		$this->db->close();
	}

	public function get_info_member($table, $where)
	{
		$data = array();
		foreach ($where as $k => $val) {
			$this->db->where($k, $val);
		}
		$data = $this->db->get($table)->row_array();

		return $data;
	}
}