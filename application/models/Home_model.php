<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Home_model extends CI_Model
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

	public function get_all_info($tableName, $where = array())
	{
		$data = array();

		foreach ($where as $k => $val)
		{
			$this->db->where($k, $val);
		}
		$data = $this->db->get($tableName)->result_array();
		return $data;
	}

	public function get_all_data($tableName,$limit = [6,0], $orderWhere = array())
	{
		$data = array();
		$order = '';
		foreach ($orderWhere as $k => $val)
		{
			$order = (empty($order)) ? "{$k} {$val}" : ", {$k} {$val}";
		}
		$this->db->where('status', 2);
		$this->db->join('object_city', "object_city.id = {$tableName}.city_id");
		$this->db->join('object_district', "object_district.id = {$tableName}.district_id");
		$this->db->join('object_area', "object_area.id = {$tableName}.area_id");
		$this->db->join('object_direction', "object_direction.id = {$tableName}.direction_id");
		$this->db->join('news_category', "news_category.id_cate = {$tableName}.real_estate_type");
		$this->db->order_by($order);
		$this->db->limit($limit[0], $limit[1]);
		$data = $this->db->get($tableName)->result_array();
		return $data;
	}

	public function get_all_data_estate_by_page($tableName,$limit = [6,0], $orderWhere = array())
	{
		$data = array();
		$start = ($limit[1] - 1) * $limit[0];
		$order = '';
		foreach ($orderWhere as $k => $val)
		{
			$order = (empty($order)) ? "{$k} {$val}" : ", {$k} {$val}";
		}
		$this->db->where('status', 2);
		$this->db->join('object_city', "object_city.id = {$tableName}.city_id");
		$this->db->join('object_district', "object_district.id = {$tableName}.district_id");
		$this->db->join('object_area', "object_area.id = {$tableName}.area_id");
		$this->db->join('object_direction', "object_direction.id = {$tableName}.direction_id");
		$this->db->order_by($order);
		$this->db->limit($limit[0], $start);
		$data = $this->db->get($tableName)->result_array();
		return $data;
	}

	public function get_all_data_by_id_cate($tableName, $info = array())
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
			$limit = isset($info['limit']) ? $info['limit'] : 100;
			$start = isset($info['start']) ? $info['start'] : 0;
			$this->db->limit($limit, $start);
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

	public function get_data_by_id($tableName, $id, $slug)
	{
		$data = array();
		$this->db->where("id_estate", $id);
		$this->db->where("slug", $slug);
		$this->db->join('object_city', "object_city.id = {$tableName}.city_id");
		$this->db->join('object_district', "object_district.id = {$tableName}.district_id");
		$this->db->join('object_area', "object_area.id = {$tableName}.area_id");
		$this->db->join('object_direction', "object_direction.id = {$tableName}.direction_id");
		$this->db->join('news_category', "news_category.id_cate = {$tableName}.real_estate_type");
		$this->db->join('member', "member.id = {$tableName}.poster_id");
		$data = $this->db->get($tableName)->row_array();
		return $data;
	}


	public function upload_view($tableName, $id, $slug, $view)
	{

		$view++;
		$data = [
			"view" => $view,
		];
		$this->db->where("id_estate", $id);
		$this->db->where("slug", $slug);
		if ($this->db->update('estate', $data))
		{
			return TRUE;
		}
		return FALSE;
	}
}