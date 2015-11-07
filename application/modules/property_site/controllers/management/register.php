<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	function index(){

		$this->form_validation->set_rules('identity', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$email 	  = $this->input->post('identity');
		if($this->form_validation->run() == TRUE){
			if(!$this->ion_auth->email_check($email)){
				$username = $this->input->post('identity');
				$password = $this->input->post('password');

				$additional_data = array(
					'first_name' => '',
					'last_name'	 => ''
					);



				$this->ion_auth->register($username, $password, $email, $additional_data);

                $group = array('2');
                // add group
				$this->db->select('users.id')
					 ->from('users')
					 ->where('email',$email);

				$uid 	= $this->db->get()->row()->id;
				$group 	= "2"; //$this->input->post('level');

				$data = array(
					'user_id'	=> $uid,
					'group_id' 	=> $group
					);
				$this->db->insert('users_groups',$data);

				//$this->load->view('ipapa/frontpage/success');
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
