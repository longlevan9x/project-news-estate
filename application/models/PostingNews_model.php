<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class PostingNews_model extends CI_Model
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

	public function add_info($table, $data = array())
	{
		$flag = FALSE;
		if ($this->db->insert($table, $data))
		{
			$flag = $this->db->insert_id();
		}

		return $flag;
	}

	public function update_info($table, $data = array(), $where = array())
	{
		$flag = FALSE;
		if ($this->db->update($table, $data, $where))
		{
			$flag = TRUE;
		}

		return $flag;
	}

	public function delete_data($table, $where = array())
	{
		$flag = FALSE;
		if ($this->db->delete($table, $where))
		{
			$flag = TRUE;
		}

		return $flag;
	}

	public function get_all_data_by_id($table,$where = array())
	{
		$data = array();
		foreach ($where as $k => $val)
		{
			$this->db->where($k, $val);
		}
		$data = $this->db->get($table)->result_array();

		return $data;
	}

	public function get_data_by_id($table,$where = array())
	{
		$data = array();
		foreach ($where as $k => $val)
		{
			$this->db->where($k, $val);
		}
		$data = $this->db->get($table)->row_array();

		return $data;
	}

	public function get_all_data($table,$where = array())
	{
		$data = array();
		foreach ($where as $k => $val)
		{
			$this->db->where($k, $val);
		}
		$data = $this->db->get($table)->result_array();

		return $data;
	}

	public function get_one_data($table,$where = array())
	{
		$data = array();
		foreach ($where as $k => $val)
		{
			$this->db->where($k, $val);
		}
		$data = $this->db->get($table)->row_array();

		return $data;
	}


	public function get_all_data_estate($tableName, $info = "")
	{
		$data = array();
		if (is_array($info))
		{
			$andWhere = isset($info['andWhere']) ? $info['andWhere'] : [];
			$orWhere  = isset($info['orWhere'])  ? $info['orWhere']  : [];
			$orlike   = isset($info['orlike'])   ? $info['orlike']   : [];

			$orderWhere = isset($info['orderWhere'])  ? $info['orderWhere']  : [];

			$order = '';
			foreach ($orderWhere as $k => $val)
			{
				// $order = (empty($order)) ? "{$k} {$val}" : ", {$k} {$val}";
				$this->db->order_by($k, $val);
			}
			$like = '';
			// foreach ($orlike as $key => $value) {
			// 	$like = (empty($like)) ? "{}"
			// }
			// $limit = isset($info['limit']) ? $info['limit'] : 10000;
			// $start = isset($info['start']) ? $info['start'] : 0;
			// $this->db->limit($limit, $start);
			$this->db->or_like($orlike);
			$this->db->where($andWhere);
			$this->db->or_where($orWhere);
		}

		$this->db->join('object_city',     "object_city.id = {$tableName}.city_id");
		$this->db->join('object_district', "object_district.id = {$tableName}.district_id");
		$this->db->join('object_area',     "object_area.id = {$tableName}.area_id");
		$this->db->join('object_direction',"object_direction.id = {$tableName}.direction_id");
		$this->db->join('news_category',   "news_category.id_cate = {$tableName}.real_estate_type");
		$this->db->join('member',          "member.id = {$tableName}.poster_id");

		$data = $this->db->get($tableName)->result_array();
		return $data;
	}


	public function get_data_estate_by_id($tableName, $info = "")
	{
		$data = array();
		if (is_array($info))
		{
			$andWhere = isset($info['andWhere']) ? $info['andWhere'] : [];
			$orWhere  = isset($info['orWhere'])  ? $info['orWhere']  : [];
			$orlike   = isset($info['orlike'])   ? $info['orlike']   : [];

			$orderWhere = isset($info['orderWhere'])  ? $info['orderWhere']  : [];

			$order = '';
			foreach ($orderWhere as $k => $val)
			{
				// $order = (empty($order)) ? "{$k} {$val}" : ", {$k} {$val}";
				$this->db->order_by($k, $val);
			}
			$like = '';
			// foreach ($orlike as $key => $value) {
			// 	$like = (empty($like)) ? "{}"
			// }
			// $limit = isset($info['limit']) ? $info['limit'] : 10000;
			// $start = isset($info['start']) ? $info['start'] : 0;
			// $this->db->limit($limit, $start);
			$this->db->or_like($orlike);
			$this->db->where($andWhere);
			$this->db->or_where($orWhere);
		}

		$this->db->join('object_city',     "object_city.id = {$tableName}.city_id");
		$this->db->join('object_district', "object_district.id = {$tableName}.district_id");
		$this->db->join('object_area',     "object_area.id = {$tableName}.area_id");
		$this->db->join('object_direction',"object_direction.id = {$tableName}.direction_id");
		$this->db->join('news_category',   "news_category.id_cate = {$tableName}.real_estate_type");
		$this->db->join('member',          "member.id = {$tableName}.poster_id");

		$data = $this->db->get($tableName)->row_array();
		return $data;
	}
}