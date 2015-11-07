<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mysubscription extends User_Controller{
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
		$this->load->view('ipapa/cpanel/leftmenu2');
		$this->load->view('ipapa/cpanel/mysubscription',$data);
		$this->load->view('ipapa/cpanel/footer');
	}
}