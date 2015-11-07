<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building extends Editor_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mChain','yudhi'));
	}

	function index(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['buildings'] = $this->ipapa->getBuildingEditor();
		$data['totalB'] = $this->yudhi->getTotalBuilding();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav_editor');
		$this->load->view('ipapa/admin/buildingEditor',$data);
	}

	function delete_image(){
		$this->ipapa->deleteBuildingImage();

		$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);
		redirect('editor/building/redirects');

	}

	function redirects(){
		redirect($this->session->userdata('refered_from'));
	}

	function edit(){
		$bid = $this->uri->segment(4);
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['buildings']	= $this->ipapa->getBuildingInfo($bid); 
		$data['images'] = $this->ipapa->getBuildingImages($bid);
		//$data['option_province'] = $this->mChain->getprovince();
		//echo "<pre>";
		//die(print_r($data, TRUE));
		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav_editor');
		$this->load->view('ipapa/admin/edit_editor',$data);
	}

	//EDITOR
	function do_edit(){
		// start update sequence
		// do upload file

		$config = array(
			'upload_path' => './uploads/building/file/',
			'allowed_types' => 'pdf|doc|docx|xls|xlsx|odt',
			'max_size' => 2048,
			'encrypt_name' => TRUE
			);
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		$field_name = "b_userfile";
		$this->upload->do_upload($field_name);

		/////////////////////////////////////////////
		// save to building db
		$this->ipapa->updateBuildingEditor();
		// save to building_facilities db
		//$this->ipapa->insertBuildingFacilities();
		
		// upload images
		$config2 = array(
			'upload_path' => './uploads/building/image/',
			'allowed_types' => 'jpg|jpeg|png|gif',
			'max_size' => 2048,
			'encrypt_name' => TRUE
			);
		
		//$this->load->library('upload');
		$this->upload->initialize($config2);
		
		$field_name2 = "b_userpic";
		$this->upload->do_multi_upload($field_name2);

		$this->ipapa->insertBuildingImages();

		// redirect
		redirect('editor/building','refresh');
	}

}