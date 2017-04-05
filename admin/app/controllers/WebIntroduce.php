<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class WebIntroduce extends MY_Controller
{
	private $__title   = "Giới thiệu trang web";
	private $__content = "Thông tin giới thiệu trang web";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();
		$this->load->model('webintroduce_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array();
		$this->breadcrumbs->unshift($this->__title, '/webintroduce');
		$action = (!empty($this->uri->segment(3))) ? $this->uri->segment(3) : 'index';

		$id     = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);
		$data['webIntroId'] = $this->webintroduce_model->get_all_data_intro_by_id($id);

		//load header
		$header = array();

		if ($action == "view-content")
		{
			$this->breadcrumbs->push($data['webIntroId']['title'], '/webintroduce');
			$this->breadcrumbs->push("Thông tin chi tiết", '/webintroduce/view-content');

			$header['title'] = "Thông tin chi tiết";
			$header['content'] = "Thông tin chi tiết";
		}
		elseif ($action == "create")
		{
			$this->breadcrumbs->push("Thêm thông tin giới thiệu", '/webintroduce/create');

			$header['title']   = "Thêm thông tin giới thiệu";
			$header['content'] = "Thêm thông tin giới thiệu";
		}
		elseif ($action == "update")
		{
			$this->breadcrumbs->push($data['webIntroId']['title'], '/webintroduce/index/view-content/'.$id);
			$this->breadcrumbs->push("Sửa thông tin", '/webintroduce');
			$header['title']   = "Sửa thông tin giới thiệu";
			$header['content'] = "Sửa thông tin giới thiệu";
		}
		else
		{
			$header['title'] = $this->__title;
			$header['content'] = $this->__content;
		}
		$this->_loadHeader($header);
		//load menu
		$this->_loadMenu();
		//load content
		$data['webIntro'] = $this->webintroduce_model->get_all_data_intro();

		$mess = isset($_GET['mess']) ? $_GET['mess'] : "";
		$data['addSuccess'] = (!empty($mess) && $mess == "add-success") ? "Thêm thành công" : "";
		$data['deleteSuccess'] = (!empty($mess) && $mess == "delete-success") ? "Xóa thành công" : "";
		$data['editSuccess'] = (!empty($mess) && $mess == "edit-success") ? "Xóa thành công" : "";

		switch ($action) {
			case "view-content":
				$this->viewContent();
				break;

			case "create":
				$this->load->view('webintroduce/add_view',$data);
				break;

			case "update":
				$this->load->view('webintroduce/edit_view',$data);
				break;

			case "index":
				$this->load->view('webintroduce/index_view',$data);
				break;

			default:
				$this->load->view('webintroduce/index_view',$data);
				break;
		}
		//load footer
		$this->_loadFooter();
	}

	public function viewContent()
	{
		$id = $this->uri->segment(4);
		if (is_numeric($id))
		{
			$dataInfo = $this->webintroduce_model->get_all_data_intro_by_id($id);
			$this->breadcrumbs->push("abc", '/webintroduce');
			$this->load->view('webintroduce/info_view',$dataInfo);
		}
		else
		{
			show_404();
		}
	}

	public function addIntro()
	{
		if ($this->input->post())
		{
			$title  = $this->input->post('txtTitle');
			$title  = $this->security->xss_clean($title);
			$title  = htmlentities($title);
			$desc   = $this->input->post('txtDescript');
			$desc   = $this->security->xss_clean($desc);
			$desc   = htmlentities($desc);
			$status = $this->input->post('txtStatus');
			$status = $this->security->xss_clean($status);
			$author = $this->input->post('txtAuthor');
			$author = $this->security->xss_clean($author);

			$data = array(
				'title'        => $title,
				'description'  => $desc,
				'status'       => $status,
				'author'       => $author,
				'posting_date' => date('Y-m-d H:i:s'),
				'modify_date'  => ""
			);
			$addData = $this->webintroduce_model->add_data_intro($data);
			($addData) ? redirect(site_url('webintroduce/index?mess=add-success')) : redirect(site_url('webintroduce/index/create?mess=add-fail'));
		}
	}

	public function updateIntro()
	{
		$id     = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);
		if (is_numeric($id))
		{
			$title  = $this->input->post('txtTitle');
			$title  = $this->security->xss_clean($title) ;
			$desc   = $this->input->post('txtDescript');
			$desc   = $this->security->xss_clean($desc);
			$status = $this->input->post('txtStatus');
			$status = $this->security->xss_clean($status);
			$author = $this->input->post('txtAuthor');
			$author = $this->security->xss_clean($author);
			$title  = htmlentities($title);
			$desc   = htmlentities($desc);

			$data = array(
				'title'        => $title,
				'description'  => $desc,
				'status'       => $status,
				'author'       => $author,
				'modify_date'  => date('Y-m-d H:i:s')
			);
			$addData = $this->webintroduce_model->add_data_intro($data,$id);
			($addData) ? redirect(site_url('webintroduce/index?mess=edit-success')) : redirect(site_url('webintroduce/index/update?mess=edit-fail'));
		}
		else
		{
			show_404();
		}
		if ($this->input->post())
		{
		}
	}

	public function deleteIntro()
	{
		$id = $this->uri->segment(3);
		if (is_numeric($id))
		{
			$delete = $this->webintroduce_model->delete_data_intro($id);
			($delete) ? redirect(site_url('webintroduce?mess=delete-success')) : redirect(site_url('webintroduce?mess=fail'));
		}
		else
		{
			show_404();
		}
	}
}
