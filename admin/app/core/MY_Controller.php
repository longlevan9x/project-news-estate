<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class MY_Controller extends CI_Controller
{
	protected $_className;
	protected $_fieldId         = 'id';

	protected $_fieldIdEstate   = 'id_estate';

	protected $_tableNameArea   = "object_area";
	protected $_fieldNameArea   = 'name_area';
	protected $_fieldIdDistArea = 'id_district';

	protected $_tableNameDist   = "object_district";
	protected $_fieldNameDist   = 'name_district';
	protected $_fieldIdCityDist = 'id_city';

	protected $_tableNameCity   = "object_city";
	protected $_fieldNameCity   = 'name_city';

	protected $_tableNameDirect = "object_direction";
	protected $_fieldNameDirect = 'name_direction';

	protected $_tableNameEstate = "estate";

	protected $_tableNameNews_cate   = "news_category";
	function __construct()
	{
		parent::__construct();

		if ($this->_className == "area" ||
			$this->_className == "bank" ||
			$this->_className == "city" ||
			$this->_className == "dashboard" ||
			$this->_className == "direction" ||
			$this->_className == "district"  ||
			$this->_className == "infoadmin" ||
			$this->_className == "signup"    ||
			$this->_className == "webintroduce" ||
			$this->_className == "newscategory" ||
			$this->_className == "estate")
		{
			if ($this->_checkLoginAdmin())
			{
				redirect(site_url('login'));
				die();
			}
			// else
			// {
			// 	$dash = new Dashboard();
			// 	$this->dash->index();
			// }
		}
	}

	protected function _checkLoginAdmin()
	{
		$username = $this->_getSessionUsername();
		$email = $this->_getSessionEmail();
		if (!empty($username) && !empty($email))
		{
			return FALSE;
		}
		return TRUE;
	}

	protected function _loadHeader($header = array())
	{
		//add breadcrumbs default is dashboard
		$this->breadcrumbs->unshift('<a href="'.site_url('dashboard').'">Trang chủ</a>', '/dashboard');

		$data = array();
		$data['title']   = $header['title'];
		$data['content'] = $header['content'];
		$data['className']  = $this->_className;

		$data['session_username'] = $this->_getSessionUsername();
		$data['session_email']    = $this->_getSessionEmail();
		$data['session_phone']    = $this->_getSessionPhone();
		$data['session_role_admin']  = $this->_getSessionRoleAdmin();
		$data['session_role_admin']  = $this->_getSessionStatus();


		$this->load->view('layouts/header_view', $data);
	}
	protected function _loadMenu()
	{
		$this->load->view('layouts/menu_view');
	}
	protected function _loadFooter()
	{
		$this->load->view('layouts/footer_view');
	}



	// ham lay ra cac  gia tri cua session
	protected function _getSessionUsername()
	{
		$username = $this->session->userdata('adm_username');// lay ra gia tri cua session da gan
		$username = (!empty($username)) ? $username : "";
		return $username;
	}


	protected function _getSessionEmail()
	{
		$email = $this->session->userdata('adm_email');// lay ra gia tri cua session da gan
		$email = (!empty($email)) ? $email : "";
		return $email;
	}

	protected function _getSessionRoleAdmin()
	{
		$address = $this->session->userdata('adm_role_admin');// lay ra gia tri cua session da gan
		$address = (!empty($address)) ? $address : "";
		return $address;
	}

	protected function _getSessionPhone()
	{
		$phone = $this->session->userdata('adm_phone');// lay ra gia tri cua session da gan
		$phone = (!empty($phone)) ? $phone : "";
		return $phone;
	}

	protected function _getSessionStatus()
	{
		$status = $this->session->userdata('adm_status');// lay ra gia tri cua session da gan
		$status = (!empty($status)) ? $status : "";
		return $status;
	}
}
