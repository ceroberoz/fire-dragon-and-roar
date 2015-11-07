<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building extends Management_Controller{
//class Building extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mmanagement'));
	}

	function index(){

		$data['buildings'] = $this->mmanagement->getManagementBuildingList();

		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/header');
		//$this->load->view('ipapa/cpanel/topmenu');
		$this->load->view('ipapa/cpanel/leftmenu');
		$this->load->view('ipapa/cpanel/mybuilding',$data);
		$this->load->view('ipapa/cpanel/footer');
	}

	function edit()
	{
		$bid = $this->uri->segment(4);

		$data['buildings'] = $this->ipapa->getBuildingInfo($bid);

		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/header');
		//$this->load->view('ipapa/cpanel/topmenu');
		$this->load->view('ipapa/cpanel/leftmenu');
		$this->load->view('ipapa/cpanel/bm-editbuilding',$data);
		$this->load->view('ipapa/cpanel/footer');
	}

	function do_edit()
	{
		//update
		$this->ipapa->insertBuildingFacilities();
		redirect('management/building');
	}
}