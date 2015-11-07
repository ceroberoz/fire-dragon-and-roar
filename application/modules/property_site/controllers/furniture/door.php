<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Door extends CI_Controller{
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

	function dyda(){
		$data['furnitures'] = $this->mfurniture->subCategoryDYJA();

		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture',$data);
		$this->load->view('ipapa/frontpage/footer');
	}

	function yj(){
		$data['furnitures'] = $this->mfurniture->subCategoryYJ();

		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture',$data);
		$this->load->view('ipapa/frontpage/footer');
	}

	function non_painting_door(){
		$data['furnitures'] = $this->mfurniture->subCategoryNon();

		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture',$data);
		$this->load->view('ipapa/frontpage/footer');
	}
}