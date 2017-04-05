<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Signup extends MY_Controller
{
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));

		parent::__construct();

		$this->load->model('signup_model');
		$this->load->library('form_validation');
	}

	public function index($mess = null)
	{
		$data = array();
		$data['success'] = (!empty($mess) && $mess == "success") ? "Đăng ký thành công" : "";
		$data['error']   = (!empty($mess) && $mess == "error")   ? "Đăng ký thất bại" : "";
		$data['fail']    = (!empty($mess) && $mess == "fail")    ? $this->session->userdata('error') : [];
		$data['failimg'] = (!empty($mess) && $mess == "fail-img") ? $this->session->userdata('error_img') : "";

		$data['title'] = "Đăng ký";
		$data['content'] = "Đây là trang đăng ký.";
		$this->load->view('signup/index_view',$data);
	}

	public function addAccountAdmin()
	{
		if ($this->input->post())
		{
			$this->form_validation->set_rules('txtUserName', 'Tên tài khoản', 'trim|required|min_length[3]|is_unique[user.username]',
				array( //set message of form_validation
				'trim'        => "Xóa trắng",
				'required'    => "Tên tài khoản không được để trống",
				'min_length'  => "Tên tài khoản phải từ 6 ký tự",
				'is_unique'   => "Tên tài khoản đã tồn tại"
			));
			$this->form_validation->set_rules('txtPassword', 'Mật khẩu', 'trim|required|min_length[6]',
				array(
				'trim'        => "Xóa trắng",
				'required'    => "Mật khẩu không được để trống",
				'min_length'  => "Mật khẩu phải phải từ 6 ký tự",
			));
			$this->form_validation->set_rules('txtRePass', 'Mật khẩu nhập lại', 'trim|required|min_length[6]',
				array(
				'trim'        => "Xóa trắng",
				'required'    => "Mật khẩu nhập lại không được để trống",
				'min_length'  => "Mật khẩu nhập lại phải phải từ 6 ký tự",
			));
			$this->form_validation->set_rules('txtEmail', 'Email', 'trim|required|valid_email',
				array(
				'trim'        => "Xóa trắng",
				'required'    => "Email không được để trống",
				'valid_email' => "Email không đúng định dạng",
			));
			$this->form_validation->set_rules('txtBirthday', 'Ngày sinh', 'trim|required',
				array(
				'trim'        => "Xóa trắng",
				'required'    => "Ngày sinh không được để trống",
			));
			$this->form_validation->set_rules('txtRole', 'Level', 'trim|required|integer',
				array(
				'trim'        => "Xóa trắng",
				'required'    => "Level không được để trống",
				'integer'     => "Level phải là số",
			));
			$this->form_validation->set_rules('txtPhone', 'Số điện thoại', 'callback_check_phone');
			// get name img
			$config['upload_path'] = '../uploads/imgAdmin';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1024';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
			$nameImg = "";
			if ( ! $this->upload->do_upload('txtAvatar'))
			{
				$this->session->set_userdata('error_img', $this->upload->display_errors());
				redirect(site_url('signup/index/fail-img'));
				die();
			}
			else
			{
				$data['image'] = $this->upload->data();
				$nameImg = $data['image']['file_name'];
			}
			// get data from form
			if ($this->form_validation->run())
			{
				$username = $this->input->post('txtUserName',TRUE);
				$username = $this->security->xss_clean($username);
				$password = $this->input->post('txtPassword',TRUE);
				$password = $this->security->xss_clean($password);
				$repass   = $this->input->post('txtRePass',TRUE);
				$repass   = $this->security->xss_clean($repass);
				$email    = $this->input->post('txtEmail',TRUE);
				$email    = $this->security->xss_clean($email);
				$birthday = $this->input->post('txtBirthday',TRUE);
				$birthday = $this->security->xss_clean($birthday);
				$phone    = $this->input->post('txtPhone',TRUE);
				$phone    = $this->security->xss_clean($phone);
				$role     = $this->input->post('txtRole',TRUE);
				$role     = $this->security->xss_clean($role);

	            $flag = TRUE;
	            $errorCheck = $this->__validateData($password, $repass, $birthday, $role);
	            foreach ($errorCheck as $key => $val)
	            {
	            	if (!empty($val))
	            	{
	            		$flag = FALSE;
	            		break;
	            	}
	            }

				$data = array(
					"username" => $username,
					"phone" => $phone,
					"email" => $email,
					"password" => md5($password),
					"avatar" => $nameImg,
					"role" => $role,
					"status" => 1,
					"birthday" => $birthday,
					"created_date" => date("Y-m-d H:i:s",strtotime("+7hours")),
					"modify_date" => ""
				);
				if ($flag)
				{
					$this->session->unset_userdata('error');

					$addAdmin = $this->signup_model->add_admin($data);
					($addAdmin) ? redirect(site_url('signup/index/success')) : redirect(site_url('signup/index/error'));
				}
				else
				{
					$this->session->set_userdata('error', $errorCheck);

					redirect(site_url('signup/index/fail'));
				}
			}
			else
			{
				$this->index();
			}
			// end form validation
		}
	}

	public function check_phone($phone = "")
	{
		$check = preg_match("/^[0][9]\d{8}$|^[0][1]\d{9}$/",$phone) ? TRUE : FALSE;

		if (!$check)
		{
			$this->form_validation->set_message('check_phone', '{field} không đúng định dạng của Việt Nam');
            return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	private function __validateData($password, $repass, $birthday, $role)
	{
		$errors = array();
		$errors['failpass']  = ($password != $repass) ? "Mật khẩu nhập lại không đúng" : "";
		$errors['failbirth'] = (strtotime($birthday) > strtotime("2000-01-01")) ? "Ngày sinh phải trước năm 2000" : "";
		$errors['failrole']  = ($role == 1 || $role == 2 || $role == 3) ? "" : "Quyền chọn không đúng";

		return $errors;
	}
}
