<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myoffice extends Management_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	function index(){
		$data['favorites'] = $this->ipapa->getFavoriteBuilding();

		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/header');
		//$this->load->view('ipapa/cpanel/head');
		//$this->load->view('ipapa/cpanel/topmenu');
		$this->load->view('ipapa/cpanel/leftmenu');
		$this->load->view('ipapa/cpanel/myoffice',$data);
		$this->load->view('ipapa/cpanel/footer');
	}
}