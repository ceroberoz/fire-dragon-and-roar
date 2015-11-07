<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	function index(){
		redirect('/');
	}

	function register(){

		$this->form_validation->set_rules('identity', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|regex_match[/^[0-9]+$/]|xss_clean');
		
		$username = $this->input->post('identity');
		$password = $this->input->post('password');
		$email 	  = $this->input->post('identity');
		$phone 	  = $this->input->post('phone');

		if($this->form_validation->run() == TRUE){
			if(!$this->ion_auth->email_check($email)){
				$additional_data = array(
					'first_name' => '',
					'last_name'	 => ''
					);

				$this->ion_auth->register($username, $password, $email, $phone, $additional_data);

                $data['u_input'] = $email;
				$this->load->view('ipapa/frontpage/success',$data);
					}else{
						echo   "<script language='javascript'>alert('You have been registered');
						window.location='".base_url()."'</script>";
					}
		}else{
			redirect('/','refresh');
			//echo "error 0";
		}
	}
}
