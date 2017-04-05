<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Login extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->_className = trim(strtolower(__CLASS__));
		$this->load->model('login_model');
		$this->load->library("form_validation");
		// if (!$this->_checkLoginAdmin()) {
		// 	redirect(site_url('dashboard'));
		// }

	}

	public function index($mess = null)
	{
		$data = array();
		$data['mess']    = (!empty($mess) && $mess == "fail") ? "Tài khoản hoặc mật khẩu không đúng." : "";
		$data['title']   = "Đăng nhập";
		$data['content'] = "Đây là trang đăng nhập.";
		$this->load->view('login/index_view',$data);
	}

	public function actionLogin()
	{
		if ($this->input->post())
		{
			$this->form_validation->set_rules('txtTenTaiKhoan', 'Tên đăng nhập', 'trim|required|min_length[3]',array(
					"trim" => "Xóa trắng",
					"required" => "Tên tài khoản không được để trống",
					"min_length" => "Tài khoản phải từ 3 ký tự trở lên",
				));
			$this->form_validation->set_rules('txtMatKhau', 'Mật khẩu', 'trim|required|min_length[6]',array(
					"trim" => "Xóa trắng",
					"required" => "Mật khẩu không được để trống",
					"min_length" => "Mật khẩu phải từ 6 ký tự trở lên",
				));
			if ($this->form_validation->run())
			{
				$username = $this->input->post("txtTenTaiKhoan",TRUE);
				$username = $this->security->xss_clean($username);
				$password = $this->input->post("txtMatKhau",TRUE);
				$password = $this->security->xss_clean($password);

				$checkLogin = $this->login_model->check_login($username, md5($password));

				if (!empty($checkLogin))
				{
					$this->session->set_userdata("adm_username", $checkLogin['username']);
					$this->session->set_userdata("adm_email", $checkLogin['email']);// gan gia tri cho session
					$this->session->set_userdata("adm_phone", $checkLogin['phone']);
					$this->session->set_userdata("adm_role", $checkLogin['role']);
					$this->session->set_userdata("adm_status", $checkLogin['status']);
					redirect(site_url('dashboard/index'));
				}
				else
				{
					redirect(site_url('login/index/fail'));
				}
				// end login
			}
			else
			{
				$this->index();
			}
			// end validation form
		}
	}
}