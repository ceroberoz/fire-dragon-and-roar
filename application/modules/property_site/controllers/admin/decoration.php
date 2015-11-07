<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decoration extends Admin_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mdecoration','yudhi'));
	}

	function index()
	{
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['categories'] = $this->mdecoration->getCategory();
		$data['decorations'] = $this->mdecoration->getAllDecoration();
		$data['countD'] = $this->yudhi->countD();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/decoration_manage',$data);
	}

	function edit(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['categories'] = $this->mdecoration->getCategory();
		$data['decorations'] = $this->mdecoration->getDecoration();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/edit_decoration',$data);
	}

	//DECORATION
	function add_decoration()
	{
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['categories'] = $this->mdecoration->getCategory();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/add_decoration',$data);	

	}

	function do_add_decoration()
	{
		$this->uploadPicture();
		$this->mdecoration->addDecoration();
		redirect('admin/decoration','refresh');
	}

	function do_edit_decoration()
	{
		$this->uploadPicture();
		$this->mdecoration->editDecoration();
		redirect('admin/decoration','refresh');
	}

	function uploadPicture()
	{
		$config = array(
			'upload_path' => './uploads/decoration/',
			'allowed_types' => 'gif|jpg|png',
			);
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		$field_name = "picture";
		$this->upload->do_upload($field_name);
	}

	function delete_decoration()
	{
		$this->mdecoration->deleteDecoration();
		redirect('admin/decoration','refresh');
	}



	// CATEGORIES
	function add_category()
	{
		$this->mdecoration->addCategory();
		redirect('admin/decoration','refresh');
	}

	function delete_category()
	{
		$this->mdecoration->removeCategory();
		redirect('admin/decoration','refresh');
	}

}