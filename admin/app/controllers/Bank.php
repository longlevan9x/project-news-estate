<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Creater : Long
* create time: 5-3-2017
*/
class Bank extends MY_Controller
{
	private $__title = "Ngân hàng";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();

		// load lib validation
		$this->load->library('form_validation');
		$this->load->model('bank_model');
	}


	public function index($mess = "")
	{
		//add beardcurms second is page bank
		$this->breadcrumbs->unshift($this->__title, '/bank');

		// get action from url
		$action = $this->uri->segment(3);

		//load header
		$header = array();
		if ($action == "editbank")
		{
			$header['title'] = "Sửa thông tin ngân hàng";
			$header['content'] = "Sửa thông tin ngân hàng.";

			$this->breadcrumbs->push($header['title'], '/bank');
		}
		else
		{
			$header['title'] = $this->__title;
			$header['content'] = "Danh sách các Ngân hàng.";
		}
		$this->_loadHeader($header);
		//load menu
		$this->_loadMenu();


		$data = array();


		$data['success']  = (!empty($mess) && $mess == "success")   ? "Thêm thành công." : "";
		$data['fail']     = (!empty($mess) && $mess == "fail")      ? "Thêm thất bại."   : "";
		$data['editok']   = (!empty($mess) && $mess == "edit-ok")   ? "Sửa thành công."  : "";
		$data['deleteok'] = (!empty($mess) && $mess == "delete-ok") ? "Xóa thành công."  : "";

		$data['bank'] = $this->bank_model->get_all_data_bank_model();
		// load content
		if ($action == "editbank")
		{
			$this->editBank();
		}
		else
		{
			$this->load->view('bank/index_view',$data);
		}
		// load footer
		$this->_loadFooter();
	}

	// Ham add bank thuc hien cong viec lay du lieu tu form , chuan hoa du lieu , them du lieu vao db
	public function addBank()
	{
		if ($this->input->post())
		{
			$this->form_validation->set_rules('txtName', 'Tên ngân hàng', 'trim|required|is_unique[object_bank.name_bank]');
			if ($this->form_validation->run()) // validatedata
			{
				$nameBank = $this->input->post('txtName', TRUE);
				$nameBank = $this->security->xss_clean($nameBank);

				$data = array(
					'name_bank' => $nameBank
				);

				$addName = $this->bank_model->add_name_bank($data);
				if ($addName)
				{
					redirect(site_url('bank/index/success'));
				}
				else
				{
					redirect(site_url('bank/index/fail'));
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
	public function editBank()
	{
		$data = array();
		$id = $this->uri->segment(4);
		$mess = "";
		$mess = $this->uri->segment(5);

		if (is_numeric($id))
		{
			$data = $this->bank_model->get_data_bank_by_id($id);
			if (!empty($data))
			{
				$data['editfail'] = (!empty($mess) && $mess == "edit-fail")  ? "Sửa thất bại." : "";
				$data['nameBank'] = $data['name_bank'];
				$data['idBank']   = $data['id'];

				$this->load->view("bank/edit_view",$data);

				if ($this->input->post())
				{
					$this->form_validation->set_rules('txtName', 'Tên ngân hàng', 'trim|required');
					$this->form_validation->set_rules('hddName', 'Tên ngân hàng', 'trim|required');
					if ($this->form_validation->run()) // validatedata
					{
						$nameBank    = $this->input->post('txtName', TRUE);
						$nameBank    = $this->security->xss_clean($nameBank);
						$hddnameBank = $this->input->post('hddName', TRUE);
						$hddnameBank = $this->security->xss_clean($hddnameBank);

						if ($nameBank != $hddnameBank) // check same between name old and new name
						{
							$editName = $this->bank_model->edit_name_bank($id, $nameBank);
							if ($editName)
							{
								redirect(site_url('bank/index/edit-ok'));
							}
							else
							{
								redirect(site_url('bank/index/editbank/'.$id."/edit-fail"));
							}
							// end editname
						}
						else
						{
							redirect(site_url('bank/index/edit-ok'));
						}
						//end check hddname and name
					}
					else
					{
						$this->editBank();
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

	public function deleteBank($id = null)
	{
		if (is_numeric($id))
		{
			$deleteId = $this->bank_model->delete_data($id);
			($deleteId == TRUE) ? redirect(site_url('bank/index/delete-ok')) : redirect(site_url('bank/index/delete-fail'));
		}
		else
		{
			show_404();
		}
	}
}