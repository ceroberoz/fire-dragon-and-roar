<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myprofile extends Management_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('ipapa');
	}

	function index(){
		$data['users'] = $this->ion_auth->user()->row();

		//echo "<pre>";
		//die(print_r($data, TRUE));

		$this->load->view('ipapa/cpanel/head');
		$this->load->view('ipapa/cpanel/header');
		//$this->load->view('ipapa/cpanel/head');
		//$this->load->view('ipapa/cpanel/topmenu');
		$this->load->view('ipapa/cpanel/leftmenu');
		$this->load->view('ipapa/cpanel/profile',$data);
		$this->load->view('ipapa/cpanel/footer');
	}

	function update_user(){
		

		//$data['avatar'] = $this->upload->data();

		//	echo "<pre>";
		//	die(print_r($data, TRUE));
		
		// update userdata
		$id   = $this->input->post('id');


		$data = array(
			'company'  => $this->input->post('company'),
			'address'  => $this->input->post('address'),
			'phone'	   => $this->input->post('phone'),
			'username' => $this->input->post('username')		
			);

		$this->ion_auth->update($id,$data);

		// update avatar
		$config = array(
            'upload_path' => './uploads/user/avatar/',
            'allowed_types' => 'jpg|jpeg|gif|png',
            'encrypt_name' => TRUE,
            'max_size' => 250	
		);
	
		$this->load->library('upload');
		$this->upload->initialize($config);

		$avatar = "u_avatar";
		$this->upload->do_upload($avatar);

		$melon  = $this->upload->data();
		$apel	= $melon['file_name'];

		//$this->ipapa->updateAvatar();
    	if($apel != ""){
    		$this->ipapa->updateAvatar();
    	}
   

		echo "<script language='javascript'>alert('Profile Updated!');
				 window.location='".base_url()."members/myprofile'</script>";	
	}

	function update_password(){
		$id   = $this->input->post('id');

		$new_password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');
        
        // validation
		if($new_password == $password_confirm){
			$password = $new_password;
            
            $data = array(
			'password' => $password
			);

            $this->ion_auth->update($id,$data);
            //redirect('management/myprofile');
            echo "<script language='javascript'>alert('Profile Updated!');
                     window.location='".base_url()."members/myprofile'</script>";
		}else{
            //redirect('management/myprofile');
            echo "<script language='javascript'>alert('Password Missmatch!');
                     window.location='".base_url()."members/myprofile'</script>";   
        }	
	}

	function redirects(){
		redirect($this->session->userdata('refered_from'));
	}
}