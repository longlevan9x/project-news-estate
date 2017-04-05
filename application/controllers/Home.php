<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Home extends MY_Controller
{
	private $__title = "Trang chủ";
	private $__content = "Nội dung trang chủ";
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
		$data['estate'] = $this->home_model->get_all_data($this->_tableNameEstate, [10,0], [
			'posting_date' => "DESC",
		]);
		$data['estate_view'] = $this->home_model->get_all_data($this->_tableNameEstate, [10,0], [
			'view' => "DESC",
		]);

		$this->load->view('home/index_view', $data);
		// loader footer
		$this->_loadFooter();
	}

	public function logout()
	{
		$delete = array(
			'mem_id'      ,
			'mem_username',
			'mem_email'   ,
			'mem_fullname',
			'mem_phone'   ,
			'mem_address' ,
			'mem_avatar'  ,
			'mem_facebook',
			'mem_skype'   ,
		);
		$this->session->unset_userdata($delete);
		redirect(site_url('trang-chu'));
	}
}

