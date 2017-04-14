<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Signup extends MY_Controller
{
	private $__title = "Đăng ký";
	private $__content = "Đăng ký";
	private $__tableNameSignup = "member";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();
		$this->load->model('signup_model');
		$this->load->library(array('form_validation', "myencryption"));
	}

	public function index()
	{
		//load header
		$header = array();
		$header['title'] = $this->__title;
		$header['content'] = $this->__content;
		$this->_loadHeader($header);

		//load content
		$data = array();
		$mess = $this->uri->segment(2);
		$data['ok'] = (!empty($mess) && $mess == "ok") ? "Đăng ký tài khoản thành công. Vui lòng kiểm email để kích hoạt tài khoản." : "";
		$data['fail'] = (!empty($mess) && ($mess == "fail" || $mess == "err")) ? "Có lỗi xảy ra" : "";
		$this->load->view('signup/index_view', $data);
		//load footer
		$this->_loadFooter();
	}

	function actionSignup()
	{
		if ($this->input->post())
		{
			$rule = [
				'required' => "{field} không được để trống",
				'min_length' => "{field} nhập không hợp lệ",
				'matches' => "{field} không đúng",
				'valid_email' => "{field} không hợp lệ",
				'is_unique' => "{field} đã tồn tại",
			];
			$this->form_validation->set_rules('txtFullname', 'Họ Tên', 'trim|required|min_length[3]', $rule);
			$this->form_validation->set_rules('txtUsername', 'Tên tài khoản', 'trim|required|min_length[3]|is_unique[member.username]', $rule);
			$this->form_validation->set_rules('txtPassword', 'Mật khẩu', 'trim|required|min_length[6]', $rule);
			$this->form_validation->set_rules('txtRepass', 'Mật khẩu nhập lại', 'trim|required|min_length[6]|matches[txtPassword]',$rule);
			$this->form_validation->set_rules('txtEmail', 'Email', 'trim|required|valid_email|is_unique[member.email]', $rule);
			$this->form_validation->set_rules('txtFace', 'Facebook', 'trim|required', $rule);
			$this->form_validation->set_rules('txtSkype', 'Skype', 'trim|required', $rule);
			$this->form_validation->set_rules('txtPhone', 'Số điện thoại', 'trim|required|callback_check_phone', $rule);
			$this->form_validation->set_rules('txtAddress', 'Địa chỉ', 'trim|required', $rule);
			if ($this->form_validation->run())
			{
				$nameImg = "";
				$config['upload_path'] = 'uploads/imgMembers';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '1024';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('txtFile')){
					$error = $this->upload->display_errors();
				}
				else{
					$data = $this->upload->data();
					$nameImg = $data['file_name'];
				}

				$username = $this->input->post('txtUsername', TRUE);
				$username = $this->security->xss_clean($username);
				$fullname = $this->input->post('txtFullname', TRUE);
				$password = $this->input->post('txtPassword', TRUE);
				$rePass   = $this->input->post('txtRepass', TRUE);
				$email    = $this->input->post('txtEmail', TRUE);
				$phone    = $this->input->post('txtPhone', TRUE);
				$facebook = $this->input->post('txtFace', TRUE);
				$skype    = $this->input->post('txtSkype', TRUE);
				$address  = $this->input->post('txtAddress', TRUE);

				$authenkey = $this->myencryption->encode(date("y-m-d H:i:s", strtotime("+3days")));
				$data = array(
					"username"    => $username,
					"email"       => $email,
					"phone"       => $phone,
					"password"    => md5($rePass),
					"full_name"   => $fullname,
					"avatar"      => $nameImg,
					"address"     => $address,
					"authen_key"  => $authenkey,
					"is_active"    => 0,
					"nick_fb"     => $facebook,
					"nick_skype"  => $skype,
					"member_type" => 0,
					"create_date" => date("Y-m-d H:i:s"),
					"update_date" => 0
				);
				$addMember = $this->signup_model->add_member($data);
				if ($addMember > 0)
				{
					$subject = "<h2>Active member Account</h2>";
					$id = $this->myencryption->encode($addMember);
					$link = "<a href='".base_url()."kich-hoat-tk/{$authenkey}/{$id}'>Click vào liên kết để kích hoạt tài khoản</a><br><p>Tài khoản có hiệu lực trong 3 ngày.</p>";
					$sendMail = sendMail($email, $link);
					if ($sendMail)
					{
						redirect(site_url('dang-ky/ok'));
					}
					else
					{
						redirect(site_url('dang-ky/fail'));
					}
				}
				else
				{
					redirect(site_url('dang-ky/err'));
				}
			}
			else
			{
				$this->index();
			}
		}
	}

	public function activeMember()
	{
		$id = $this->uri->segment(3);
		$idDecode = $this->myencryption->decode($id);
		$authenkey = $this->uri->segment(2);
		$data = array(
				'id'         => $idDecode,
				'authen_key' => $authenkey
			);
		$check = $this->signup_model->get_all_data($this->__tableNameSignup, $data);
		if (!empty($check))
		{
			$authenDecode = $this->myencryption->decode($check['authen_key']);
			$data['mess'] = $authenDecode;
			if (strtotime($authenDecode) > strtotime(date("Y-m-d H:i:s")))
			{
				if ($check['is_active'] != 1)
				{
					$info = [
						'is_active' => 1,
					];
					$activeAccMember = $this->signup_model->active_acc_member($this->__tableNameSignup, $idDecode, $info);
					if ($activeAccMember)
					{
						$data['mess'] = "Kích hoạt tài khoản thành công. Bạn hãy đăng nhập vào trang web.";
					}
					else
					{
						$data['mess'] = "Có lỗi xảy ra.";
					}
				}
				else
				{
					$data['mess'] = "Tài khoản đã kích hoạt. Bạn hãy đăng nhập vào trang web.";
				}
			}
			else
			{
				$data['mess'] = "Đã hết hạn kích hoạt. Bạn vui lòng tạo tài khoản mới.";
			}
		}
		else
		{
			$data['mess'] = "Mã kích hoạt không đúng.";
			$data['mess1'] = "fail";
		}
		$this->load->view('signup/active_view', $data);
	}

	public function check_phone($phone = '')
	{
		$check = preg_match("/^[0][9]\d{8}$|^[0][1]\d{9}$/", $phone) ? TRUE : FALSE;
		if (!$check)
		{
			$this->form_validation->set_message('check_phone', '{field} nhập không đúng định dạng');
			return FALSE;
		}
		return TRUE;
	}
}