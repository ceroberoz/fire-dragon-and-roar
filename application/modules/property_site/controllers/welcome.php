<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct()
	{
		parent::__construct();
		
		
		$this->load->model('Facebook_model');
	}
	//public function index()
	//{
		//$this->load->view('welcome_message');
		//$data['groups'] = $this->ion_auth->get_users_groups('3')->row();

		//$this->load->view('ipapa/admin/login');

		//$this->load->model('ipapa');
		//$data['images'] = $this->ipapa->getDescOfficeImages(); 

		//$this->load->model('dummy');
		//$data['666'] = $this->dummy->derp();
		//$this->load->view('welcome',$data);
		//echo "<pre>";
		//die(print_r($data, TRUE));
	//}
	
	function index()
    {
        $this->load->library('Facebook');
        $user = null;
        $user_profile = null;
 
        // See if there is a user from a cookie
        $user = $this->facebook->getUser();
 
        if ($user) {
          try {
            // Proceed knowing you have a logged in user who's authenticated.
            $user_profile = $this->facebook->api('/me');
          } catch (FacebookApiException $e) {
            show_error(print_r($e, TRUE), 500);
          }
        }
 
        $this->data['facebook'] = $this->facebook;
        $this->data['user'] = $user;
        $this->data['user_profile'] = $user_profile;
 
        $this->load->view('welcome_message', $this->data);
    }
	
	function facebook()
	{
		$fb_data = $this->session->userdata('fb_data');

		$data = array(
					'fb_data' => $fb_data,
					);
		
		$this->load->view('welcome', $data);
	}

	function topsecret()
	{
		$fb_data = $this->session->userdata('fb_data');
		
		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			redirect('welcome');
		}
		else
		{
			$data = array(
						'fb_data' => $fb_data,
						);
			
			$this->load->view('topsecret', $data);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */