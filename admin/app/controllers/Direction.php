<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Creater : Long
* create time: 5-3-2017
*/
class Direction extends MY_Controller
{
	private $__title = "Hướng";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();

		$this->load->model('direction_model');
		// load lib validation
		$this->load->library('form_validation');
	}

	public function index($mess = null)
	{
		$this->breadcrumbs->unshift($this->__title, '/direction');

		$action = $this->uri->segment(3);
		// load header
		$header = array();
		if ($action == "editdirection")
		{
			$header['title'] = "Sửa thông tin hướng";
			$header['content'] = "Sửa thông tin hướng";

			$this->breadcrumbs->push($header['title'], '/direction');
		}
		else
		{
			$header['title'] = $this->__title;
			$header['content'] = "Danh sách các hướng";
		}
		$this->_loadHeader($header);

		//load menu
		$this->_loadMenu();

		$data = array();
		$data['success']   = (!empty($mess) && $mess == "success")   ? "Thêm thành công." : "";
		$data['fail']      = (!empty($mess) && $mess == "fail")      ? "Thêm thất bại."   : "";
		$data['editOk']    = (!empty($mess) && $mess == "edit-ok")   ? "Sửa thành công."  : "";
		$data['deleteOk']  = (!empty($mess) && $mess == "delete-ok") ? "Xóa thành công."  : "";
		$data['direction'] = $this->direction_model->get_all_data_direction();
		// load content
		if ($action == "editdirection")
		{
			$this->editDirection();
		}
		else
		{
			$this->load->view('direction/index_view',$data);
		}
		//load footer
		$this->_loadFooter();
	}

	// Ham addDirection thuc hien cong viec lay du lieu tu form , chuan hoa du lieu , them du lieu vao db
	public function addDirection()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('txtName', 'Tên hướng', 'trim|required|is_unique[object_direction.name_direction]');
			if ($this->form_validation->run())
			{
				$nameDirection = $this->input->post('txtName', TRUE);
				$nameDirection = $this->security->xss_clean($nameDirection);

				$data = array(
					'name_direction' => $nameDirection
				);

				$addName = $this->direction_model->add_name_direction($data);
				if ($addName) {
					redirect(site_url('direction/index/success'));
				}
				else
				{
					redirect(site_url('direction/index/fail'));
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
	public function editDirection()
	{
		$id = $this->uri->segment(4);
		$mess = "";
		$mess = $this->uri->segment(5);
		if (is_numeric($id))
		{
			$data =$this->direction_model->get_data_direction_by_id($id);
			if (!empty($data))
			{
				$data['editfail']      = (!empty($mess) && $mess == "edit-fail") ? "Sửa thất bại" : '';
				$data['nameDirection'] = $data['name_direction'];
				$data['idDirection']   = $data['id'];
				$this->load->view('direction/edit_view',$data);

				if ($this->input->post()) {
					$this->form_validation->set_rules('txtName', 'Tên hướng', 'trim|required');
					$this->form_validation->set_rules('hddName', 'Tên hướng', 'trim|required');

					if ($this->form_validation->run()) {
						$nameDirection    = $this->input->post('txtName', TRUE);
						$nameDirection    = $this->security->xss_clean($nameDirection);
						$hddNameDirection = $this->input->post('hddName', TRUE);
						$hddNameDirection = $this->security->xss_clean($hddNameDirection);

						if ($nameDirection !== $hddNameDirection)
						{
							$editName = $this->direction_model->edit_name_direction($id, $nameDirection);

							if ($editName)
							{
								redirect(site_url('direction/index/edit-ok'));
							}
							else
							{
								redirect(site_url('direction/index/editdirection/' . $id . '/edit-fail'));
							}
							// end check edit name
						}
						else
						{
							redirect(site_url('direction/index/edit-ok'));
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

	public function deleteDirection($id = null)
	{
		if (is_numeric($id))
		{
			$deleteId = $this->direction_model->delete_data($id);
			if ($deleteId)
			{
				redirect(site_url('direction/index/delete-ok'));
			}
			else
			{
				redirect(site_url('direction/index/delete-fail'));
			}
		}
		else
		{
			show_404();
		}
	}
}