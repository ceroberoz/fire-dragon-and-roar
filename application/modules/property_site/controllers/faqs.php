<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faqs extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	public function index(){
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/faqs');
		$this->load->view('ipapa/frontpage/footer');

		
	}
}