<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class MY_Controller extends CI_Controller
{
	protected $_className;
	protected $_fieldId         = 'id';
	protected $_fieldView       = 'view';
	protected $_tableNameEstate = "estate";

	protected $_tableNameArea   = "object_area";
	protected $_fieldNameArea   = 'name_area';
	protected $_fieldIdDistArea = 'id_district';

	protected $_tableNameDist   = "object_district";
	protected $_fieldNameDist   = 'name_district';
	protected $_fieldIdCityDist = 'id_city';

	protected $_tableNameCity   = "object_city";
	protected $_fieldNameCity   = 'name_city';

	protected $_tableNameDirect = "object_direction";
	protected $_fieldNameDirect = 'name_direction';

	protected $_tableNameNews_cate   = "news_category";

	protected $_tableNamegallery = 'gallery';
	function __construct()
	{
		parent::__construct();
	}

	protected function _loadHeader($header = array())
	{
		$data = array();
		$data = [
			'title'     => $header['title'],
			'content'   => $header['content'],
			'className' => $this->_className,
			'sessionId'       => $this->_getSessionId(),
			'sessionUsername' => $this->_getSessionUsername(),
			'sessionFullname' => $this->_getSessionFullname(),
			'sessionphone'    => $this->_getSessionPhone(),
			'sessionEmail'    => $this->_getSessionEmail(),
			'sessionAddress'  => $this->_getSessionAddress(),
			'sessionAvatar'   => $this->_getSessionAvatar(),
			'sessionSkype'    => $this->_getSessionSkype(),
			'sessionFacebook' => $this->_getSessionFacebook(),
		];

		$this->load->model('home_model');
		$data['newsPosted'] = $this->home_model->get_all_info($this->_tableNameEstate, ['poster_id' => $this->_getSessionId()]);
		$this->load->view('layouts/header_view', $data);

		if ($this->_className == 'home')
		{
			$this->_loadSlide();
		}
		elseif($this->_className == 'about' OR
			$this->_className == 'blog'     OR
			$this->_className == 'contact'  OR
			$this->_className == 'signup'   OR
			$this->_className == 'login'    OR
			$this->_className == 'postingnews')
		{
			$this->_loadBanner();
		}
		elseif ($this->_className == "detail"){}
		else
		{
			$this->_loadBanner();
			$this->_loadMenu();
		}
	}

	protected function _configBootstrapt()
	{
		$data = array(

		//config template bootstrapt
		"full_tag_open" => '<ul class="pagination">',
		"full_tag_close" => '</ul>',

		"first_link" => "&laquo;",
		"first_tag_open" => "<li>",
		"first_tag_close" => "</li>",

		"last_link" => "&raquo;",
		"last_tag_open" => "<li>",
		"last_tag_close" => "</li>",

		'next_link' => '&gt;',
		'next_tag_open' => '<li>',
		'next_tag_close' => '<li>',

		'prev_link' => '&lt;',
		'prev_tag_open' => '<li>',
		'prev_tag_close' => '<li>',
		'cur_tag_open' => '<li class="active"><a href="#">',
		'cur_tag_close' => '</a></li>',
		'num_tag_open' => '<li>',
		'num_tag_close' => '</li>',
		);
		return $data;
	}
	protected function _loadSlide()
	{
		$this->load->view('layouts/slide_view');
	}
	protected function _loadBanner()
	{
		$this->load->view('layouts/banner_view');
	}
	protected function _loadMenu()
	{

		$this->load->model('menu_model');
		$data['estate_view'] = $this->menu_model->get_all_data($this->_tableNameEstate,
			[
			'limit' => 6,
			'orderWhere' => ['view' => "DESC"],
			]);
		$data['menu_right']  = $this->menu_model->get_all_info($this->_tableNameNews_cate,
			['status_cate' => 1]);
		$this->load->view('layouts/menu_view',$data);
	}
	protected function _loadFooter()
	{
		$this->load->view('layouts/footer_view');
	}


	// check session
	protected function _getSessionId()
	{
		$id = $this->session->userdata('mem_id');
		return (!empty($id)) ? $id : "";
	}

	protected function _getSessionUsername()
	{
		$username = $this->session->userdata('mem_username');
		return (!empty($username)) ? $username : "";
	}

	protected function _getSessionPhone()
	{
		$phone = $this->session->userdata('mem_phone');
		return (!empty($phone)) ? $phone : "";
	}

	protected function _getSessionEmail()
	{
		$email = $this->session->userdata('mem_email');
		return (!empty($email)) ? $email : "";
	}

	protected function _getSessionFullname()
	{
		$fullname = $this->session->userdata('mem_fullname');
		return (!empty($fullname)) ? $fullname : "";
	}

	protected function _getSessionAddress()
	{
		$address = $this->session->userdata('mem_address');
		return (!empty($address)) ? $address : "";
	}

	protected function _getSessionAvatar()
	{
		$avatar = $this->session->userdata('mem_avatar');
		return (!empty($avatar)) ? $avatar : "";
	}

	protected function _getSessionSkype()
	{
		$skype = $this->session->userdata('mem_skype');
		return (!empty($skype)) ? $skype : "";
	}

	protected function _getSessionFacebook()
	{
		$facebook = $this->session->userdata('mem_facebook');
		return (!empty($facebook)) ? $facebook : "";
	}
}
