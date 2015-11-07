<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offices extends Management_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	function index(){
		$data['myoffice'] = $this->ipapa->getBMOffices();

		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/header');
		//$this->load->view('ipapa/cpanel/head');
		//$this->load->view('ipapa/cpanel/topmenu');
		$this->load->view('ipapa/cpanel/leftmenu2');
		$this->load->view('ipapa/cpanel/manageoffice',$data);
		$this->load->view('ipapa/cpanel/footer');
	}

	function add(){
		$data['buildings'] = $this->ipapa->getUserBuilding();

		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/header');
		//$this->load->view('ipapa/cpanel/head');
		//$this->load->view('ipapa/cpanel/topmenu');
		$this->load->view('ipapa/cpanel/leftmenu2');
		$this->load->view('ipapa/cpanel/bm-addoffice',$data);
		$this->load->view('ipapa/cpanel/footer');
	}

	function do_add(){
		$this->ipapa->addOffice();
		redirect('management/offices');
	}

	function delete_image(){
		$this->ipapa->deleteOfficeImage();

		$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);
		redirect('management/offices/redirects');

	}

	function redirects(){
		redirect($this->session->userdata('refered_from'));
	}

	function edit(){
		$oid = $this->uri->segment(4);
		$data['offices'] = $this->ipapa->getOfficeInfo($oid);
		$data['buildings'] = $this->ipapa->getUserBuilding();
		$data['images'] = $this->ipapa->getOfficeImages($oid);

		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/header');
		//$this->load->view('ipapa/cpanel/head');
		//$this->load->view('ipapa/cpanel/topmenu');
		$this->load->view('ipapa/cpanel/leftmenu2');
		$this->load->view('ipapa/cpanel/bm-editoffice',$data);
		$this->load->view('ipapa/cpanel/footer');
	}

	function do_edit(){
		// add to db
		$this->ipapa->updateOffice();
		// save to office_facilities db
		$this->ipapa->insertOfficeFacilities();
		// upload images
		$config2 = array(
			'upload_path' => './uploads/office/image/',
			'allowed_types' => 'jpg|jpeg|png|gif',
			'max_size' => 2048,
			'encrypt_name' => TRUE
			);
		
		$this->load->library('upload');
		$this->upload->initialize($config2);
		
		$field_name2 = "b_userpic";
		$this->upload->do_multi_upload($field_name2);

		//$data['image'] = $this->upload->get_multi_upload_data();

		$this->ipapa->insertOfficeImages();
		redirect('management/offices','refresh');

		//echo "<pre>";
		//die(print_r($data, TRUE));
	}

	function delete(){
		$this->ipapa->deleteOffice();
		redirect('management/offices','refresh');
	}
}