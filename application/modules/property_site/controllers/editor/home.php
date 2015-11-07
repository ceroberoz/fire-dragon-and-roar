<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Editor_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	function index(){
		//$this->load->view('ipapa/admin/head');
		//$this->load->view('ipapa/admin/header');
		//$this->load->view('ipapa/admin/nav');
		//$this->load->view('ipapa/admin/content');
		redirect('editor/building');
	}
}