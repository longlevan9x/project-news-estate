<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class PostingNews extends MY_Controller
{
	private $__rule = array(
		'trim' => "{field} xóa trắng",
		'required' => "{field} không được để trống",
		'integer'  => "{field} chọn không đúng",
		'numeric'  => "{field} nhập không đúng",
		'integer'  => "{field} chọn không đúng",
		'integer'  => "{field} chọn không đúng",
		'less_than'    => "{field} chọn không đúng lớn hơn",
		'greater_than' => "{field} chọn không đúng nhỏ hơn",
	);

	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();

		$this->load->model('postingnews_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$action = $this->uri->segment(1);
		//load header
		$header = array();

		switch ($action)
		{
			case 'dang-tin':
				$header['title'] = "Đăng tin";
				$header['content'] = "Đăng tin";
				break;

			case 'sua-tin':
				$header['title'] = "Sửa tin";
				$header['content'] = "Sửa tin";
				break;

			case 'danh-sach-tin':
				$header['title'] = "Danh sách tin";
				$header['content'] = "Danh sách tin";
				break;

			case 'chi-tiet-tin':
				$header['title'] = "Chi tiết tin";
				$header['content'] = "Chi tiết tin";
				break;
		}
		$this->_loadHeader($header);

		//loac content
		$data = array();
		$mess = $this->input->get('mess');
		$data['success'] = (isset($mess) && $mess == "success") ? 'Đăng tin thành công. Bài đăng của bạn sẽ sớm được đăng lên.' : '';

		$data['failgallery']    = (isset($mess) && $mess == "fail-gallery") ? 'Đăng ảnh thất bại.' : '';
		$data['failimg'] = '';
		$data['city'] = $this->postingnews_model->get_all_data($this->_tableNameCity);
		$data['direction'] = $this->postingnews_model->get_all_data($this->_tableNameDirect);
		$data['newsCate'] = $this->postingnews_model->get_all_data($this->_tableNameNews_cate);


		$url    = $this->uri->segment(2);
		$arrUrl = explode('-', $url);
		$id     = end($arrUrl);
		$slug = str_replace("-".$id, "", $url);

		$data['info'] = $this->postingnews_model->get_data_estate_by_id($this->_tableNameEstate,['andWhere' => ['id_estate' => $id, 'slug' => $slug]]);
		switch ($action)
		{
			case 'dang-tin':
				$this->load->view('postingnews/index_view',$data);
				break;

			case 'sua-tin':
				$this->editNews($data);
				break;

			case 'danh-sach-tin':
				$this->viewNews();
				break;

			case 'chi-tiet-tin':
				$this->detailView($data);
				break;
		}
		// load footer
		$this->_loadFooter();
	}

	public function detailView($data)
	{
		$mess = $this->input->get('mess');
		$data['success'] = (isset($mess) && !empty($mess) && $mess == "success") ? "Sửa thành công" : '';
		$this->load->view('postingnews/info_detail_view', $data);
	}
	public function viewNews()
	{
		$data['estate'] = $this->postingnews_model->get_all_data_estate($this->_tableNameEstate,
			array(
				'andWhere' => array(
					'poster_id' => $this->_getSessionId(),
				)
			));
		$this->load->view('postingnews/info_view', $data);
	}

	public function deleteNews()
	{
		$url    = $this->uri->segment(3);
		$arrUrl = explode('-', $url);
		$id     = end($arrUrl);
		$slug = str_replace("-".$id, "", $url);

		if (is_numeric($id))
		{
			$info = $this->postingnews_model->get_one_data($this->_tableNameEstate,['slug' => $slug, 'id_estate' => $id]);
			if (!empty($info))
			{
				$deleteInfo = $this->postingnews_model->delete_data($this->_tableNameEstate,array('id_estate' => $id));

				if ($deleteInfo)
				{
					redirect(site_url('danh-sach-tin/delete-ok'));
				}
				else
				{
					redirect(site_url('danh-sach-tin/delete-fail'));
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_404();
		}
	}

	/**
	 * Function actionPosting is used to check the data and post it to the webpage
	 */
	public function actionPosting()
	{
		$data = array();
		if ($this->input->post())
		{
			$setRules = array(
					array(
						'field'  => 'txtArea',
						'label'  => 'Khu vực',
						'rules'  => 'trim|required|integer',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtCity',
						'label'  => 'Thành phố',
						'rules'  => 'trim|required|integer',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtDist',
						'label'  => 'Quận/Huyện',
						'rules'  => 'trim|required|integer',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtDirect',
						'label'  => 'Hướng',
						'rules'  => 'trim|required|integer',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtTitle',
						'label'  => 'Tiêu đề',
						'rules'  => 'trim|required',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtAcreage',
						'label'  => 'Diện tích',
						'rules'  => 'trim|required|numeric',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtGara',
						'label'  => 'Nhà xe',
						'rules'  => 'trim|required|greater_than[0]|less_than[11]',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtKitchen',
						'label'  => 'Phòng bếp',
						'rules'  => 'trim|required|greater_than[0]|less_than[11]',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtBedroom',
						'label'  => 'Phòng ngủ',
						'rules'  => 'trim|required|greater_than[0]|less_than[11]',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtLiving',
						'label'  => 'Phòng khách',
						'rules'  => 'trim|required|greater_than[0]|less_than[11]',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtBargain',
						'label'  => 'Thương lượng',
						'rules'  => 'trim|required|greater_than[0]|less_than[3]',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtNewsCate',
						'label'  => 'Loại tin',
						'rules'  => 'trim|required|greater_than[0]|less_than[5]',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtTypeEstate',
						'label'  => 'Loại bật động sản',
						'rules'  => 'trim|required|integer',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtLocation',
						'label'  => 'Vị trí cụ thể',
						'rules'  => 'trim|required',
						'errors' => $this->__rule
					),
					array(
						'field'  => 'txtDescrip',
						'label'  => 'Thông tin cơ bản',
						'rules'  => 'trim|required',
						'errors' => $this->__rule
					),
				);
			$this->form_validation->set_rules($setRules);

			if ($this->form_validation->run())
			{
				$city_id    = $this->input->post('txtCity', TRUE);
				$city_id    = $this->security->xss_clean($city_id);

				$dist_id    = $this->input->post('txtDist', TRUE);
				$dist_id    = $this->security->xss_clean($dist_id);

				$area_id    = $this->input->post('txtArea', TRUE);
				$area_id    = $this->security->xss_clean($area_id);

				$direct_id  = $this->input->post('txtDirect', TRUE);
				$direct_id  = $this->security->xss_clean($direct_id);

				$title      = $this->input->post('txtTitle', TRUE);
				$title      = $this->security->xss_clean($title);

				$acreage    = $this->input->post('txtAcreage', TRUE);
				$acreage    = $this->security->xss_clean($acreage);

				$price      = $this->input->post('txtPrice', TRUE);
				$price      = $this->security->xss_clean($price  );

				$gara       = $this->input->post('txtGara', TRUE);
				$gara       = $this->security->xss_clean($gara);

				$kitchen    = $this->input->post('txtKitchen', TRUE);
				$kitchen    = $this->security->xss_clean($kitchen);

				$bedroom    = $this->input->post('txtBedroom', TRUE);
				$bedroom    = $this->security->xss_clean($bedroom);

				$livingroom = $this->input->post('txtLiving', TRUE);
				$livingroom = $this->security->xss_clean($livingroom);

				$bargain    = $this->input->post('txtBargain', TRUE);
				$bargain    = $this->security->xss_clean($bargain);

				$newsCate   = $this->input->post('txtNewsCate', TRUE);
				$newsCate   = $this->security->xss_clean($newsCate);

				$typeEstate = $this->input->post('txtTypeEstate', TRUE);
				$typeEstate = $this->security->xss_clean($typeEstate);

				$location   = $this->input->post('txtLocation', TRUE);
				$location   = $this->security->xss_clean($location);

				$descript   = $this->input->post('txtDescrip', TRUE);
				$descript   = $this->security->xss_clean($descript);

				$expiration_at = $this->input->post('txtExp', TRUE);
				$expiration_at = $this->security->xss_clean($expiration_at);

				// get image
				$nameImg  = "";
				$config['upload_path'] = 'uploads/imgEstate/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = 1024;
				$config['max_width']  = 2000;
				$config['max_height']  = 2000;

				$this->load->library('upload', $config);

				if ( !$this->upload->do_upload('txtFile')){
					$this->session->set_userdata('error_img', $this->upload->display_errors());
					redirect(site_url('postingnews/index?mess=fail-img'));
					die();
				}
				else{
					$data['image'] = $this->upload->data();
					$nameImg = $data['image']['file_name'];
				}

				$data = array(
					'poster_id'        => $this->session->userdata('mem_id'),
					"city_id"          => $city_id,
					"district_id"      => $dist_id,
					"area_id"          => $area_id,
					"direction_id"     => $direct_id,
					"news_cate_id"     => $newsCate,
					"real_estate_type" => $typeEstate,
					"slug"             => vn2latin($title),
					'status'           => 1,
					"title"            => strtoupper($title),
					"image"            => $nameImg,
					"acreage"          => $acreage,
					"price"            => $price,
					"location"         => $location,
					"garage"           => $gara,
					"kitchen"          => $kitchen,
					"bedroom"          => $bedroom,
					"livingroom"       => $livingroom,
					"bargain"          => $bargain,
					"view"             => 0,
					"description"      => $descript,
					"expiration_time"  => $expiration_at,
					"posting_date"     => date("Y-m-d H:i:s"),
					"modify_date"      => "",
				);

				$idEstate = $this->postingnews_model->add_info($this->_tableNameEstate, $data);

				if($idEstate)
				{
					$flag = FALSE;
					for ($i = 0; $i <= count($_FILES['txtFile1']['tmp_name']) - 1; $i++)
					{
						$_FILES['txtFiles']['name'] = $_FILES['txtFile1']['name'][$i];
						$_FILES['txtFiles']['type'] = $_FILES['txtFile1']['type'][$i];
						$_FILES['txtFiles']['tmp_name'] = $_FILES['txtFile1']['tmp_name'][$i];
						$_FILES['txtFiles']['error'] = $_FILES['txtFile1']['error'][$i];
						$_FILES['txtFiles']['size'] = $_FILES['txtFile1']['size'][$i];

						if ($this->upload->do_upload('txtFiles'))
						{
							$data['image1'] = $this->upload->data();
							$nameImgGallery = $data['image1']['file_name'];
						}
						else
						{
							$nameImgGallery = "no_iamge.jpg";
						}
						$gallery = [
							'name' => $nameImgGallery,
							'real_estate_id' => $idEstate,
						];

						$addImgGallery = $this->postingnews_model->add_info($this->_tableNamegallery, $gallery);

						$flag = ($addImgGallery > 0) ? TRUE : FALSE;
					}
					if ($flag)
					{
						redirect(site_url('dang-tin?mess=success'));
					}
					else
					{
						redirect(site_url('dang-tin?mess=fail-gallery'));
					}
				}
				else
				{
					redirect(site_url('dang-tin?mess=fail'));
				}
			}
			else
			{
				$this->index();
			}
		}
	}

	public function editNews($data = array())
	{
		$url    = $this->uri->segment(2);
		$arrUrl = explode('-', $url);
		$id     = end($arrUrl);
		$slug = str_replace("-".$id, "", $url);

		if (is_numeric($id))
		{
			$count = $this->postingnews_model->get_all_data($this->_tableNameEstate, ['id_estate' => $id, 'slug' => $slug]);
			if (count($count) > 0)
			{
				$mess = $this->input->get('mess');
				$data['failgallery'] = (isset($mess) && !empty($mess) && $mess == "fail-gallery") ? "Lỗi ảnh 1 hoặc ảnh 2" : '';
				$data['fail1'] = (isset($mess) && !empty($mess) && $mess == "fail1") ? "Có lỗi xảy ra" : '';
				$data['fail'] = (isset($mess) && !empty($mess) && $mess == "fail") ? "Thông tin bạn nhập không đúng" : '';

				$data['district'] = $this->postingnews_model->get_all_data($this->_tableNameDist);
				$data['area']     = $this->postingnews_model->get_all_data($this->_tableNameArea);
				$data['gallery']  = $this->postingnews_model->get_all_data($this->_tableNamegallery, ['real_estate_id' => $data['info']['id_estate']]);
				$this->load->view('postingnews/edit_view',$data);

				$this->actionEdit($id, $slug);
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_404();
		}

	}

	public function actionEdit($id, $slug)
	{
		if ($this->input->post())
		{
			$setRules = array(
				array(
					'field'  => 'txtArea',
					'label'  => 'Khu vực',
					'rules'  => 'trim|required|integer',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtCity',
					'label'  => 'Thành phố',
					'rules'  => 'trim|required|integer',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtDist',
					'label'  => 'Quận/Huyện',
					'rules'  => 'trim|required|integer',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtDirect',
					'label'  => 'Hướng',
					'rules'  => 'trim|required|integer',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtTitle',
					'label'  => 'Tiêu đề',
					'rules'  => 'trim|required',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtAcreage',
					'label'  => 'Diện tích',
					'rules'  => 'trim|required|numeric',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtGara',
					'label'  => 'Nhà xe',
					'rules'  => 'trim|required|greater_than[0]|less_than[11]',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtKitchen',
					'label'  => 'Phòng bếp',
					'rules'  => 'trim|required|greater_than[0]|less_than[11]',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtBedroom',
					'label'  => 'Phòng ngủ',
					'rules'  => 'trim|required|greater_than[0]|less_than[11]',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtLiving',
					'label'  => 'Phòng khách',
					'rules'  => 'trim|required|greater_than[0]|less_than[11]',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtBargain',
					'label'  => 'Thương lượng',
					'rules'  => 'trim|required|greater_than[0]|less_than[3]',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtNewsCate',
					'label'  => 'Loại tin',
					'rules'  => 'trim|required|greater_than[0]|less_than[5]',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtTypeEstate',
					'label'  => 'Loại bật động sản',
					'rules'  => 'trim|required|integer',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtLocation',
					'label'  => 'Vị trí cụ thể',
					'rules'  => 'trim|required',
					'errors' => $this->__rule
				),
				array(
					'field'  => 'txtDescrip',
					'label'  => 'Thông tin cơ bản',
					'rules'  => 'trim|required',
					'errors' => $this->__rule
				),
			);
			$this->form_validation->set_rules($setRules);
			if ($this->form_validation->run())
			{
				$city_id    = $this->input->post('txtCity', TRUE);
				$city_id    = $this->security->xss_clean($city_id);

				$dist_id    = $this->input->post('txtDist', TRUE);
				$dist_id    = $this->security->xss_clean($dist_id);

				$area_id    = $this->input->post('txtArea', TRUE);
				$area_id    = $this->security->xss_clean($area_id);

				$direct_id  = $this->input->post('txtDirect', TRUE);
				$direct_id  = $this->security->xss_clean($direct_id);

				$title      = $this->input->post('txtTitle', TRUE);
				$title      = $this->security->xss_clean($title);

				$acreage    = $this->input->post('txtAcreage', TRUE);
				$acreage    = $this->security->xss_clean($acreage);

				$price      = $this->input->post('txtPrice', TRUE);
				$price      = $this->security->xss_clean($price  );

				$gara       = $this->input->post('txtGara', TRUE);
				$gara       = $this->security->xss_clean($gara);

				$kitchen    = $this->input->post('txtKitchen', TRUE);
				$kitchen    = $this->security->xss_clean($kitchen);

				$bedroom    = $this->input->post('txtBedroom', TRUE);
				$bedroom    = $this->security->xss_clean($bedroom);

				$livingroom = $this->input->post('txtLiving', TRUE);
				$livingroom = $this->security->xss_clean($livingroom);

				$bargain    = $this->input->post('txtBargain', TRUE);
				$bargain    = $this->security->xss_clean($bargain);

				$newsCate   = $this->input->post('txtNewsCate', TRUE);
				$newsCate   = $this->security->xss_clean($newsCate);

				$typeEstate = $this->input->post('txtTypeEstate', TRUE);
				$typeEstate = $this->security->xss_clean($typeEstate);

				$location   = $this->input->post('txtLocation', TRUE);
				$location   = $this->security->xss_clean($location);

				$descript   = $this->input->post('txtDescrip', TRUE);
				$descript   = $this->security->xss_clean($descript);

				$expiration_at = $this->input->post('txtExp', TRUE);
				$expiration_at = $this->security->xss_clean($expiration_at);

				$hddImg     = $this->input->post('txtHddFile', TRUE);
				$hddImg     = $this->security->xss_clean($hddImg);


				$nameImg  = "";
				$config   = [];
				foreach ($this->__configUpload(['upload_path' => 'uploads/imgEstate/']) as $k => $val)
				{
					$config[$k] = $val;
				}
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('txtFile')){
					$nameImg = $hddImg;
				}
				else{
					$dataImg = $this->upload->data();
					$nameImg = $dataImg['file_name'];
				}

				$dataUpdate = array(
					"city_id"          => $city_id,
					"district_id"      => $dist_id,
					"area_id"          => $area_id,
					"direction_id"     => $direct_id,
					"news_cate_id"     => $newsCate,
					"real_estate_type" => $typeEstate,
					"slug"             => vn2latin($title),
					"title"            => strtoupper($title),
					"image"            => $nameImg,
					"acreage"          => $acreage,
					"price"            => $price,
					"location"         => $location,
					"garage"           => $gara,
					"kitchen"          => $kitchen,
					"bedroom"          => $bedroom,
					"livingroom"       => $livingroom,
					"bargain"          => $bargain,
					"description"      => $descript,
					"expiration_time"  => $expiration_at,
					"modify_date"      => date("Y-m-d H:i:s"),
				);

				$updateInfo = $this->postingnews_model->update_info($this->_tableNameEstate, $dataUpdate, ['id_estate' => $id, 'slug' => $slug]);

				if ($updateInfo)
				{
					$flag = FALSE;
					foreach ($_FILES['txtFile1'] as $k => $val)
					{
						foreach ($val as $k2 => $val2)
						{
							$_FILES['txtFiles']['name'] = $_FILES['txtFile1']['name'][$k2];
							$_FILES['txtFiles']['type'] = $_FILES['txtFile1']['type'][$k2];
							$_FILES['txtFiles']['tmp_name'] = $_FILES['txtFile1']['tmp_name'][$k2];
							$_FILES['txtFiles']['error'] = $_FILES['txtFile1']['error'][$k2];
							$_FILES['txtFiles']['size']  = $_FILES['txtFile1']['size'][$k2];

							if ($this->upload->do_upload('txtFiles'))
							{
								$data['image1'] = $this->upload->data();
								$nameImgGallery = $data['image1']['file_name'];
								$gallery = [
									'name' => $nameImgGallery,
								];
								$updateImgG = $this->postingnews_model->update_info($this->_tableNamegallery, $gallery, ['id' => $k2]);
								$flag = ($updateImgG) ? TRUE : FALSE;
							}
							else
							{
								$flag = TRUE;
							}

						}
					}
					if ($flag)
					{
						redirect(site_url("chi-tiet-tin/{$slug}-{$id}?mess=success"));
					}
					else
					{
						redirect(site_url("sua-tin/{$slug}-{$id}?mess=fail-gallery"));
					}
				}
				else
				{
					redirect(site_url("sua-tin/{$slug}-{$id}?mess=fail1"));
				}
			}
			else
			{
				redirect(site_url("sua-tin/{$slug}-{$id}?mess=fail"));
			}
		}
	}
	// lay du lieu trong bang district theo id lay tu form ajax.
	// hien thi du lieu bang ajax
	public function loadDistrict()
	{
		$data = ['result' => ""];
		if ($this->input->is_ajax_request())
		{
			$idCity = $this->input->post('idCity',TRUE);
			$data['district'] = $this->postingnews_model->get_all_data_by_id($this->_tableNameDist,[
				$this->_fieldIdCityDist => $idCity
				]);

			$data['result'] = $data['district'];

			echo json_encode($data);
		}
	}

	public function loadArea()
	{
		$data = ['result' => ""];
		if ($this->input->is_ajax_request())
		{
			$idDist = $this->input->post('idDist',TRUE);
			$data['area'] = $this->postingnews_model->get_all_data_by_id($this->_tableNameArea,[
				$this->_fieldIdDistArea => $idDist
				]);

			$data['result'] = $data['area'];

			echo json_encode($data);
		}
	}

	private function __configUpload($info = '')
	{
		if (is_array($info))
		{
			$info['upload_path']   = (isset($info['upload_path'])   && !empty($info['upload_path']))   ? $info['upload_path'] : 'uploads/';
			$info['allowed_types'] = (isset($info['allowed_types']) && !empty($info['allowed_types'])) ? $info['allowed_types'] : 'gif|jpg|png';
			$info['max_size']      = (isset($info['max_size'])      && !empty($info['max_size'])   && is_numeric($info['max_size']))      ? $info['max_size']   : 1024;
			$info['max_width']     = (isset($info['max_width'])     && !empty($info['max_width'])  && is_numeric($info['max_width']))     ? $info['max_width']  : 2000;
			$info['max_height']    = (isset($info['max_height'])    && !empty($info['max_height']) && is_numeric($info['max_height']))    ? $info['max_height'] : 2000;
			$config = array();
			foreach ($info as $k => $val)
			{
				$config[$k] = $val;
			}
		}
		else
		{
			$info = [];
		}

		return $config;
	}
}
// $this->form_validation->set_rules('txtArea', 'Khu vực', 'trim|required|integer',$this->__rule);
// $this->form_validation->set_rules('txtCity', 'Thành phố', 'trim|required|integer', $this->__rule);
// $this->form_validation->set_rules('txtDist', 'Quận/Huyện', 'trim|required|integer', $this->__rule);
// $this->form_validation->set_rules('txtDirect', 'Hướng', 'trim|required|integer', $this->__rule);
// $this->form_validation->set_rules('txtTitle', 'Tiêu đề', 'trim|required', $this->__rule);
// $this->form_validation->set_rules('txtAcreage', 'Diện tích', 'trim|required|numeric', $this->__rule);
// $this->form_validation->set_rules('txtGara', 'Nhà xe', 'trim|required|greater_than[0]|less_than[11]', $this->__rule);
// $this->form_validation->set_rules('txtKitchen', 'Phòng bếp', 'trim|required|greater_than[0]|less_than[11]', $this->__rule);
// $this->form_validation->set_rules('txtBedroom', 'Phòng ngủ', 'trim|required|greater_than[0]|less_than[11]', $this->__rule);
// $this->form_validation->set_rules('txtLiving', 'Phòng khách', 'trim|required|greater_than[0]|less_than[11]', $this->__rule);
// $this->form_validation->set_rules('txtBargain', 'Thương lượng', 'trim|required|greater_than[0]|less_than[3]', $this->__rule);
// $this->form_validation->set_rules('txtNewsCate', 'Loại tin', 'trim|required|greater_than[0]|less_than[5]', $this->__rule);
// $this->form_validation->set_rules('txtTypeEstate', 'Loại bật động sản', 'trim|required|integer', $this->__rule);
// $this->form_validation->set_rules('txtLocation', 'Vị trí cụ thể', 'trim|required', $this->__rule);
// $this->form_validation->set_rules('txtDescrip', 'Thông tin cơ bản', 'trim|required', $this->__rule);