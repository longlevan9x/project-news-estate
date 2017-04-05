<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Creater : Long
* create time: 5-3-2017
*/
class District extends MY_Controller
{
	private $__title     = "Quận / Huyện";

	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();

		$this->load->model('dashboard_model');
		// load lib validation
		$this->load->library('form_validation');
	}

	public function index($mess = null)
	{
		$this->breadcrumbs->unshift($this->__title, '/district');

		$action = $this->uri->segment(3);
		// load header
		$header = array();
		if ($action == "editdistrict")
		{
			$header['title'] = "Sửa thông tin Quận / Huyện";
			$header['content'] = "Sửa thông tin Quận / Huyện";

			$this->breadcrumbs->push($header['title'], '/district');
		}
		else
		{
			$header['title'] = $this->__title;
			$header['content'] = "Danh sách các Quận / Huyện";
		}
		$this->_loadHeader($header);

		//load menu
		$this->_loadMenu();

		$data = array();
		$data['success']   = (!empty($mess) && $mess == "success")    ? "Thêm thành công." : "";
		$data['fail']      = (!empty($mess) && $mess == "fail")       ? "Thêm thất bại."   : "";
		$data['failid']    = (!empty($mess) && $mess == "err-idcity") ? "Tên thành phố không tồn tại."   : "";
		$data['editOk']    = (!empty($mess) && $mess == "edit-ok")    ? "Sửa thành công."  : "";
		$data['deleteOk']  = (!empty($mess) && $mess == "delete-ok")  ? "Xóa thành công."  : "";
		$data['district'] = $this->dashboard_model->get_all_data($this->_tableNameDist);
		$data['city']     = $this->dashboard_model->get_all_data($this->_tableNameCity);

		// load content
		if ($action == "editdistrict")
		{
			$this->editDistrict();
		}
		else
		{
			$this->load->view('district/index_view',$data);
		}
		//load footer
		$this->_loadFooter();
	}

	// Ham addDistrict thuc hien cong viec lay du lieu tu form , chuan hoa du lieu , them du lieu vao db
	public function addDistrict()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('txtName', 'Tên Quận / Huyện', "trim|required|is_unique[{$this->_tableNameDist}.{$this->_fieldNameDist}]",
				array(
					'required'  => "Tên Quận / Huyện không được để trống",
					'is_unique' => "Tên Quận / Huyện đã tồn tại",
			));
			if ($this->form_validation->run())
			{
				$nameDistrict = $this->input->post('txtName', TRUE);
				$nameDistrict = $this->security->xss_clean($nameDistrict);
				$idCity       = $this->input->post('txtCity', TRUE);
				$idCity       = $this->security->xss_clean($idCity);
				$idCity       = (is_numeric($idCity)) ? $idCity : 0;

				$idCheck = $this->dashboard_model->get_data_by_id($this->_tableNameCity, $this->_fieldId, $idCity);
				if (!empty($idCheck))
				{
					$data = array(
						$this->_fieldNameDist   => $nameDistrict,
						$this->_fieldIdCityDist => $idCity,
					);

					$addName = $this->dashboard_model->add_data($this->_tableNameDist, $data);

					$addName ? redirect(site_url('district/index/success')) : redirect(site_url('district/index/fail'));
				}
				else
				{
					redirect(site_url('district/index/err-idcity'));
				}
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
	public function editDistrict()
	{
		$id = $this->uri->segment(4);
		$mess = "";
		$mess = $this->uri->segment(5);
		if (is_numeric($id))
		{
			$data = $this->dashboard_model->get_data_by_id($this->_tableNameDist, $this->_fieldId, $id);
			$data['city'] = $this->dashboard_model->get_all_data($this->_tableNameCity);
			if (!empty($data))
			{
				$data['editfail'] = (!empty($mess) && $mess == "edit-fail") ? "Sửa thất bại" : '';
				$data['failid']   = (!empty($mess) && $mess == "err-idcity") ? "Tên thành phố không tồn tại."   : "";
				$data['nameDistrict'] = $data['name_district'];
				$data['idDistrict']   = $data['id'];
				$this->load->view('district/edit_view',$data);

				if ($this->input->post()) {
					$this->form_validation->set_rules('txtName', 'Tên Quận Huyện', 'trim|required');
					$this->form_validation->set_rules('hddName', 'Tên Quận Huyện', 'trim|required');

					if ($this->form_validation->run()) {
						$nameDistrict    = $this->input->post('txtName', TRUE);
						$nameDistrict    = $this->security->xss_clean($nameDistrict);
						$hddNameDistrict = $this->input->post('hddName', TRUE);
						$hddNameDistrict = $this->security->xss_clean($hddNameDistrict);
						$idCity          = $this->input->post('txtCity', TRUE);
						$idCity          = $this->security->xss_clean($idCity);
						$idCity          = (is_numeric($idCity)) ? $idCity : 0;

						$idCheck = $this->dashboard_model->get_data_by_id($this->_tableNameCity, $this->_fieldId, $idCity);
						if (!empty($idCheck))
						{
							if ($nameDistrict !== $hddNameDistrict)
							{
								$dataEdit = [
									$this->_fieldNameDist   => $nameDistrict,
									$this->_fieldIdCityDist => $idCity,
								];
								$editName = $this->dashboard_model->edit_data($this->_tableNameDist, $this->_fieldId, $id, $dataEdit);

								$editName ? redirect(site_url('district/index/edit-ok')) : redirect(site_url('district/index/editdistrict/' . $id . '/edit-fail'));
							}
							else
							{
								$dataEdit = [
									$this->_fieldNameDist   => $nameDistrict,
									$this->_fieldIdCityDist => $idCity,
								];
								$this->dashboard_model->edit_data($this->_tableNameDist, $this->_fieldId, $id, $dataEdit);
								redirect(site_url('district/index/edit-ok'));
							}
							// check same between name old and new name
						}
						else
						{
							redirect(site_url('district/index/editdistrict/' . $id . '/err-idcity'));
						}
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

	public function deleteDistrict($id = null)
	{
		if (is_numeric($id))
		{
			$deleteId = $this->dashboard_model->delete_data($this->_tableNameDist, $this->_fieldId, $id);

			$deleteId ? redirect(site_url('district/index/delete-ok')) : redirect(site_url('district/index/delete-fail'));
		}
		else
		{
			show_404();
		}
	}
}