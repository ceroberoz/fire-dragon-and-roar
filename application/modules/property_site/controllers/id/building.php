<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mhomebase','mChain','mlogging'));

		//$this->load->library('pagination');

	}

	public function index(){
		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'id/building/index';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 4;
	    $config['per_page'] = 9;
	    //$config['num_links'] = 5;

	    $config['full_tag_open'] = '<div class="pagination_wrapper clearfix">
                                  <ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div>';
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;
	    
	    $this->pagination->initialize($config); 

	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	    
	    $data['pagination'] = $this->pagination->create_links();
		$data['building'] = $this->ipapa->getBuilding($config['per_page'],$page);
		//$city['option_province'] = $this->mChain->getprovince();
		$sata['buildings'] = $this->ipapa->getBuildingAdmin();

		$city['option_country'] = $this->mhomebase->getcity();
		
		$this->load->view('ipapa/id/head');
		$this->load->view('ipapa/id/header');
		$this->load->view('ipapa/id/search-advance',$city);
		$this->load->view('ipapa/id/search',$data);
		$this->load->view('ipapa/id/footer',$sata);
	}

	function select_kecamatan()
	{
		if('IS_AJAX'){
			$data['option_province'] = $this->mhomebase->getkecamatan();
			$this->load->view('ipapa/asu/selectkecamatan',$data);
			//$data = $_POST;

			//echo "<pre>";
			//die(print_r($data, TRUE));
			//echo "Melon";
		}
	}

	function select_kelurahan()
	{
		if('IS_AJAX'){
			$data['option_city'] = $this->mhomebase->getkelurahan();
			$this->load->view('ipapa/asu/selectkelurahan',$data);
		}
	}

	function detail(){
		if($this->uri->segment(3) == "detail")
		{

			// get last segment & replace
			$bname = $this->uri->segment(4);
			$replace = str_replace('-', ' ', $bname);

			// get only ID
			$string = $replace;
			$pieces = explode(' ', $string);
			$bid = array_pop($pieces);

			//$this->mlogging->logbuilding($bid);

			// get bid
			//$this->db->select('pk_building_id')
			//		 ->from('building')
			//		 ->where('s_building_name',$last_word);

			//$query = $this->db->get();
			//$bid = $query->row()->pk_building_id;

			$data['building'] = $this->ipapa->getBuildingInfo($bid);
			$data['offices']  = $this->ipapa->getOffices($bid);
			//$data['omages'] = $this->ipapa->getOfficeDetailImages($bid);
			$data['images'] = $this->ipapa->getBuildingImages($bid);
			//$data['nearest'] = $this->ipapa->getNearestBuildings($bid);
	        //$$data['maps'] = $this->ipapa->getGeoLocation($bid);
	        $seo['metas'] = $this->ipapa->getSEO($bid);
	        //$data['favs']		= $this->ipapa->displayFav();

	        $this->mlogging->logbuilding($bid);

			$this->load->view('ipapa/id/head',$seo);
			$this->load->view('ipapa/id/header');
			//$this->load->view('ipapa/frontpage/search-advance');
			$this->load->view('ipapa/id/search-detail',$data);
			$this->load->view('ipapa/id/footer');
		}

		
	}

	function select_city(){
		if('IS_AJAX'){
			$data['option_city'] = $this->mChain->getcity();
			$this->load->view('ipapa/frontpage/selectcity',$data);
		}
	}
	
	function submit(){
		//echo "Country ID = ".$this->input->post("country_id");
		//echo "";

		echo "Province ID = ".$this->input->post("province_id");
		echo "";

		echo "City ID = ".$this->input->post("city_id");
		echo "";
	}

	function thumbnail(){
		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'id/building/thumbnail';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 4;
	    $config['per_page'] = 9;
	    //$config['num_links'] = 5;

	    $config['full_tag_open'] = '<div class="pagination_wrapper clearfix">
                                  <ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div>';
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;
	    
	    $this->pagination->initialize($config); 

	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	    $data['pagination'] = $this->pagination->create_links();
		$data['building'] 	= $this->ipapa->getBuilding($config['per_page'],$page);
		if($this->ion_auth->logged_in()){
			$data['favs']		= $this->ipapa->displayFav();
		}
		$city['option_province'] = $this->mChain->getprovince();

		$sata['buildings'] = $this->ipapa->getBuildingAdmin();
		$city['option_country'] = $this->mhomebase->getcity();
		
		$this->load->view('ipapa/id/head');
		$this->load->view('ipapa/id/header');
		$this->load->view('ipapa/id/search-advance',$city);
		$this->load->view('ipapa/id/search-list',$data);
		$this->load->view('ipapa/id/footer',$sata);

		///////////////////////////////////////////
		
	}


	function gallery(){
		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'id/building/gallery';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 4;
	    $config['per_page'] = 9;
	    //$config['num_links'] = 5;

	    $config['full_tag_open'] = '<div class="pagination_wrapper clearfix">
                                  <ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div>';
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;
	    
	    $this->pagination->initialize($config); 

	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	    
	    $data['pagination'] = $this->pagination->create_links();
		$data['building'] = $this->ipapa->getBuilding($config['per_page'],$page);
		$city['option_province'] = $this->mChain->getprovince();
		$sata['buildings'] = $this->ipapa->getBuildingAdmin();
		$city['option_country'] = $this->mhomebase->getcity();

		$this->load->view('ipapa/id/head');
		$this->load->view('ipapa/id/header');
		$this->load->view('ipapa/id/search-advance',$city);
		$this->load->view('ipapa/id/search-gallery',$data);
		$this->load->view('ipapa/id/footer',$sata);
	}

	function map(){
		$city['option_province'] = $this->mChain->getprovince();
		$city['option_country'] = $this->mhomebase->getcity();
		$data['buildings'] = $this->ipapa->getBuildingAdmin();
		$data['building'] =  $this->ipapa->getBuildingMap();
		
		$this->load->view('ipapa/id/head');
		//$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/id/search-advance-map',$city);
		$this->load->view('ipapa/id/search-map',$data);
		//$this->load->view('ipapa/frontpage/footer');
	}
}
