<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends Admin_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','yudhi'));
	}

	function index(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['users'] = $this->ipapa->getUser();
		$data['descBM'] = $this->yudhi->getDescBM();
		$data['descFRU'] = $this->yudhi->getDescFRU();
		$data['descADM'] = $this->yudhi->getDescADM();
		$data['total'] = $this->yudhi->getTotalUser();
		//$data['datas'] = $this->ipapa->getUserData();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/account',$data);

		//echo "<pre>";
		//die(print_r($data, TRUE));
	}

	function add(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		$email = $this->input->post('email');

		if($this->form_validation->run() == TRUE){
			if(!$this->ion_auth->email_check($email)){
				$this->ipapa->addUser();
				redirect('admin/account','refresh');
			}
		}
	}

	function delete(){
		$uid = $this->uri->segment(4);
		$this->ion_auth->delete_user($uid);
		redirect('admin/account','refresh');
	}

	function do_edit(){
        // update avatar
        if($this->input->post('u_avatar')){
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

			$this->ipapa->updateAvatar();
        }

		// update userdata
		$id   = $this->input->post('id');


		$data = array(
			'company'  => $this->input->post('company'),
			'address'  => $this->input->post('address'),
			'phone'	   => $this->input->post('phone'),
			'username' => $this->input->post('username')
			);

		$this->ion_auth->update($id,$data);

        // update password
        $new_password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');

        // validation
		if($new_password == $password_confirm){
			$password = $new_password;

            $data = array(
			'password' => $password
			);

            $this->ion_auth->update($id,$data);
        }
	}

	function edit(){
        $uid = $this->uri->segment(4);
		
		$data['user'] = $this->ipapa->getUserAdmin();
        $data['users'] = $this->ipapa->getUserData($uid);

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/edit_account',$data);
	}

	function activate()
	{
		$id = $this->uri->segment(4);

		$data = array(
			'active' => "1",
			'activation_code' => ""
			);

		$this->ion_auth->update($id,$data);
	}

	function inactive()
	{
		$id = $this->uri->segment(4);
		
		$data = array(
			'active' => "0"
			);

		$this->ion_auth->update($id,$data);
	}
}
