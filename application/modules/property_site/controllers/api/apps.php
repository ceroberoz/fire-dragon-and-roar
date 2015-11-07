<?php defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH.'/libraries/REST_Controller.php';

class Apps extends CI_Controller
{

  	function __construct()
    {
        parent::__construct();
        $this->load->model(array('mrestfull'));
    }

    // IOS CLIENT
    function nearestiosclient()
    {
        $data = $this->mrestfull->getNearestIosClient();
        //$this->mrestfull->logActivity2();
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));

    }


    // UPLOAD

    function loginclient()
    {
        // set keys
        $key = '28347289472389457293754982374823';
        $byteKey= unpack('C*', $key);

        //$string = $_POST['decrypt'];
        //$encryptedByteArray = unpack('C*', $string);

        //$decodedArray = array();
        //for ($i=1; $i < (count($encryptedByteArray) + 1); $i++) {
        //    $decodedChar = $encryptedByteArray[$i] ^ $byteKey[$i];
        //    array_push($decodedArray, $decodedChar);    // push into array
        //}

        // potato

       // $string2 = $_POST['decrypt2'];
        $asu = $_POST['decrypt2'];

        $encryptedByteArray2 = str_replace("\\", '', $asu);

         //unpack('C*', $string2);

        //$decodedArray2 = array();
        //for ($i=1; $i < (count($encryptedByteArray2) + 1); $i++) {
        //    $decodedChar2 = $encryptedByteArray2[$i] ^ $byteKey[$i];
        //    array_push($decodedArray2, $decodedChar2);    // push into array
       // }
        //print_r($decodedArray);

        $data = $encryptedByteArray2;

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode([$data]));

    }

    function upload()
    {
        $id_user = $_POST['id_user'];
        $targetDir = "./uploads/user/avatar/";

        $filename_image1 = basename($_FILES['u_avatar']['name']);

        $targetDirCopy = "./uploads/user/avatar/";

        if($filename_image1 != ""){
            $target_image1 = $targetDir.$filename_image1;
        }

        if (move_uploaded_file($_FILES['u_avatar']['tmp_name'], $target_image1)) {
            //echo '[{"status":"Sukses gan", "id":"' . $id_user . '"}]';

            $data = array('sukses cok');
        } else {
            //echo '[{"status":"Anda belum beruntung, coba lagi gan"}]';
            $data = array('gagal cok');
        }
        

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    // START NEAREST

    function getdetail()
    {
        $data = $this->mrestfull->getBuildingDetail();
        $this->mrestfull->logActivity2();
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function getdetailimages()
    {
        $data = $this->mrestfull->getBuildingImages();
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

     function getdetailoffices()
    {
        $data = $this->mrestfull->getBuildingOffices();
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function search()
    {
        $data = $this->mrestfull->searchByKeywords();

        $input      = $this->uri->segment(6);
        if($input){
            $this->mrestfull->logActivity();
        }
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function markerinfo()
    {
        $data = $this->mrestfull->getmarkerinfo();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

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
    function autocompletename()
    {
        $data = $this->mrestfull->getBuildingName();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

     function autocompletedistrict()
    {
        $data = $this->mrestfull->getBuildingDistrict();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

     function autocompletecity()
    {
        $data = $this->mrestfull->getBuildingCity();

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

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
                     ->set_output(json_encode([$data]));
    }
}