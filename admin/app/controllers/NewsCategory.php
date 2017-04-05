<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Creater : Long
* create time: 5-3-2017
*/
class NewsCategory extends MY_Controller
{
	private $__title = "Thể loại tin";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();

		// load lib validation
		$this->load->library(array('form_validation'));
		$this->load->model('newscategory_model');
	}


	public function index($mess = "")
	{
		// unshift crumb
		$this->breadcrumbs->unshift($this->__title, '/newscategory');


		// get action from url
		$action = $this->uri->segment(3);

		//load header
		$header = array();
		if ($action == "editnewscate")
		{
			$header['title'] = "Sửa thông tin Loại tin";
			$header['content'] = "Sửa thông tin Loại tin.";

			$this->breadcrumbs->push($header['title'], '/newscategory');
		}
		else
		{
			$header['title'] = $this->__title;
			$header['content'] = "Danh sách các Loại tin.";
		}
		$this->_loadHeader($header);
		//load menu
		$this->_loadMenu();


		$data = array();

		$data['success']  = (!empty($mess) && $mess == "success")   ? "Thêm thành công." : "";
		$data['fail']     = (!empty($mess) && $mess == "fail")      ? "Thêm thất bại."   : "";
		$data['editok']   = (!empty($mess) && $mess == "edit-ok")   ? "Sửa thành công."  : "";
		$data['deleteok'] = (!empty($mess) && $mess == "delete-ok") ? "Xóa thành công."  : "";

		$data['newscate'] = $this->newscategory_model->get_all_data_news_cate_model();
		// load content
		if ($action == "editnewscate")
		{
			$this->editNewsCate();
		}
		else
		{
			$this->load->view('newscategory/index_view',$data);
		}
		// load footer
		$this->_loadFooter();
	}

	// Ham add area thuc hien cong viec lay du lieu tu form , chuan hoa du lieu , them du lieu vao db
	public function addNewCate()
	{
		if ($this->input->post())
		{
			$this->form_validation->set_rules('txtName', 'Tên khu vực', 'trim|required|is_unique[news_category.name_category]');
			if ($this->form_validation->run()) // validatedata
			{
				$nameNewsCate = $this->input->post('txtName', TRUE);
				$nameNewsCate = $this->security->xss_clean($nameNewsCate);

				$data = array(
					'name_category' => $nameNewsCate
				);

				$addName = $this->newscategory_model->add_name_news_cate($data);
				if ($addName)
				{
					redirect(site_url('newscategory/index/success'));
				}
				else
				{
					redirect(site_url('newscategory/index/fail'));
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
	public function editNewsCate()
	{
		$data = array();
		$id = $this->uri->segment(4);
		$mess = "";
		$mess = $this->uri->segment(5);

		if (is_numeric($id))
		{
			$data = $this->newscategory_model->get_data_news_cate_by_id($id);
			if (!empty($data))
			{
				$data['editfail'] = (!empty($mess) && $mess == "edit-fail")  ? "Sửa thất bại." : "";
				$data['nameNewsCate'] = $data['name_category'];
				$data['idNewsCate']   = $data['id_cate'];

				$this->load->view("newscategory/edit_view",$data);

				if ($this->input->post())
				{
					$this->form_validation->set_rules('txtName', 'Tên thể loại tin', 'trim|required');
					$this->form_validation->set_rules('hddName', 'Tên thể loại tin', 'trim|required');
					if ($this->form_validation->run()) // validatedata
					{
						$nameNewsCate    = $this->input->post('txtName', TRUE);
						$nameNewsCate    = $this->security->xss_clean($nameNewsCate);
						$hddNewCate = $this->input->post('hddName', TRUE);
						$hddNewCate = $this->security->xss_clean($hddNewCate);

						if ($nameNewsCate != $hddNewCate) // check same between name old and new name
						{
							$editName = $this->newscategory_model->edit_name_news_cate($id, $nameNewsCate);
							if ($editName)
							{
								redirect(site_url('newscategory/index/edit-ok'));
							}
							else
							{
								redirect(site_url('newscategory/index/editnewscate/'.$id."/edit-fail"));
							}
							// end editname
						}
						else
						{
							redirect(site_url('newscategory/index/edit-ok'));
						}
						//end check hddname and name
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

	public function deleteNewsCate($id = null)
	{
		if (is_numeric($id))
		{
			$deleteId = $this->newscategory_model->delete_data($id);

			($deleteId == TRUE) ? redirect(site_url('newscategory/index/delete-ok')) : redirect(site_url('newscategory/index/delete-fail'));
		}
		else
		{
			show_404();
		}
	}
}