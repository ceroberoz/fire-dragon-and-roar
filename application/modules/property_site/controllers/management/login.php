<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->view('ipapa/bm_login/index');
	}

	//log the user in
	function login()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				//redirect('/', 'refresh');
				$user_group = $this->ion_auth->get_users_groups()->row();
				redirect($user_group->name.'/home');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('management/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->_render_page('management/login', $this->data);
		}
	}

	function register(){

		$this->form_validation->set_rules('identity', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$username = $this->input->post('identity');
		$password = $this->input->post('password');
		$email 	  = $this->input->post('identity');

		if($this->form_validation->run() == TRUE){
			if(!$this->ion_auth->email_check($email)){
				$additional_data = array(
					'first_name' => '',
					'last_name'	 => ''
					);

				$this->ion_auth->register($username, $password, $email, $additional_data);
				
				//if($this->input->post('level')){
					// add groups
					$this->db->select('users.id')
							 ->from('users')
							 ->where('email',$email);

					$uid 	= $this->db->get()->row()->id;
					$group 	= "2";//$this->input->post('level');

					$data = array(
						'user_id'	=> $uid,
						'group_id' 	=> $group
						);
					$this->db->insert('users_groups',$data);
				//}

				//$this->load->view('ipapa/frontpage/landing');
                 $data['u_input'] = $email;
				$this->load->view('ipapa/frontpage/success',$data);
					}else{
						echo   "<script language='javascript'>alert('You have been registered, please check your email');
						window.location='".base_url()."'</script>";
					}
		}else{
			redirect('/','refresh');
			//echo "error 0";
		}
	}
}
