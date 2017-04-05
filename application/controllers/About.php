<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class About extends MY_Controller
{
	private $__title = "Giới thiệu";
	private $__content = "Nội dung giới thiệu";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index()
	{

		//load header
		$header = array();

		$header['title'] = $this->__title;
		$header['content'] = $this->__content;

		$this->_loadHeader($header);
		// load content
		$this->load->view('home/about_view');
		// loader footer
		$this->_loadFooter();
	}
}

