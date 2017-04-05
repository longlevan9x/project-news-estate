<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Estate_model extends CI_Model
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


	public function get_all_data_estate($tableName, $where = array())
	{
		$data = array();
		foreach ($where as $k => $item)
		{
			$this->db->where($k, $item);
		}
		$this->db->join('object_city', "object_city.id = {$tableName}.city_id");
		$this->db->join('object_district', "object_district.id = {$tableName}.district_id");
		$this->db->join('object_area', "object_area.id = {$tableName}.area_id");
		$this->db->join('object_direction', "object_direction.id = {$tableName}.direction_id");
		$data = $this->db->get($tableName)->result_array();
		return $data;
	}

	public function get_all_data_by_type_estate($tableName, $idTypeEstate)
	{
		$data = array();
		$this->db->where('news_cate_id', $idTypeEstate);
		$this->db->join('object_city', "object_city.id = {$tableName}.city_id");
		$this->db->join('object_district', "object_district.id = {$tableName}.district_id");
		$this->db->join('object_area', "object_area.id = {$tableName}.area_id");
		$this->db->join('object_direction', "object_direction.id = {$tableName}.direction_id");
		$data = $this->db->get($tableName)->result_array();
		return $data;
	}

	public function get_data_by_id($tableName,$fieldId ,$id)
	{
		$data = array();
		$this->db->where("{$tableName}.id_estate", $id);
		$this->db->join('object_city', "object_city.id = {$tableName}.city_id");
		$this->db->join('object_district', "object_district.id = {$tableName}.district_id");
		$this->db->join('object_area', "object_area.id = {$tableName}.area_id");
		$this->db->join('object_direction', "object_direction.id = {$tableName}.direction_id");
		$this->db->join('news_category', "news_category.id_cate = {$tableName}.real_estate_type");
		$data = $this->db->get($tableName)->row_array();
		return $data;
	}
}
