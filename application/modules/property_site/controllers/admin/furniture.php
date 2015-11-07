<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Furniture extends Admin_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mfurniture'));
	}

	function index()
	{
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['categories'] = $this->mfurniture->getCategory();
		$data['furnitures'] = $this->mfurniture->getAllFurniture2();
		$data['subcategories'] = $this->mfurniture->getSubCategories();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/furniture_manage',$data);
	}

	function edit(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['categories'] = $this->mfurniture->getCategory2();
		$data['furnitures'] = $this->mfurniture->getFurniture();
		$data['subcategories'] = $this->mfurniture->getSubCategories();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/edit_furniture',$data);
	}

	//FURNITURE
	function add_furniture()
	{
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['categories'] = $this->mfurniture->getCategory2();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/add_furniture',$data);	
	}

	function do_add_furniture()
	{
		$this->uploadPicture();
		$this->mfurniture->addFurniture();
		redirect('admin/furniture','refresh');
	}

	function do_edit_furniture()
	{
		$this->uploadPicture();
		$this->mfurniture->editFurniture();
		redirect('admin/furniture','refresh');
	}

	function select_subcat(){
		if('IS_AJAX'){
		$data['option_sub_categories'] = $this->mfurniture->getSubCategory2();
		$this->load->view('ipapa/admin/selectsubcategories',$data);
		}
	}

	function uploadPicture()
	{
		$config = array(
			'upload_path' => './uploads/furniture/',
			'allowed_types' => 'gif|jpg|png',
			);
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		$field_name = "picture";
		$this->upload->do_upload($field_name);
	}

	function delete_furniture()
	{
		$this->mfurniture->deleteFurniture();
		redirect('admin/furniture','refresh');
	}

	// CATEGORIES
	function add_category()
	{
		$this->mfurniture->addCategory();
		redirect('admin/furniture','refresh');
	}

	function delete_category()
	{
		$this->mfurniture->removeCategory();
		redirect('admin/furniture','refresh');
	}

	function add_sub_category()
	{
		if($this->input->post('f_sub_category_name')){
			$this->mfurniture->addSubCategory();
			redirect('admin/furniture','refresh');
		}else{
			redirect('admin/furniture','refresh');
		}
	}

	function delete_sub_category()
	{
		$this->mfurniture->removeSubCategory();
		redirect('admin/furniture','refresh');
	}

}