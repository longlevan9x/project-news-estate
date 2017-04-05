<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Contact extends MY_Controller
{
	private $__title = "Liên hệ";
	private $__content = "Nội dung Liên hệ";
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

		$this->load->view('home/contact_view');
		// loader footer
		$this->_loadFooter();
	}
}

