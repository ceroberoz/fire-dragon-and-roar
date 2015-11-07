<?php defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH.'/libraries/REST_Controller.php';

class Apps extends CI_Controller
{

  	function __construct()
    {
        parent::__construct();
        $this->load->model('mrestfull');
    }

    // START NEAREST

    function nearestios()
    {
        $data = $this->mrestfull->getNearestBuilding();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function nearestmapios()
    {
        $data = $this->mrestfull->getNearestBuilding2();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    // END OF NEAREST

    function office_list()
    {
        $data = $this->mrestfull->getOfficeList();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }


    function buildingsios_u()
    {
        $data = $this->mrestfull->getBuildingListIOS();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }
    

    function buildinglistios()
    {
        $data = $this->mrestfull->getTotalOffice();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function office_images()
    {
        $data = $this->mrestfull->officeImages();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function building()
    {
        $data = $this->mrestfull->getBuildingList();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function info()
    {
        $data = $this->mrestfull->getBuildingInfo();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }
    
    // MISC
    function buildingsios()
    {
        //$this->load->model('dummy');
        
        //$data['office_images'] = $this->dummy->fungsi_model();
        
        //echo "<pre>";
		//die(print_r($data, TRUE));

        $data = $this->mrestfull->dummy();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function login()
    {
        $identity = $this->uri->segment(4);
        $password = $this->uri->segment(5);
        $remember = TRUE;

        if($this->ion_auth->login($identity, $password, $remember))
        {
            $data['data'] = "success";
        }
        else
        {
            $data['data'] = "failed";
        }

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }
}