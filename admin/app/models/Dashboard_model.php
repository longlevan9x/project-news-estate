<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* 
*/
class  Dashboard_model extends CI_Model
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

	public function add_data($talbeName, $data = array())
	{
		$flag = FALSE;
		if ($this->db->insert($talbeName, $data))
		{
			$flag = TRUE;
		}
		return $flag;
	}
	public function edit_data($talbeName, $fieldId, $id, $data)
	{
		$flag = FALSE;
		$this->db->where($fieldId, $id);
		if ($this->db->update($talbeName, $data))
		{
			$flag = TRUE;
		}
		return $flag;
	}

	public function get_all_data($tableName)
	{
		$data = array();

		// $this->db->select("*");
		// $this->db->from($tableName);
		$data = $this->db->get($tableName)->result_array();

		return $data;
	}

	public function get_all_data_by_id($tableName, $fieldId, $id)
	{
		$data = array();

		$this->db->select("*");
		$this->db->from($tableName);
		$this->db->where($fieldId, $id);
		$data = $this->db->get()->result_array();

		return $data;
	}

	public function get_data_by_id($tableName, $fieldId, $id)
	{
		$data = array();

		$this->db->select("*");
		$this->db->from($tableName);
		$this->db->where($fieldId, $id);
		$data = $this->db->get()->row_array();

		return $data;
	}

	public function delete_data($tableName, $fieldId, $id)
	{
		$flag = FALSE;
		$this->db->where($fieldId, $id);
		if ($this->db->delete($tableName)) {
			$flag = TRUE;
		}

		return $flag;
	}

}