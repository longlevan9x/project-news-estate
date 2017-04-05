<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Search extends MY_Controller
{
	private $__title = "Danh sách BDS";
	private $__content = "Danh sách BDS";
	protected $_limit = 9;
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();
		$this->load->model('search_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// $action = strtolower($this->uri->segment(3));
		$sort = $this->uri->segment(2);
		$sort = (isset($sort) && is_numeric($sort) && ($sort == 1 || $sort == 0)) ? $sort : -1;

		$header = array();
		$header['title'] = $this->__title;
		$header['content'] = $this->__content;
		$this->_loadHeader($header);

		// load content
		$data            = array();
		$dataSearch      = $this->search();
		$data['allInfo'] = $this->search_model->get_all_data($this->_tableNameEstate, $dataSearch);

		// PAGING
		$this->load->library('pagination');
		$config['per_page']  = $this->_limit; // limit

		$config['total_rows']            = count($data['allInfo']); // total page
		$config['use_page_numbers']      = TRUE;
		$config['use_global_url_suffix'] = TRUE; // them .html tren url
		if ($sort == 1 || $sort == 0) {
			$config['base_url']          = base_url().'danh-sach-bds/'.$sort;
		}
		else
		{
			$config['base_url']          = base_url().'danh-sach-bds';
		}
		// custom css paging
		foreach ($this->_configBootstrapt() as $key => $val) {
			$config[$key] = $val;
		};


		if ($sort == 1)
		{
			$dataSearch['orderWhere'] = array('price' => "ASC",'view' => "DESC");
			// start
			$start = $this->uri->segment(3);
		}
		elseif ($sort == 0)
		{
			$dataSearch['orderWhere'] = array('price' => "DESC",'view' => "DESC");

			$start = $this->uri->segment(3);
		}
		else
		{
			$dataSearch['orderWhere'] = array('posting_date' => "DESC",'view' => "DESC");

			$start = $this->uri->segment(2);
		}

		$start = (isset($start) && is_numeric($start) && !empty($start)) ? $start : 1;

		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();

		$dataSearch['limit'] = $config['per_page'];
		$dataSearch['start'] = $start;
		$data['estate']      = $this->search_model->get_all_data_by_page($this->_tableNameEstate, $dataSearch);
		$data['sort'] = $sort;
		$this->load->view('search/index_view', $data);

		// loader footer
		$this->_loadFooter();
	}

	public function sort()
	{
		$typeSort = '';
		if ($this->input->is_ajax_request())
		{
			$typeSort = $this->input->post('sort_by');
			$typeSort = $this->security->xss_clean($typeSort);
			$typeSort = (!empty($typeSort)) ? $typeSort : '';
			$data = [];
			if ($typeSort == 2)
			{
				$data['res'] = "ok";
				$typeSort = "DESC";
			}
			elseif($typeSort == 1)
			{
				$data['res'] = "ok";
				$typeSort = "ASC";
			}
			echo json_encode($data);
			// echo $typeSort;die;
		}
		return $typeSort;
	}

	public function search()
	{
		$dataSearch = array();
		if ($this->input->post())
		{
			$keyword  = $this->input->post('txtKey');
			$keyword  = $this->security->xss_clean($keyword);

			$price1   = $this->input->post('txtPrice1');
			$price1   = $this->security->xss_clean($price1);
			$price1   = (!empty($price1) && is_numeric($price1)) ? $price1 : 1;

			$price2   = $this->input->post('txtPrice2');
			$price2   = $this->security->xss_clean($price2);
			$price2   = (!empty($price2) && is_numeric($price2)) ? $price2 : 999999999999;

			$acreage1 = $this->input->post('txtAcreage1');
			$acreage1 = $this->security->xss_clean($acreage1);
			$acreage1 = (!empty($acreage1) && is_numeric($acreage1)) ? $acreage1 : 1;

			$acreage2 = $this->input->post('txtAcreage2');
			$acreage2 = $this->security->xss_clean($acreage2);
			$acreage2 = (!empty($acreage2) && is_numeric($acreage2)) ? $acreage2 : 10000000;

			$typeEstate = $this->input->post('txtTypeEstate');
			$typeEstate = $this->security->xss_clean($typeEstate);
			$typeEstate = (is_numeric($typeEstate) && $typeEstate > 0) ? $typeEstate : 0;

			if (empty($keyword))
			{
				if ($typeEstate > 0)
				{
					$dataSearch = array(
						'andWhere' => array(
							'news_cate_id' => $typeEstate,
							'price >'   => $price1,
							'price < '  => $price2,
							'acreage >' => $acreage1,
							'acreage <' => $acreage2,
						)
					);
				}
				else
				{
					$dataSearch = array(
						'andWhere' => array(
							'price >'   => $price1,
							'price < '  => $price2,
							'acreage >' => $acreage1,
							'acreage <' => $acreage2,
						)
					);
				}
			}
			else
			{
				if ($typeEstate > 0)
				{
					$dataSearch = array(
						'andWhere' => array(
							'news_cate_id' => $typeEstate,
							'price >'   => $price1,
							'price < '  => $price2,
							'acreage >' => $acreage1,
							'acreage <' => $acreage2,
						),
						'orlike' => array(
							'title'         => $keyword,
							'name_city'     => $keyword,
							'name_district' => $keyword,
						)
					);
				}
				else
				{
					$dataSearch = array(
						'andWhere' => array(
							'price >'   => $price1,
							'price < '  => $price2,
							'acreage >' => $acreage1,
							'acreage <' => $acreage2,
						),
						'orlike' => array(
							'title'         => $keyword,
							'name_city'     => $keyword,
							'name_district' => $keyword,
						)
					);
				}
			}
		}

		return $dataSearch;
	}
}