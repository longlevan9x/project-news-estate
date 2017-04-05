<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* 
*/
class  Area_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function __destruct()
	{
		$this->db->close();
	}

	public function add_name_area($data = array())
	{
		$flag = FALSE;
		if ($this->db->insert("object_area",$data))
		{
			$flag = TRUE;
		}
		return $flag;
	}
	public function edit_name_area($id, $nameArea)
	{
		$flag = FALSE;
		$data = array(
			'name_area' => $nameArea
		);
		$this->db->where("id", $id);
		if ($this->db->update("object_area",$data))
		{
			$flag = TRUE;
		}
		return $flag;
	}

	public function get_all_data_area_model()
	{
		$data = array();

		$this->db->select("*");
		$this->db->from("object_area");
		$data = $this->db->get()->result_array();

		return $data;
	}
	public function get_data_area_by_id($id)
	{
		$data = array();

		$this->db->select("*");
		$this->db->from("object_area");
		$this->db->where("id",$id);
		$data = $this->db->get()->row_array();

		return $data;
	}

	public function delete_data($id)
	{
		$flag = FALSE;
		$this->db->where('id',$id);
		if ($this->db->delete('object_area')) {
			$flag = TRUE;
		}

		return $flag;
	}

}