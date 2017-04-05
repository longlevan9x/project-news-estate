<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Blog extends MY_Controller
{
	private $__title = "Blog";
	private $__content = "Nội dung blog";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index()
	{
		$action = $this->uri->segment(1);
		//load header
		$header = array();

		$header['title'] = $this->__title;
		$header['content'] = $this->__content;

		$this->_loadHeader($header);

		// load content

		$this->load->view('home/blog_view');
		// loader footer
		$this->_loadFooter();
	}
}

