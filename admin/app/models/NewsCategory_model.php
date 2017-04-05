<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* 
*/
class  NewsCategory_model extends CI_Model
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

	public function add_name_news_cate($data = array())
	{
		$flag = FALSE;
		if ($this->db->insert("news_category", $data))
		{
			$flag = TRUE;
		}
		return $flag;
	}
	public function edit_name_news_cate($id, $nameArea)
	{
		$flag = FALSE;
		$data = array(
			'name_category' => $nameArea
		);
		$this->db->where("id_cate", $id);
		if ($this->db->update("news_category", $data))
		{
			$flag = TRUE;
		}
		return $flag;
	}

	public function get_all_data_news_cate_model()
	{
		$data = array();

		$this->db->select("*");
		$this->db->from("news_category");
		$data = $this->db->get()->result_array();

		return $data;
	}
	public function get_data_news_cate_by_id($id)
	{
		$data = array();

		$this->db->select("*");
		$this->db->from("news_category");
		$this->db->where("id_cate",$id);
		$data = $this->db->get()->row_array();

		return $data;
	}

	public function delete_data($id)
	{
		$flag = FALSE;
		$this->db->where('id_cate', $id);
		if ($this->db->delete('news_category')) {
			$flag = TRUE;
		}

		return $flag;
	}

}