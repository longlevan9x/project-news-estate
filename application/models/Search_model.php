<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model
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

	public function get_all_data($tableName, $info = "")
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
				// $this->db->order_by($k, $val);
			}
			$like = '';
			// foreach ($orlike as $key => $value) {
			// 	$like = (empty($like)) ? "{}"
			// }
			// $limit = isset($info['limit']) ? $info['limit'] : 10000;
			// $start = isset($info['start']) ? $info['start'] : 0;
			// $this->db->limit($limit, $start);
			$this->db->or_like($orlike);
			$this->db->where('status', 2);
			$this->db->where($andWhere);
			$this->db->or_where($orWhere);
		}

		$this->db->join('object_city', "object_city.id = {$tableName}.city_id");
		$this->db->join('object_district', "object_district.id = {$tableName}.district_id");
		$this->db->join('object_area', "object_area.id = {$tableName}.area_id");
		$this->db->join('object_direction', "object_direction.id = {$tableName}.direction_id");
		$this->db->join('news_category', "news_category.id_cate = {$tableName}.real_estate_type");

		$data = $this->db->get($tableName)->result_array();
		return $data;
	}

	public function get_all_data_by_page($tableName, $info = "")
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

			$this->db->or_like($orlike);
			$this->db->where('status', 2);
			$this->db->where($andWhere);
			$this->db->or_where($orWhere);

			$limit = isset($info['limit']) ? $info['limit'] : 10000;
			$start = ($info['start'] - 1) * $limit;

			$this->db->limit($limit, $start);

		}

		$this->db->join('object_city', "object_city.id = {$tableName}.city_id");
		$this->db->join('object_district', "object_district.id = {$tableName}.district_id");
		$this->db->join('object_area', "object_area.id = {$tableName}.area_id");
		$this->db->join('object_direction', "object_direction.id = {$tableName}.direction_id");
		$this->db->join('news_category', "news_category.id_cate = {$tableName}.real_estate_type");

		$data = $this->db->get($tableName)->result_array();
		return $data;
	}
}