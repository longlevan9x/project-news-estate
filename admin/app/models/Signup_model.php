<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Signup_model extends CI_Model
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

	public function add_admin($data = array())
	{
		$flag = FALSE;

		if ($this->db->insert("user",$data))
		{
			$flag = TRUE;
		}

		return $flag;
	}
}