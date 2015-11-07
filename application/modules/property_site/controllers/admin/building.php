<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building extends Admin_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mChain','yudhi','mhomebase'));
	}

	function index(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['buildings'] = $this->ipapa->getBuildingAdmin();
		$data['totalB'] = $this->yudhi->getTotalBuilding();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/building3',$data);
	}

	function delete_image(){
		$this->ipapa->deleteBuildingImage();

		$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);
		redirect('admin/building/redirects');

	}
	function delete_image2(){
		$this->ipapa->deleteBuildingImage();

		$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);
		redirect('admin/building/redirects');

	}

	function redirects(){
		redirect($this->session->userdata('refered_from'));
	}

	function edit(){
		$bid = $this->uri->segment(4);
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['buildings']	= $this->ipapa->getBuildingInfo($bid); 
		$data['images'] = $this->ipapa->getBuildingImages($bid);
		$data['option_province'] = $this->mChain->getprovince();
		
		$data['option_country']  = $this->mhomebase->getcity();
		$data['kota']  = $this->mhomebase->getnamakota();
		$data['kecamatan']  = $this->mhomebase->getcamat($bid);
		$data['kelurahan']  = $this->mhomebase->getlurah($bid);
		//echo "<pre>";
		//die(print_r($data, TRUE));
		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/edit_building3',$data);
	}
	function edit2(){
		$bid = $this->uri->segment(4);
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['buildings']	= $this->ipapa->getBuildingInfo($bid);
		$data['images'] = $this->ipapa->getBuildingImages($bid); 
		$data['option_province'] = $this->mChain->getprovince();
		//echo "<pre>";
		//die(print_r($data, TRUE));
		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/edit_building2',$data);
	}

	function select_city(){
		if('IS_AJAX'){
			$data['option_city'] = $this->mChain->getcity();
			$this->load->view('ipapa/admin/selectcity',$data);
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
		//$this->ipapa->updateBuilding();
		$this->load->model('madmin');
		$this->madmin->editBuilding();
		// save to building_facilities db
		$this->ipapa->insertBuildingFacilities();
		
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

		$this->randomizer();

		// redirect
		redirect('admin/building','refresh');



		//echo $this->db->last_query();

		//echo "<pre>";
		//die(print_r($data, TRUE));
	}
	function do_edit2(){
		// start update sequence
		// do upload file
		/////////////////////////////////////////////
		// save to building db
		$this->ipapa->updateBuilding2();
		// save to building_facilities db
		$this->ipapa->insertBuildingFacilities();
		
		$this->randomizer();

		// redirect
		redirect('admin/building','refresh');
	}
	
	//EDITOR
	function do_editEditor(){
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
		$this->ipapa->insertBuildingFacilities();
		
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
		redirect('admin/building','refresh');



		//echo $this->db->last_query();

		//echo "<pre>";
		//die(print_r($data, TRUE));
	}
	
	//SEO
	function do_editSEO(){
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
		$this->ipapa->updateBuildingSEO();
		// save to building_facilities db
		$this->ipapa->insertBuildingFacilities();
		
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
		redirect('admin/building','refresh');



		//echo $this->db->last_query();

		//echo "<pre>";
		//die(print_r($data, TRUE));
	}
	
	//MARKETING
	function do_editMarketing(){
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
		$this->ipapa->updateBuildingMarketing();
		// save to building_facilities db
		$this->ipapa->insertBuildingFacilities();
		
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
		redirect('admin/building','refresh');



		//echo $this->db->last_query();

		//echo "<pre>";
		//die(print_r($data, TRUE));
	}
	
	function delete(){
		$this->ipapa->deleteBuilding();

		//echo "<pre>";
		//die(print_r($data, TRUE));
		redirect('admin/building','refresh');
	}

	function add(){
		$this->ipapa->addBuilding();
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
	
	function logout()
	{
		$this->ion_auth->logout();
		redirect('home/index','refresh');
	}
	
	function select_kecamatan()
	{
		if('IS_AJAX'){			
			$data['option_province'] = $this->mhomebase->getkecamatan2();
			$this->load->view('ipapa/admin/selectkecamatan',$data);
			//$data = $_POST;

			//echo "<pre>";
			//die(print_r($data, TRUE));
			//echo "Melon";
		}
	}

	function select_kelurahan()
	{
		if('IS_AJAX'){
			$data['option_city'] = $this->mhomebase->getkelurahan2();
			$this->load->view('ipapa/admin/selectkelurahan',$data);
		}
	}
}