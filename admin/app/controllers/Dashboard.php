<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Dashboard extends MY_Controller
{
	private $__title = "Trang chủ";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();

		// $this->load->library('breadcrumbs'); load in autoload
	}

	public function index()
	{
		// add breadcrumbs
		// $this->breadcrumbs->push('Home', '/'.'dashboard/index');

		// unshift crumb
		// $this->breadcrumbs->unshift('Home','/');

		//load header
		$header = array("title" => $this->__title, "content" => "Đây là trang chủ.");
		$this->_loadHeader($header);

		// load menu
		$this->_loadMenu();
		// load content
		$this->load->view('dashboard/index_view');
		// loader footer
		$this->_loadFooter();
	}

	public function logout()
	{
		$this->session->unset_userdata("adm_username");
		$this->session->unset_userdata("adm_email");
		$this->session->unset_userdata("adm_phone");
		$this->session->unset_userdata("adm_role");
		$this->session->unset_userdata("adm_status");
		redirect(site_url('login'));
	}
}

