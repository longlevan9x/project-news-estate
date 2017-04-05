<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Estate extends MY_Controller
{
	private $__title   = 'Danh mục bất động sản';
	private $__content = 'Nội dung bất động sản';
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->model('estate_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array();
		$this->breadcrumbs->unshift("Bất động sản", '/estate');
		$action = $this->uri->segment(3);
		//loadheader
		$header = array();
		switch ($action) {
			case 'create':
				$this->breadcrumbs->push("Thêm thông tin", '/estate/create');
				$header['title'] = 'Thêm thông tin';
				$header['content'] = 'Thêm thông tin';
				break;
			case 'view':
				$this->breadcrumbs->push("Xem thông tin", '/estate/view');
				$header['title'] = 'Xem thông tin';
				$header['content'] = 'Xem thông tin';
				break;

			default:
				$header['title'] = $this->__title;
				$header['content'] = $this->__content;
				break;
		}

		$this->_loadHeader($header);
		// load menu
		$this->_loadMenu();
		// load content
		$data['estate'] = $this->estate_model->get_all_data_estate($this->_tableNameEstate);
		switch ($action) {
			case 'create':
				$this->create();
				break;
			case 'view':
				$this->view();
				break;

			default:
				$this->load->view('estate/index_view', $data);
				break;
		}
		//lload footer
		$this->_loadFooter();

	}

	public function view()
	{
		$url = $this->uri->segment(4);
		$arrUrl = explode("-", $url);
		$id = end($arrUrl);
		$slug = str_replace("-".$id,"",$url);

		if (!is_numeric($id))
		{
			show_404();
		}
		else
		{
			$data = array();
			$data = $this->estate_model->get_data_by_id($this->_tableNameEstate, $this->_fieldId, $id);
			$this->load->view('estate/info_view', $data);
		}
	}

	public function create()
	{
		$data = array();
		$mess = isset($_GET['mess']) ? trim($_GET['mess']) : "";

		$data['city'] = $this->dashboard_model->get_all_data($this->_tableNameCity);
		$data['direction'] = $this->dashboard_model->get_all_data($this->_tableNameDirect);
		$data['newsCate'] = $this->dashboard_model->get_all_data($this->_tableNameNews_cate);
		$data['failimg'] = (!empty($mess) && $mess == 'fail-img') ? $this->session->userdata('error_img') : '';


		$this->load->view('estate/add_view',$data);
	}

	public function actionCreate()
	{
		$data = array();
		if ($this->input->post())
		{
			$rule = [
				'trim' => "{field} xóa trắng",
				'required' => "{field} không được để trống",
				'integer'  => "{field} chọn không đúng",
				'numeric'  => "{field} nhập không đúng",
				'integer'  => "{field} chọn không đúng",
				'integer'  => "{field} chọn không đúng",
				'less_than'    => "{field} chọn không đúng",
				'greater_than' => "{field} chọn không đúng",
			];
			$this->form_validation->set_rules('txtArea', 'Khu vực', 'trim|required|integer',$rule);
			$this->form_validation->set_rules('txtCity', 'Thành phố', 'trim|required|integer', $rule);
			$this->form_validation->set_rules('txtDist', 'Quận/Huyện', 'trim|required|integer', $rule);
			$this->form_validation->set_rules('txtDirect', 'Hướng', 'trim|required|integer', $rule);
			$this->form_validation->set_rules('txtTitle', 'Tiêu đề', 'trim|required', $rule);
			$this->form_validation->set_rules('txtAcreage', 'Diện tích', 'trim|required|numeric', $rule);
			$this->form_validation->set_rules('txtGara', 'Nhà xe', 'trim|required|greater_than[0]|less_than[11]', $rule);
			$this->form_validation->set_rules('txtKitchen', 'Phòng bếp', 'trim|required|greater_than[0]|less_than[11]', $rule);
			$this->form_validation->set_rules('txtBedroom', 'Phòng ngủ', 'trim|required|greater_than[0]|less_than[11]', $rule);
			$this->form_validation->set_rules('txtLiving', 'Phòng khách', 'trim|required|greater_than[0]|less_than[11]', $rule);
			$this->form_validation->set_rules('txtBargain', 'Thương lượng', 'trim|required|greater_than[0]|less_than[3]', $rule);
			$this->form_validation->set_rules('txtNewsCate', 'Loại tin', 'trim|required|greater_than[0]|less_than[5]', $rule);
			$this->form_validation->set_rules('txtTypeEstate', 'Loại bật động sản', 'trim|required|integer', $rule);
			$this->form_validation->set_rules('txtLocation', 'Vị trí cụ thể', 'trim|required', $rule);
			$this->form_validation->set_rules('txtDescrip', 'Thông tin cơ bản', 'trim|required', $rule);

			if ($this->form_validation->run())
			{
				$city_id  = $this->input->post('txtCity', TRUE);
				$city_id  = $this->security->xss_clean($city_id);

				$dist_id  = $this->input->post('txtDist', TRUE);
				$dist_id  = $this->security->xss_clean($dist_id);

				$area_id  = $this->input->post('txtArea', TRUE);
				$area_id  = $this->security->xss_clean($area_id);

				$direct_id  = $this->input->post('txtDirect', TRUE);
				$direct_id  = $this->security->xss_clean($direct_id);

				$title    = $this->input->post('txtTitle', TRUE);
				$title    = $this->security->xss_clean($title);

				$acreage  = $this->input->post('txtAcreage', TRUE);
				$acreage  = $this->security->xss_clean($acreage);

				$price    = $this->input->post('txtPrice', TRUE);
				$price    = $this->security->xss_clean($price  );

				$gara     = $this->input->post('txtGara', TRUE);
				$gara     = $this->security->xss_clean($gara);

				$kitchen  = $this->input->post('txtKitchen', TRUE);
				$kitchen  = $this->security->xss_clean($kitchen);

				$bedroom  = $this->input->post('txtBedroom', TRUE);
				$bedroom  = $this->security->xss_clean($bedroom);

				$livingroom = $this->input->post('txtLiving', TRUE);
				$livingroom = $this->security->xss_clean($livingroom);

				$bargain    = $this->input->post('txtBargain', TRUE);
				$bargain    = $this->security->xss_clean($bargain);

				$newsCate   = $this->input->post('txtNewsCate', TRUE);
				$newsCate   = $this->security->xss_clean($newsCate);

				$typeEstate = $this->input->post('txtTypeEstate', TRUE);
				$typeEstate = $this->security->xss_clean($typeEstate);

				$location   = $this->input->post('txtLocation', TRUE);
				$location   = $this->security->xss_clean($location);

				$descript   = $this->input->post('txtDescrip', TRUE);
				$descript   = $this->security->xss_clean($descript);

				$expiration_at = $this->input->post('txtExp', TRUE);
				$expiration_at = $this->security->xss_clean($expiration_at);

				// get image
				$nameImg  = "";
				$config['upload_path'] = '../uploads/imgEstate';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '1024';
				$config['max_width']  = 1024;
				$config['max_height']  = 1024;

				$this->load->library('upload', $config);

				if ( !$this->upload->do_upload('txtFile')){
					$this->session->set_userdata('error_img', $this->upload->display_errors());
					redirect(site_url('estate/index/create?mess=fail-img'));
					die();
				}
				else{
					$data['image'] = $this->upload->data();
					$nameImg = $data['image']['file_name'];
				}

				$data = array(
					"city_id"      => $city_id,
					"district_id"  => $dist_id,
					"area_id"      => $area_id,
					"direction_id" => $direct_id,
					"news_cate_id" => $newsCate,
					"real_estate_type" => $typeEstate,
					"slug"         => vn2latin($title),
					"title"        => $title,
					"image"        => $nameImg,
					"acreage"      => $acreage,
					"price"        => $price,
					"location"     => $location,
					"garage"       => $gara,
					"kitchen"      => $kitchen,
					"bedroom"      => $bedroom,
					"livingroom"   => $livingroom,
					"bargain"      => $bargain,
					"view"         => 0,
					"description"  => $descript,
					"expiration_time" => $expiration_at,
					"posting_date" => date("Y-m-d H:i:s"),
					"modify_date"  => "",
				);

				$addEstate = $this->dashboard_model->add_data($this->_tableNameEstate, $data);

				$addEstate ? redirect(site_url('estate/index?mess=success')) : redirect(site_url('estate/index/create?mess=fail'));
			}
			else
			{
				$this->create();
			}
		}
	}

	public function actionActive()
	{
		if ($this->input->is_ajax_request())
		{
			$status = $this->input->post('status');
			$status = $this->security->xss_clean($status);
			$id     = $this->input->post('id');
			$id     = $this->security->xss_clean($id);
			$id     = is_numeric($id) ? $id : 0;

			$data = [
				'status' => $status
			];

			$active = $this->dashboard_model->edit_data($this->_tableNameEstate, $this->_fieldIdEstate, $id, $data);

			if($active)
			{
				$data1['res'] = 'ok';
			}
			else{
				$data1['res'] = 'fail';
			}
			echo json_encode($data1);
		}
	}
	// lay du lieu trong bang district theo id lay tu form ajax.
	// hien thi du lieu bang ajax
	public function loadDistrict()
	{
		$data = ['result' => ""];
		if ($this->input->is_ajax_request())
		{
			$idCity = $this->input->post('idCity',TRUE);
			$data['district'] = $this->dashboard_model->get_data_by_id($this->_tableNameDist,$this->_fieldIdCityDist, $idCity);

			$data['result'] = $data['district'];

			echo json_encode($data);
		}
	}

	public function loadArea()
	{
		$data = ['result' => ""];
		if ($this->input->is_ajax_request())
		{
			$idDist = $this->input->post('idDist',TRUE);
			$data['area'] = $this->dashboard_model->get_data_by_id($this->_tableNameArea,$this->_fieldIdDistArea, $idDist);

			$data['result'] = $data['area'];

			echo json_encode($data);
		}
	}

	public function loadEstate()
	{
		$data = ['result' => ""];
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id',TRUE);

			if (is_numeric($id))
			{
				$data['estatesale'] = $this->estate_model->get_all_data_by_type_estate($this->_tableNameEstate, $id);

				$data['result'] = $data['estatesale'];
			}
			else
			{
				$data['result'] = [];
			}

			echo json_encode($data);
		}
	}

}