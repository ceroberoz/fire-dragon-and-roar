<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ipapa extends CI_Controller {

	public function index(){
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/home');
		$this->load->view('ipapa/frontpage/footer');
	}
}