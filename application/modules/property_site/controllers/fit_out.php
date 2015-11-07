<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fit_out extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	public function index(){
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		//$this->load->view('ipapa/frontpage/decoration-nav');
		$this->load->view('ipapa/frontpage/decoration');
		$this->load->view('ipapa/frontpage/footer');
	}

	function detail(){
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		//$this->load->view('ipapa/frontpage/decoration-nav');
		$this->load->view('ipapa/frontpage/decoration-detail');
		$this->load->view('ipapa/frontpage/footer');
	}
}