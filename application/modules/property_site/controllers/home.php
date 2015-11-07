<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

  	function __construct()
    {
        parent::__construct();
        $this->load->model(array('ipapa','mhomebase'));
    }

	public function index(){
		$data['option_country'] = $this->mhomebase->getcity();
		$data['randomizer'] = $this->ipapa->randomBuilding();
		$sata['buildings'] = $this->ipapa->getBuildingAdmin();

		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/home',$data);
		$this->load->view('ipapa/frontpage/footer',$sata);
	}

	function select_kecamatan()
	{
		if('IS_AJAX'){
			$data['option_province'] = $this->mhomebase->getkecamatan();
			$this->load->view('ipapa/asu/selectkecamatan',$data);
			//$data = $_POST;

			//echo "<pre>";
			//die(print_r($data, TRUE));
			//echo "Melon";
		}
	}

	function select_kelurahan()
	{
		if('IS_AJAX'){
			$data['option_city'] = $this->mhomebase->getkelurahan();
			$this->load->view('ipapa/asu/selectkelurahan',$data);
		}
	}

	function sitemap(){
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/sitemap');
		$this->load->view('ipapa/frontpage/footer');

		
	}
}