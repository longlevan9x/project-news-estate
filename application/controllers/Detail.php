<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Detail extends MY_Controller
{
	function __construct()
	{
		$this->_className = trim(strtolower(__CLASS__));
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index()
	{
		$url = $this->uri->segment(2);
		$arrUrl = explode("-", $url);

		$id = end($arrUrl);
		$slug = str_replace("-".$id, "", $url);
		$data = array();
		$data = $this->home_model->get_data_by_id($this->_tableNameEstate, $id, $slug);
		if (empty($data)) {
			show_404();
		}
		else
		{
			//load header
			$header = array("title" => "Chi tiết sản phẩm", "content" => "Thông tin chi tiết");
			$this->_loadHeader($header);
			//load content
			$this->home_model->upload_view($this->_tableNameEstate, $id, $slug, $data['view']);
			$data['infoView'] = $this->home_model->get_all_data_by_id_cate($this->_tableNameEstate, [
					'limit' => 4,
					'andWhere' => [
								'news_cate_id' => $data['news_cate_id'],
								'real_estate_type' => $data['real_estate_type'],
							],
					'orderWhere' => ['view' => 'DESC']
				]);
			$data['images'] = $this->home_model->get_all_info($this->_tableNamegallery, ['real_estate_id' => $data['id_estate']]);


			$this->load->view('details/index_view', $data);
			//load footer
			$this->_loadFooter();
		}
	}
}