<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building extends Seo_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('mseo','ipapa'));
	}

	function index(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['buildings'] = $this->mseo->getBuilding();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav_seo');
		$this->load->view('ipapa/admin/building_seo',$data);
	}

	function edit(){
		$bid = $this->uri->segment(4);
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['buildings']	= $this->mseo->getMyBuilding($bid); 

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav_seo');
		$this->load->view('ipapa/admin/edit_seo',$data);
	}


	function do_edit(){
		// save to building db
		$this->ipapa->updateBuildingSEO();		
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