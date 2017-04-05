<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Creater : Long
* create time: 5-3-2017
*/
class Area extends MY_Controller
{
	private $__title = "Khu vực";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();

		// load lib validation
		$this->load->library(array('form_validation'));
		$this->load->model('dashboard_model');
	}


	public function index($mess = "")
	{
		// unshift crumb
		$this->breadcrumbs->unshift($this->__title, '/area');


		// get action from url
		$action = $this->uri->segment(3);

		//load header
		$header = array();
		if ($action == "editarea")
		{
			$header['title'] = "Sửa thông tin Khu vực";
			$header['content'] = "Sửa thông tin Khu vực.";

			$this->breadcrumbs->push($header['title'], '/area');
		}
		else
		{
			$header['title'] = $this->__title;
			$header['content'] = "Danh sách các Khu vực.";
		}
		$this->_loadHeader($header);
		//load menu
		$this->_loadMenu();


		$data = array();

		$data['success']  = (!empty($mess) && $mess == "success")   ? "Thêm thành công." : "";
		$data['fail']     = (!empty($mess) && $mess == "fail")      ? "Thêm thất bại."   : "";
		$data['editok']   = (!empty($mess) && $mess == "edit-ok")   ? "Sửa thành công."  : "";
		$data['deleteok'] = (!empty($mess) && $mess == "delete-ok") ? "Xóa thành công."  : "";

		$data['area']     = $this->dashboard_model->get_all_data($this->_tableNameArea);
		$data['district'] = $this->dashboard_model->get_all_data($this->_tableNameDist);
		// load content
		if ($action == "editarea")
		{
			$this->editArea();
		}
		else
		{
			$this->load->view('area/index_view',$data);
		}
		// load footer
		$this->_loadFooter();
	}

	// Ham add area thuc hien cong viec lay du lieu tu form , chuan hoa du lieu , them du lieu vao db
	public function addArea()
	{
		if ($this->input->post())
		{
			$this->form_validation->set_rules('txtName', 'Tên khu vực', "trim|required|is_unique[{$this->_tableNameArea}.{$this->_fieldNameArea}]");
			if ($this->form_validation->run()) // validatedata
			{
				$nameArea = $this->input->post('txtName', TRUE);
				$nameArea = $this->security->xss_clean($nameArea);
				$idDist = $this->input->post('txtDistrict', TRUE);
				$idDist = $this->security->xss_clean($idDist);

				$data = [
					$this->_fieldNameArea   => $nameArea,
					$this->_fieldIdDistArea => $idDist,
				];

				$addName = $this->dashboard_model->add_data($this->_tableNameArea, $data);
				if ($addName)
				{
					redirect(site_url('area/index/success'));
				}
				else
				{
					redirect(site_url('area/index/fail'));
				}
				//end add
			}
			else
			{
				$this->index();
			}//end validate
		}
	}

	// 1 lay id tu url
	// hien thi du lieu ra view theo id
	// chinh sua du lieu trong form
	public function editArea()
	{
		$data = array();
		$id = $this->uri->segment(4);
		$mess = "";
		$mess = $this->uri->segment(5);

		if (is_numeric($id))
		{
			$data = $this->dashboard_model->get_data_by_id($this->_tableNameArea, $this->_fieldId, $id);
			$data['district'] = $this->dashboard_model->get_all_data($this->_tableNameDist);
			if (!empty($data))
			{
				$data['editfail'] = (!empty($mess) && $mess == "edit-fail")  ? "Sửa thất bại." : "";
				$data['failid']   = (!empty($mess) && $mess == "err-idcity") ? "Tên thành phố không tồn tại."   : "";
				$data['nameArea'] = $data['name_area'];
				$data['idArea']   = $data['id'];

				$this->load->view("area/edit_view",$data);

				if ($this->input->post())
				{
					$this->form_validation->set_rules('txtName', 'Tên ngân hàng', 'trim|required');
					$this->form_validation->set_rules('hddName', 'Tên ngân hàng', 'trim|required');
					if ($this->form_validation->run()) // validatedata
					{
						$nameArea    = $this->input->post('txtName', TRUE);
						$nameArea    = $this->security->xss_clean($nameArea);
						$hddNameArea = $this->input->post('hddName', TRUE);
						$hddNameArea = $this->security->xss_clean($hddNameArea);
						$idDist      = $this->input->post('txtDist', TRUE);
						$idDist      = $this->security->xss_clean($idDist);
						$idDist      = (is_numeric($idDist)) ? $idDist : 0;
						$idCheck = $this->dashboard_model->get_data_by_id($this->_tableNameDist, $this->_fieldId, $idDist);
						if (!empty($idCheck))
						{
							if ($nameArea != $hddNameArea) // check same between name old and new name
							{
								$dataEdit = [
									$this->_fieldNameArea   => $nameArea,
									$this->_fieldIdDistArea => $idDist,
								];
								$editName = $this->dashboard_model->edit_data($this->_tableNameArea, $this->_fieldId, $id, $dataEdit);

								$editName ? redirect(site_url('area/index/edit-ok')) : redirect(site_url('area/index/editarea/'.$id."/edit-fail"));
								// end editname
							}
							else
							{
								$dataEdit = [
									$this->_fieldNameArea   => $nameArea,
									$this->_fieldIdDistArea => $idDist,
								];
								$this->dashboard_model->edit_data($this->_tableNameArea, $this->_fieldId, $id, $dataEdit);
								redirect(site_url('area/index/edit-ok'));
							}//end check hddname and name
						}
						else
						{
							redirect(site_url('area/index/editarea/' . $id . '/err-idcity'));
						}
					}
					else
					{
						$this->editArea();
					}//end validate
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
	}

	public function deleteArea($id = null)
	{
		if (is_numeric($id))
		{
            $deleteId = $this->dashboard_model->delete_data($this->_tableNameArea, $this->_fieldId, $id);

			$deleteId ? redirect(site_url('area/index/delete-ok')) : redirect(site_url('area/index/delete-fail'));
		}
		else
		{
			show_404();
		}
	}
}