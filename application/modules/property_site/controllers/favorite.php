<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorite extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	function add()
	{
		$this->ipapa->addFav();
		$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);  
		redirect('favorite/redirects','refresh');
	}

	function remove()
	{
		$this->ipapa->removeFav();
		$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);  
		redirect('favorite/redirects','refresh');
	}

	function redirects(){
		redirect($this->session->userdata('refered_from'));
	}
}