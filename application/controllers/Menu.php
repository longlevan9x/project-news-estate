<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Menu extends MY_Controller
{
	private $__title = "Danh sách BDS";
	private $__content = "Danh sách BDS";
	protected $_limit = 9;
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();
		$this->load->model('menu_model');

	}

	public function index()
	{
		// get id from url
		$url = $this->uri->segment(2);
		$arrUrl = explode('-', $url);
		$id_newscate = end($arrUrl);

		$header = array();
		$header['title'] = $this->__title;
		$header['content'] = $this->__content;
		$this->_loadHeader($header);

		// load content
		$data          = array();
		$dataSearch['andWhere'] = array('estate.real_estate_type' => $id_newscate);
		$data['allInfo'] = $this->menu_model->get_all_data($this->_tableNameEstate, $dataSearch);

		// PAGING
		$this->load->library('pagination');
		$config['per_page']  = $this->_limit; // limit
		$config['total_rows']            = count($data['allInfo']); // total page
		$config['use_page_numbers']      = TRUE;
		$config['use_global_url_suffix'] = TRUE; // them .html tren url
		$config['base_url']              = base_url().'the-loai/'.$url;

		// custom css paging
		foreach ($this->_configBootstrapt() as $key => $val) {
			$config[$key] = $val;
		};

		// start
		$start = $this->uri->segment(3);
		$start = (!isset($start) ? 1 : $start);

		$dataSearch['limit'] = $config['per_page'];
		$dataSearch['start'] = $start;
		$dataSearch['orderWhere'] = array('view' => "DESC",'posting_date' => "DESC",);

		$data['estate']      = $this->menu_model->get_all_data_by_page($this->_tableNameEstate, $dataSearch);

		// echo "<pre>";print_r($data['estate']);die;

		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();

		$this->load->view('search/index_view', $data);
		// loader footer
		$this->_loadFooter();
	}
}