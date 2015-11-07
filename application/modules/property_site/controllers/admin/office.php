<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Office extends Admin_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	function index(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['offices'] = $this->ipapa->getOffice();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/office',$data);
	}

	function add(){
		$data['title'] = "Add Office";
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['buildings'] = $this->ipapa->getUserBuilding();
		
		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/add_office',$data);
	}

	function do_add(){
		$this->ipapa->addOffice();
		redirect('admin/office');
		//echo "<pre>";
		//die(print_r($data, TRUE));
	}

	function edit(){
		$oid = $this->uri->segment(4);

		$data['title'] = "Edit Office";
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['offices'] = $this->ipapa->getOfficeInfo($oid);
		$data['buildings'] = $this->ipapa->getUserBuilding();
		$data['images'] = $this->ipapa->getOfficeImages($oid);

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/edit_office',$data);
	}

	function do_edit(){
		//$oid = $this->uri->segment(4);

		// upload images
		$config = array(
			'upload_path' => './uploads/office/image/',
			'allowed_types' => 'jpg|jpeg|png|gif',
			'max_size' => 2048,
			'encrypt_name' => TRUE
			);
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		$field_name = "b_userpic";
		$this->upload->do_multi_upload($field_name);

		// add to db
		$this->ipapa->updateOffice();
		// save to office_facilities db
		$this->ipapa->insertOfficeFacilities();
		// save image to building_images
		//$uploaddata = $this->upload->get_multi_upload_data();
		
		//if(!$uploaddata =''){
			$this->ipapa->insertOfficeImages();
		//}
		redirect('admin/office','refresh');
	}

	function delete(){
		$this->ipapa->deleteOffice();
		redirect('admin/office','refresh');
	}


}