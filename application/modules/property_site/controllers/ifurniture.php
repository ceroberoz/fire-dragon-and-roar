<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ifurniture extends CI_Controller{
	public function __construct(){
		parent::__construct();

		//$this->load->model(array('ipapa','mChain','mfurniture'));
	}

	public function index()
	{
		$this->load->view('ipapa/ifurniture/index');
	}
	
	function detail()
	{
		$this->load->view('ipapa/ifurniture/detail');
	}
	
	function furniture()
	{
		$this->load->view('ipapa/ifurniture/furniture');
	}
	
	function decoration()
	{
		$this->load->view('ipapa/ifurniture/decoration');
	}
	
	function maintenance()
	{
		$this->load->view('ipapa/ifurniture/maintenance');
	}
	
	function login()
	{
		$this->load->view('ipapa/ifurniture/Login');
	}
	
	function register()
	{
		$this->load->view('ipapa/ifurniture/register');
	}
}