<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Login extends MY_Controller
{
	private $__tableNameMem = "member";

	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();

		$this->load->model('login_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		//load header
		$header = array();
		$header['title'] = "Đăng nhập";
		$header['content'] = "Đăng nhập";
		$this->_loadHeader($header);

		//loac content
		$this->load->view('login/index_view');
		// load footer
		$this->_loadFooter();
	}

	public function getInfo()
	{
		if ($this->input->is_ajax_request())
		{
			$username = $this->input->post('username');
			$username = $this->security->xss_clean($username);
			$password = $this->input->post('password');
			$password = $this->security->xss_clean($password);

			if (empty($password) || empty($username))
			{
				echo "empty";
			}
			else
			{
				$infoData = [
					'username' => $username,
					'password' => md5($password)
				];

				$info = $this->login_model->get_info_member($this->__tableNameMem, $infoData);
				if (!empty($info))
				{
					$arrSession = array(
						'mem_id'       => $info['id'],
						'mem_username' => $info['username'],
						'mem_email'    => $info['email'],
						'mem_fullname' => $info['full_name'],
						'mem_phone'    => $info['phone'],
						'mem_address'  => $info['address'],
						'mem_avatar'   => $info['avatar'],
						'mem_facebook' => $info['nick_fb'],
						'mem_skype'    => $info['nick_skype'],
					);
					$this->session->set_userdata($arrSession);
					echo "ok";
				}
				else
				{
					echo "fail";
				}
			}
		}
	}

	public function getUsername()
	{
		if ($this->input->is_ajax_request())
		{
			$username = $this->input->post('username');
			$username = $this->security->xss_clean($username);

			if (empty($username))
			{
				echo "empty";
			}
			else
			{
				$infoData = [
					'username' => $username
				];

				$info = $this->login_model->get_info_member($this->__tableNameMem, $infoData);
				if (!empty($info))
				{
					echo "ok";
				}
				else
				{
					echo "fail";
				}
			}
		}
	}

	public function getPassword()
	{
		if ($this->input->is_ajax_request())
		{
			$username = $this->input->post('username');
			$username = $this->security->xss_clean($username);
			$password = $this->input->post('password');
			$password = $this->security->xss_clean($password);

			if (empty($password))
			{
				echo "empty";
			}
			else
			{
				$infoData = [
					'username' => $username,
					'password' => md5($password)
				];

				$info = $this->login_model->get_info_member($this->__tableNameMem, $infoData);
				if (!empty($info))
				{
					echo "ok";
				}
				else
				{
					echo "fail";
				}
			}
		}
	}
}