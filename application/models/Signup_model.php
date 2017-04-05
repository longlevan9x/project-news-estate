<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Signup_model extends CI_Model
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


	public function add_member($data = array())
	{
		if ($this->db->insert("member", $data))
		{
			return $this->db->insert_id();
		}
		return 0;
	}

	public function get_all_data($table, $where = array())
	{
		$data = array();
		foreach ($where as $k => $val)
		{
			$this->db->where("{$k}", $val);
		}
		$data = $this->db->get($table)->row_array();

		return $data;
	}

	public function active_acc_member($table, $id,$data = array())
	{
		$this->db->where('id', $id);
		if ($this->db->update($table, $data))
		{
			return TRUE;
		}
		return FALSE;
	}
}