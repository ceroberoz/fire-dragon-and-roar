<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends User_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	function index(){
		//echo "<pre>";
		//die(print_r($data, TRUE));

		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/header');
		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/topmenu');
		$this->load->view('ipapa/cpanel/leftmenu2');
		$this->load->view('ipapa/cpanel/dashboard');
		$this->load->view('ipapa/cpanel/footer');
	}
}