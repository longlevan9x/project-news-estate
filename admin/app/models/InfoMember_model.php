<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class InfoMember_model extends CI_Model
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

	public function get_all_data_admin()
	{
		$data = array();
		$this->db->select("*");
		$this->db->from("member");
		$this->db->order_by("username ASC");
		$data = $this->db->get()->result_array();
		return $data;
	}
	public function get_data_info_admin_by_id($id)
	{
		$data = array();
		$this->db->select("*");
		$this->db->from("member");
		$this->db->where("id", $id);

		$data = $this->db->get()->row_array();
		return $data;
	}

	public function edit_admin($data = array(), $username)
	{
		$flag = FALSE;
		$this->db->where("username", $username);
		if ($this->db->update("member", $data))
		{
			$flag = TRUE;
		}

		return $flag;
	}

	public function delete_info($id)
	{
		$flag = FALSE;
		$this->db->where("id", $id);
		if ($this->db->delete("member"))
		{
			$flag = TRUE;
		}

		return $flag;
	}
}