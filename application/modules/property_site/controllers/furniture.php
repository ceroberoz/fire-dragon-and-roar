<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Furniture extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mChain','mfurniture'));
	}

	public function index()
	{
		$rows = $this->db->get('furniture');
		//
		$config['base_url'] = base_url().'furniture/index';
		$config['total_rows'] = $rows->num_rows();
		
	    $config['per_page'] = 12;
		$config['uri_segment'] = 3;
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
		
		$data['furnitures'] = $this->mfurniture->getAllFurniture($config['per_page'],$page);
	    $data['pagination'] = $this->pagination->create_links();

		if($this->ion_auth->logged_in()){
			$data['favs']		= $this->ipapa->displayFav();
		}
		$city['option_province'] = $this->mChain->getprovince();
		
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture',$data);
		$this->load->view('ipapa/frontpage/footer');
	}

	function detail(){
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture-detail');
		$this->load->view('ipapa/frontpage/footer');
	}
}