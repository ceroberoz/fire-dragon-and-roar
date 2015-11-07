<?php
class Chain extends CI_Controller{
function __construct()
{
parent::Controller();
$this->load->model('mChain');
    }
 
    function index(){
        $data['option_country'] = $this->MChain->getcountry();
        $this->load->view('chain/index',$data);
    }
 
    function select_province(){
            if('IS_AJAX') {
            $data['option_province'] = $this->MChain->getprovince();
        $this->load->view('chain/selectprovince',$data);
            }
 
    }
    function select_city(){
            if('IS_AJAX') {
            $data['option_city'] = $this->MChain->getcity();
        $this->load->view('chain/selectcity',$data);
            }
 
    }
 
        function submit(){
            echo "Country ID = ".$this->input->post("country_id");
            echo "
";
            echo "Province ID = ".$this->input->post("province_id");
            echo "
";
            echo "City ID = ".$this->input->post("city_id");
        }
}
?>