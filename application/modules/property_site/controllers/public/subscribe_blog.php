<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscribe_Blog extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	function index(){
		
		$email = $this->input->post('g_subscribe');

		if ($this->ion_auth->email_check($email))
		{
			$this->ipapa->subscribeMe();
			//redirect('/');
			$data['pocky'] = $email;
			$this->load->view('ipapa/frontpage/success_subscribe_blog',$data);
		}else{
			echo   "<script language='javascript'>alert('You have been subscribed');
						window.location='".base_url()."blog'</script>";
		}
	}
}
