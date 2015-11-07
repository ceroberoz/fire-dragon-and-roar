<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flooring extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('mfurniture');
	}

	public function index(){
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture');
		$this->load->view('ipapa/frontpage/footer');
	}

	function 3ply_engineered_flooring(){
		$data['furnitures'] = $this->mfurniture->subCategory3Ply();

		echo "<pre>";
		die(print_r($data, TRUE));

		//$this->load->view('ipapa/frontpage/head');
		//$this->load->view('ipapa/frontpage/header');
		//$this->load->view('ipapa/frontpage/furniture-nav');
		//$this->load->view('ipapa/frontpage/furniture',$data);
		//$this->load->view('ipapa/frontpage/footer');
	}

	function art_title(){
		$data['furnitures'] = $this->mfurniture->subCategoryArt();

		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture',$data);
		$this->load->view('ipapa/frontpage/footer');
	}

	function multilayer_wood_flooring(){
		$data['furnitures'] = $this->mfurniture->subCategoryMulti();

		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture',$data);
		$this->load->view('ipapa/frontpage/footer');
	}

	function solid_wood_flooring(){
		$data['furnitures'] = $this->mfurniture->subCategorySolid();

		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture',$data);
		$this->load->view('ipapa/frontpage/footer');
	}
}