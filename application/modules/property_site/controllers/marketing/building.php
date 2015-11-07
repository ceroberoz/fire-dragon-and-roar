<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building extends Marketing_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mChain'));
	}

	function index(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['buildings'] = $this->ipapa->getBuildingAdmin();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav_marketing');
		$this->load->view('ipapa/admin/building_marketing',$data);
	}

	function edit(){
		$bid = $this->uri->segment(4);
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['buildings']	= $this->ipapa->getBuildingInfo($bid); 
		$data['option_province'] = $this->mChain->getprovince();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav_marketing');
		$this->load->view('ipapa/admin/edit_marketing',$data);
	}

	function select_city(){
		if('IS_AJAX'){
			$data['option_city'] = $this->mChain->getcity();
			$this->load->view('ipapa/admin/selectcity',$data);
		}
	}
	
	function submit(){
		echo "Province ID = ".$this->input->post("province_id");
		echo "";

		echo "City ID = ".$this->input->post("city_id");
		echo "";
	}

	function do_edit(){
		// save to building db
		$this->ipapa->updateBuilding();
		// save to building_facilities db
		$this->ipapa->insertBuildingFacilities();
		
		$this->randomizer();

		// redirect
		redirect('admin/building','refresh');
	}

	function randomizer()
	{
		// random auth
		$key = uniqid();
		$data = strtoupper($key);

		$this->load->helper('file');
		write_file('./uploads/api/kekgwpeduliaja.txt',$data,'r+');
	}
}