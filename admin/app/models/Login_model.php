<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Login_model extends CI_Model
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

	public function check_login($username, $password)
	{
		$data = array();
		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("username", $username);
		$this->db->where("password", $password);
		$data = $this->db->get()->row_array();
		return $data;
	}
}