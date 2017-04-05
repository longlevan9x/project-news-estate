<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Creater : Long
* create time: 6-3-2017
*/
class InfoMember extends MY_Controller
{
	private $__title    = "Thông tin tài khoản Member";
	private $__content  = "Tài khoản Member";
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();
		$this->load->model("infomember_model");
		$this->load->library("form_validation");
	}

	public function index($mess = "")
	{
		$this->breadcrumbs->unshift($this->__title,"/infomember/index");

		$id = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);

		$action = $this->uri->segment(3);
		// loadheader
		$header = array();
		if ($action == "view-info")
		{
			$header['title'] = 'Thông tin chi tiết';
			$header['content'] = 'Thông tin chi tiết';
			$this->breadcrumbs->push($header['title'], "/infomember/index/view-info/" . $id);
		}
		elseif ($action == "edit-info")
		{
			$header['title'] = 'Thay đổi thông tin tài khoản';
			$header['content'] = 'Thay đổi thông tin tài khoản';
			$this->breadcrumbs->push($header['title'], "/infomember/index/edit-info/" . $id);
		}
		else
		{
			$header['title'] = $this->__title;
			$header['content'] = "Thông tin tài khoản admin";
		}

		$this->_loadHeader($header);

		// loadmenu
		$this->_loadMenu();
		//load content
		$data = array();

		$mess = isset($_GET['mess']) ? $_GET['mess'] : "";

		$data['editsuccess'] = (!empty($mess) && $mess == 'success')   ? "Sửa thành công" : '';
		$data['deleteok']    = (!empty($mess) && $mess == 'delete-ok') ? "Xóa thành công" : '';
		$data['deletefail']  = (!empty($mess) && $mess == 'delete-fail') ? "Có lỗi xảy ra" : '';
		$data['admin'] = $this->infomember_model->get_all_data_admin();

		if ($action == "view-info")
		{
			$this->viewInfo();
		}
		elseif ($action == "edit-info")
		{
			$this->editInfo();
		}
		elseif ($action == "action-edit-info")
		{
			$this->actionEditInfo();
		}
		else
		{
			$this->load->view('infomember/index_view', $data);
		}

		//load footet
		$this->_loadFooter();
	}

	public function viewInfo()
	{
		$id = $this->uri->segment(4);
		if (!empty($id) && is_numeric($id))
		{
			$data = array();
			$data = $this->infomember_model->get_data_info_admin_by_id($id);
			$this->load->view("infomember/info_view.php", $data);
		}
		else
		{
			show_404();
		}
	}

	public function editInfo()
	{
		$id = $this->uri->segment(4);
		$mess = (!empty($this->uri->segment(5))) ? $this->uri->segment(5) : "";
		if (!empty($id) && is_numeric($id))
		{
			$data = array();
			$data = $this->infomember_model->get_data_info_admin_by_id($id);
			$mess = isset($_GET['mess']) ? $_GET['mess'] : "";
			$data['editerror'] = (!empty($mess) && $mess == "error") ? "Sửa thất bại" : '';
			$data['fail']      = (!empty($mess) && $mess == "fail") ? $this->session->userdata('error') : [];
			$this->load->view("infomember/edit_view.php", $data);
		}
		else
		{
			show_404();
		}
	}

	public function actionEditInfo()
	{
		$id = $this->uri->segment(4);
		if (!empty($id) && is_numeric($id))
		{
			if ($this->input->post())
			{
				$rule = [
					'trim'        => "{field} xóa trắng",
					'required'    => "{field} không được để trống",
					'min_length'  => "{field} phải từ 6 ký tự",
					'valid_email' => "{field} không đúng định dạng",
					'integer'     => "{field} phải là số",
					'greater_than' => "{field} phải lớn hơn 0",
				];
				$this->form_validation->set_rules('txtUserName', 'Tên tài khoản','trim|required|min_length[6]',
				$rule);
				$this->form_validation->set_rules('txtEmail', 'Email', 'trim|required|valid_email', $rule);
				$this->form_validation->set_rules('txtBirthday', 'Ngày sinh', 'trim|required', $rule);
				$this->form_validation->set_rules('txtRole', 'Level', 'trim|required|integer', $rule);
				$this->form_validation->set_rules('txtStatus', 'Trạng thái', 'trim|required|integer|greater_than[0]', $rule);
				$this->form_validation->set_rules('txtPhone', 'Số điện thoại', 'callback_check_phone');

				if ($this->form_validation->run())
				{
					$username = $this->input->post('txtUserName',TRUE);
					$username = $this->security->xss_clean($username);
					$email    = $this->input->post('txtEmail',TRUE);
					$email    = $this->security->xss_clean($email);
					$birthday = $this->input->post('txtBirthday',TRUE);
					$birthday = $this->security->xss_clean($birthday);
					$phone    = $this->input->post('txtPhone',TRUE);
					$phone    = $this->security->xss_clean($phone);
					$role     = $this->input->post('txtRole',TRUE);
					$role     = $this->security->xss_clean($role);
					$hddImg   = $this->input->post('txthdAvatar',TRUE);
					$hddImg   = $this->security->xss_clean($hddImg);

					// get name img
					$config['upload_path'] = '../uploads/imgAdmin';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = '1024';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';

					$this->load->library('upload', $config);
					$nameImg = "";
					if ( !$this->upload->do_upload('txtAvatar'))
					{
						$nameImg = $hddImg;
					}
					else
					{
						$data['image'] = $this->upload->data();
						$nameImg = $data['image']['file_name'];
					}

					$flag = TRUE;
		            $errorCheck = $this->__validateData($birthday, $role);
		            foreach ($errorCheck as $key => $val)
		            {
		            	if (!empty($val)) $flag = FALSE;
		            		break;
		            }

					$data = array(
						"phone" => $phone,
						"email" => $email,
						"avatar" => $nameImg,
						"role" => $role,
						"status" => 1,
						"birthday" => $birthday,
						"modify_date" => date("Y-m-d H:i:s",strtotime("+7hours"))
					);
					if ($flag)
					{
						$this->session->unset_userdata('error');
						$editAdmin = $this->infomember_model->edit_admin($data, $username);
						($editAdmin) ? redirect(site_url('infomember/index?mess=success')) : redirect(site_url('infomember/index/edit-info/'.$id ."/?mess=error"));
					}
					else
					{
						$this->session->set_userdata('error', $errorCheck);
						redirect(site_url('infomember/index/edit-info/'.$id ."?mess=fail"));
					}
				}
				else
				{
					$this->editInfo();
				}//end validation
			}
		}
		else
		{
			show_404();
		}
	}

	public function deleteInfo($id = null)
	{
		if (is_numeric($id))
		{
			$deleteData = $this->infomember_model->delete_info($id);

			($deleteData == TRUE) ? redirect(site_url('infomember/index?mess=delete-ok')) : redirect(site_url('infomember/index?mess=delete-fail'));
		}
		else
		{
			show_404();
		}
	}

	private function __validateData($birthday, $role)
	{
		$errors = array();
		$errors['failbirth'] = (strtotime($birthday) > strtotime("2000-01-01")) ? "Ngày sinh phải trước năm 2000" : "";
		$errors['failrole']  = ($role == 1 || $role == 2 || $role == 3) ? "" : "Quyền chọn không đúng";

		return $errors;
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
}