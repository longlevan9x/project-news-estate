<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* 
*/
class  Bank_model extends CI_Model
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

	public function add_name_bank($data = array())
	{
		$flag = FALSE;
		if ($this->db->insert("object_bank",$data))
		{
			$flag = TRUE;
		}
		return $flag;
	}
	public function edit_name_bank($id, $nameBank)
	{
		$flag = FALSE;
		$data = array(
			'name_bank' => $nameBank
		);
		$this->db->where("id", $id);
		if ($this->db->update("object_bank",$data))
		{
			$flag = TRUE;
		}
		return $flag;
	}

	public function get_all_data_bank_model()
	{
		$data = array();

		$this->db->select("*");
		$this->db->from("object_bank");
		$data = $this->db->get()->result_array();

		return $data;
	}
	public function get_data_bank_by_id($id)
	{
		$data = array();

		$this->db->select("*");
		$this->db->from("object_bank");
		$this->db->where("id",$id);
		$data = $this->db->get()->row_array();

		return $data;
	}

	public function delete_data($id)
	{
		$flag = FALSE;
		$this->db->where('id',$id);
		if ($this->db->delete('object_bank')) {
			$flag = TRUE;
		}

		return $flag;
	}

}