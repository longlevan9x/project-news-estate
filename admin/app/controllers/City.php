<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Creater : Long
* create time: 5-3-2017
*/
class City extends MY_Controller
{
	private $__title = "Thành phố";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();

		$this->load->model('city_model');
		// load lib validation
		$this->load->library('form_validation');
	}

	public function index($mess = null)
	{
		$this->breadcrumbs->unshift($this->__title, '/city');

		$action = $this->uri->segment(3);
		// load header
		$header = array();
		if ($action == "editcity")
		{
			$header['title'] = "Sửa thông tin thành phố";
			$header['content'] = "Sửa thông tin thành phố";

			$this->breadcrumbs->push($header['title'], '/city');
		}
		else
		{
			$header['title'] = $this->__title;
			$header['content'] = "Danh sách các Thành phố";
		}
		$this->_loadHeader($header);

		//load menu
		$this->_loadMenu();

		$data = array();
		$data['success']   = (!empty($mess) && $mess == "success")   ? "Thêm thành công." : "";
		$data['fail']      = (!empty($mess) && $mess == "fail")      ? "Thêm thất bại."   : "";
		$data['editOk']    = (!empty($mess) && $mess == "edit-ok")   ? "Sửa thành công."  : "";
		$data['deleteOk']  = (!empty($mess) && $mess == "delete-ok") ? "Xóa thành công."  : "";
		$data['city'] = $this->city_model->get_all_data_city();
		// load content
		if ($action == "editcity")
		{
			$this->editCity();
		}
		else
		{
			$this->load->view('city/index_view',$data);
		}
		//load footer
		$this->_loadFooter();
	}

	// Ham addCity thuc hien cong viec lay du lieu tu form , chuan hoa du lieu , them du lieu vao db
	public function addCity()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('txtName', 'Tên thành phố', 'trim|required|is_unique[object_city.name_city]');
			if ($this->form_validation->run())
			{
				$nameCity = $this->input->post('txtName', TRUE);
				$nameCity = $this->security->xss_clean($nameCity);

				$data = array(
					'name_city' => $nameCity
				);

				$addName = $this->city_model->add_name_city($data);
				if ($addName) {
					redirect(site_url('city/index/success'));
				}
				else
				{
					redirect(site_url('city/index/fail'));
				}
				//end add name
			}
			else
			{
				$this->index();
			}
			//end check validation
		}
	}

	// 1 lay id tu url
	// hien thi du lieu ra view theo id
	// chinh sua du lieu trong form
	public function editCity()
	{
		$id = $this->uri->segment(4);
		$mess = "";
		$mess = $this->uri->segment(5);
		if (is_numeric($id))
		{
			$data =$this->city_model->get_data_city_by_id($id);
			if (!empty($data))
			{
				$data['editfail'] = (!empty($mess) && $mess == "edit-fail") ? "Sửa thất bại" : '';
				$data['nameCity'] = $data['name_city'];
				$data['idCity']   = $data['id'];
				$this->load->view('city/edit_view',$data);

				if ($this->input->post()) {
					$this->form_validation->set_rules('txtName', 'Tên thành phố', 'trim|required');
					$this->form_validation->set_rules('hddName', 'Tên thành phố', 'trim|required');

					if ($this->form_validation->run()) {
						$nameCity    = $this->input->post('txtName', TRUE);
						$nameCity    = $this->security->xss_clean($nameCity);
						$hddNameCity = $this->input->post('hddName', TRUE);
						$hddNameCity = $this->security->xss_clean($hddNameCity);

						if ($nameCity !== $hddNameCity)
						{
							$editName = $this->city_model->edit_name_city($id, $nameCity);

							if ($editName)
							{
								redirect(site_url('city/index/edit-ok'));
							}
							else
							{
								redirect(site_url('city/index/editcity/' . $id . '/edit-fail'));
							}
							// end check edit name
						}
						else
						{
							redirect(site_url('city/index/edit-ok'));
						}
						// check same between name old and new name
					}
					else
					{
						$this->index();
					}
					//end validation
				}
			}
			else
			{
				show_404();
			}
			// end check empty data
		}
		else
		{
			show_404();
		}
		//end check id
	}

	public function deleteCity($id = null)
	{
		if (is_numeric($id))
		{
			$deleteId = $this->city_model->delete_data($id);
			if ($deleteId)
			{
				redirect(site_url('city/index/delete-ok'));
			}
			else
			{
				redirect(site_url('city/index/delete-fail'));
			}
		}
		else
		{
			show_404();
		}
	}
}