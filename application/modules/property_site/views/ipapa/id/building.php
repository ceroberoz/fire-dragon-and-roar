<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mhomebase'));

		//$this->load->library('pagination');

	}

	public function index(){
		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'building/index';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 3;
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

	    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	    
	    $data['pagination'] = $this->pagination->create_links();
		$data['building'] = $this->ipapa->getBuilding($config['per_page'],$page);
		//$city['option_province'] = $this->mChain->getprovince();
		$sata['buildings'] = $this->ipapa->getBuildingAdmin();

		$pata['option_country'] = $this->mhomebase->getcity();
		
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/search-advance',$pata);
		$this->load->view('ipapa/frontpage/search',$data);
		$this->load->view('ipapa/frontpage/footer',$sata);
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
		if($this->uri->segment(2) == "detail")
		{
			// get last segment & replace
			$bname = $this->uri->segment(3);
			$replace = str_replace('-', ' ', $bname);

			// get only ID
			$string = $replace;
			$pieces = explode(' ', $string);
			$bid = array_pop($pieces);

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

			$this->load->view('ipapa/frontpage/head',$seo);
			$this->load->view('ipapa/frontpage/header');
			//$this->load->view('ipapa/frontpage/search-advance');
			$this->load->view('ipapa/frontpage/search-detail',$data);
			$this->load->view('ipapa/frontpage/footer');
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
		$config['base_url'] = base_url().'building/thumbnail';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 3;
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

	    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

	    $data['pagination'] = $this->pagination->create_links();
		$data['building'] 	= $this->ipapa->getBuilding($config['per_page'],$page);
		if($this->ion_auth->logged_in()){
			$data['favs']		= $this->ipapa->displayFav();
		}
		$city['option_province'] = $this->mChain->getprovince();

		$sata['buildings'] = $this->ipapa->getBuildingAdmin();
		
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/search-advance',$city);
		$this->load->view('ipapa/frontpage/search-list',$data);
		$this->load->view('ipapa/frontpage/footer',$sata);

		///////////////////////////////////////////
		
	}


	function gallery(){
		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'building/gallery';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 3;
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

	    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	    
	    $data['pagination'] = $this->pagination->create_links();
		$data['building'] = $this->ipapa->getBuilding($config['per_page'],$page);
		$city['option_province'] = $this->mChain->getprovince();
		$sata['buildings'] = $this->ipapa->getBuildingAdmin();

		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/search-advance',$city);
		$this->load->view('ipapa/frontpage/search-gallery',$data);
		$this->load->view('ipapa/frontpage/footer',$sata);
	}

	function map(){
		$city['option_province'] = $this->mChain->getprovince();

		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/search-advance',$city);
		$this->load->view('ipapa/frontpage/search-map');
		$this->load->view('ipapa/frontpage/footer');
	}
}
