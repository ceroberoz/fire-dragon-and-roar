<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mysubscription extends User_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mmanagement'));
	}

	function index(){
		$data['favorites'] = $this->ipapa->getFavoriteBuilding();
		$data['newsletter'] = $this->mmanagement->getNewsletter();
		
		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/header');
		//$this->load->view('ipapa/cpanel/head');
		//$this->load->view('ipapa/cpanel/topmenu');
		$this->load->view('ipapa/cpanel/leftmenu2');
		$this->load->view('ipapa/cpanel/mysubscription',$data);
		$this->load->view('ipapa/cpanel/footer');	
	}
	
	function do_edit(){
		$nid = $this->ion_auth->user()->row()->id;
		$this->mmanagement->updateNewsletter($nid);
		redirect('management/home');	
	}

}