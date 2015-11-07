<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscribe extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	function index(){
		
		$email = $this->input->post('g_subscribe');


		$this->load->helper('email');

		if (valid_email($email))
		{
		    //echo 'email is valid';
		    $this->ipapa->subscribeMe();
			//redirect('/');
			$data['pocky'] = $email;
			$this->load->view('ipapa/frontpage/success_subscribe',$data);
		}
		else
		{
		    //echo 'email is not valid';
		    echo   "<script language='javascript'>alert('You have been subscribed');
						window.location='".base_url()."'</script>";
		}
	}
}
