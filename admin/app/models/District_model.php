<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Creater : Long
* create time: 5-3-2017
*/
class District_model extends CI_Model
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

	public function add_name_district($data = array())
	{
		$flag = FALSE;
		if ($this->db->insert("object_district",$data))
		{
			$flag = TRUE;
		}

		return $flag;
	}

	public function edit_name_district($id, $nameDistrict)
	{
		$flag = FALSE;
		$data = array(
			'name_district' => $nameDistrict
		);
		$this->db->where("id", $id);
		if ($this->db->update("object_district",$data))
		{
			$flag = TRUE;
		}
		return $flag;
	}

	public function delete_data($id)
	{
		$flag = FALSE;
		$this->db->where('id', $id);
		if ($this->db->delete("object_district"))
		{
			$flag = TRUE;
		}
		return $flag;
	}

	public function get_all_data_district()
	{
		$data = array();
		$this->db->select("*");
		$this->db->from("object_district");
		$data = $this->db->get()->result_array();

		return $data;
	}
	public function get_data_district_by_id($id)
	{
		$data = array();
		$this->db->select("*");
		$this->db->from("object_district");
		$this->db->where("id",$id);
		$data = $this->db->get()->row_array();

		return $data;
	}
}