<?php defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH.'/libraries/REST_Controller.php';

class Ipapa extends CI_Controller
{

  	function __construct()
    {
        parent::__construct();
        $this->load->model('mrestfull');
    }

    function building()
    {
        $data = $this->mrestfull->getBuildingList();

        $this->output//->header("Access-Control-Allow-Origin:'*' ")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }
}