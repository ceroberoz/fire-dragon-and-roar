<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();

		//$this->load->model(array('ipapa','mdecoration'));
		$this->load->model('ipapa');
	}

	public function index(){
		//$data['decoration'] = $this->mdecoration->getAllDecoration();
		
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/decoration-nav');
		$this->load->view('ipapa/frontpage/decoration',$data);
		$this->load->view('ipapa/frontpage/footer');
	}

	function detail(){
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/decoration-nav');
		$this->load->view('ipapa/frontpage/decoration-detail',$data);
		$this->load->view('ipapa/frontpage/footer');
	}
}
