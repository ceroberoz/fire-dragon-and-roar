<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends Management_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mmanagement'));
	}

	function index(){
		$data['messages'] = $this->mmanagement->getMessages();
		//$data['messagecontent'] = $this->mmanagement->getMessagesContent();
		$data['readmail'] = $this->mmanagement->readMail();

		// need to implement AJAX + JSON into view messaging

		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/header');
		//$this->load->view('ipapa/cpanel/head');
		//$this->load->view('ipapa/cpanel/topmenu');
		$this->load->view('ipapa/cpanel/leftmenu2');
		$this->load->view('ipapa/cpanel/messages',$data);
		$this->load->view('ipapa/cpanel/footer');
	}
}