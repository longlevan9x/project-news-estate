<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class WebIntroduce_model extends CI_Model
{
	private $__data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function __destruct()
	{
		$this->db->close();
	}

	public function add_data_intro($data = array())
	{
		$flag = FALSE;
		if($this->db->insert("web_introduce", $data))
		{
			$flag = TRUE;
		}
		return $flag;
	}

	public function delete_data_intro($id)
	{
		$flag = FALSE;
		$this->db->where('id', $id);
		if($this->db->delete("web_introduce"))
		{
			$flag = TRUE;
		}
		return $flag;
	}

	public function get_all_data_intro()
	{
		$this->db->select("*");
		$this->db->from("web_introduce");
		$this->__data = $this->db->get()->result_array();

		return $this->__data;
	}

	public function get_all_data_intro_by_id($id)
	{
		$this->db->select("*");
		$this->db->from("web_introduce");
		$this->db->where("id", $id);
		$this->__data = $this->db->get()->row_array();

		return $this->__data;
	}
}