<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Furniture extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mfurniture'));
	}

	public function index(){
		$data['furnitures'] = $this->mfurniture->getAllFurniture();

		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture',$data);
		$this->load->view('ipapa/frontpage/footer');
	}

	function detail(){
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/furniture-nav');
		$this->load->view('ipapa/frontpage/furniture-detail');
		$this->load->view('ipapa/frontpage/footer');
	}
}