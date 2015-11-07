<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mChain','msearch','madvancesearch','mhomebase','mlogging'));
	}

	public function index(){
		$city['option_province'] = $this->mChain->getprovince();

		$this->load->view('ipapa/id/head');
		$this->load->view('ipapa/id/header');
		$this->load->view('ipapa/id/search-advance',$city);
		$this->load->view('ipapa/id/search-list-default');
		$this->load->view('ipapa/id/footer');
	}

	function test(){
		$data = $_POST;
		echo "<pre>";
		die(print_r($data, TRUE));
	}

	function keyword(){
		$keywords = $this->input->post('s_keywords');
		$city 	  = $this->input->post('country_id');
		$district = $this->input->post('province_id');
		$area 	  = $this->input->post('city_id');
		$radio	  = $this->input->post('tabs');

		$this->mlogging->logsearch($keywords,$city,$district,$area);

		$data['option_country'] = $this->mhomebase->getcity();

		if($keywords OR $city OR $district OR $area)
		{
			if (!$keywords) {
				if ($city != "0") {
					if ($district != "0") {
						if ($area != "0") {
							$data['building'] = $this->madvancesearch->searchByCitySubDistrictAndArea();
							$data['result'] = $this->madvancesearch->getsearchByCitySubDistrictAndAreaCount();
							//echo 'no keywords, with city, district and area';
														
							if($radio=="building") {
								$this->load->view('ipapa/id/head');
								$this->load->view('ipapa/id/header');
								$this->load->view('ipapa/id/search-advance',$data);
								$this->load->view('ipapa/id/search-list-result',$data);
								$this->load->view('ipapa/id/footer');
							}else{
								redirect('id/home','refresh');
								
							}

						}
						else {
							$data['building'] = $this->madvancesearch->searchByCityAndSubDistrict();
							$data['result'] = $this->madvancesearch->getsearchByCityAndSubDistrictCount();
							//echo 'no keywords with city and district';
							if($radio=="building") {
								$this->load->view('ipapa/id/head');
								$this->load->view('ipapa/id/header');
								$this->load->view('ipapa/id/search-advance',$data);
								$this->load->view('ipapa/id/search-list-result',$data);
								$this->load->view('ipapa/id/footer');
							}else{
								redirect('id/home','refresh');
							
							}
						}						
					}
					else {
						$data['building'] = $this->madvancesearch->searchByCity();
						$data['result'] = $this->madvancesearch->getsearchByCityCount();
						//echo 'no keyword and city only';
						if($radio=="building") {
							$this->load->view('ipapa/id/head');
							$this->load->view('ipapa/id/header');
							$this->load->view('ipapa/id/search-advance',$data);
							$this->load->view('ipapa/id/search-list-result',$data);
							$this->load->view('ipapa/id/footer');
						}else{
							redirect('id/home','refresh');
						}
					}
				}
			}
			else {
				if ($city != "0") {
					if ($district != "0") {
						if ($area != "0") {
							$data['building'] = $this->madvancesearch->searchByKeywordsCitySubDistrictAndArea();
							$data['result'] = $this->madvancesearch->getsearchByKeywordsCitySubDistrictAndAreaCount();
							//echo 'keywords, with city, district and area';
							if($radio=="building") {
								$this->load->view('ipapa/id/head');
								$this->load->view('ipapa/id/header');
								$this->load->view('ipapa/id/search-advance',$data);
								$this->load->view('ipapa/id/search-list-result',$data);
								$this->load->view('ipapa/id/footer');
							}else{
								redirect('id/home','refresh');	
							}
						}
						else {
							$data['total']	= $this->madvancesearch->getByKeywordsCityAndSubDistrictCount();
							$data['building'] = $this->madvancesearch->searchByKeywordsCityAndSubDistrict();
							//echo 'keywords with city and district';
							if($radio=="building") {
								$this->load->view('ipapa/id/head');
								$this->load->view('ipapa/id/header');
								$this->load->view('ipapa/id/search-advance',$data);
								$this->load->view('ipapa/id/search-list-result',$data);
								$this->load->view('ipapa/id/footer');
							}else{
								redirect('id/home','refresh');		
							}
						}						
					}
					else {
						$data['building'] = $this->madvancesearch->searchByKeywordsAndCity();
						$data['result'] = $this->madvancesearch->getsearchByKeywordsAndCityCount();
						//echo 'keyword and city only';
						if($radio=="building") {
							$this->load->view('ipapa/id/head');
							$this->load->view('ipapa/id/header');
							$this->load->view('ipapa/id/search-advance',$data);
							$this->load->view('ipapa/id/search-list-result',$data);
							$this->load->view('ipapa/id/footer');
						}else{
							redirect('id/home','refresh');	
			
						}
					}
				}
				else {
					$data['building'] = $this->madvancesearch->searchByKeywords();
					$data['result'] = $this->madvancesearch->getsearchByKeywordsCount();
					//echo 'keywords only';
					if($radio=="building") {
						$this->load->view('ipapa/id/head');
						$this->load->view('ipapa/id/header');
						$this->load->view('ipapa/id/search-advance',$data);
						$this->load->view('ipapa/id/search-list-result',$data);
						$this->load->view('ipapa/id/footer');
					}else{
						redirect('id/home','refresh');		
						
					}
				}	
			}
		}
		else
		{
			if($radio == "building"){
				//redirect('id/building','refresh');
				echo   "<script language='javascript'>alert('Anda belum memasukan kata pencarian');
						window.location='".base_url()."id/building'</script>";
			}else{
				redirect('building/map','refresh');
			}

			//redirect('building','refresh');
			//echo "tidak ada input";
		}
	}
	
	function map(){
		$keywords = $this->input->post('s_keywords');
		$city 	  = $this->input->post('country_id');
		$district = $this->input->post('province_id');
		$area 	  = $this->input->post('city_id');
		
		$data['option_province']  = $this->mChain->getprovince();
		$data['option_country']	  = $this->mhomebase->getcity();
		$data['buildings'] 		  = $this->ipapa->getBuildingAdmin();
		$data['center'] 		  = $this->madvancesearch->getMapCenter();
		
		if($keywords OR $city OR $district OR $area)
		{
			if (!$keywords) {
				if ($city != "0") {
					if ($district != "0") {
						if ($area != "0") {
							$data['result'] = $this->madvancesearch->searchByCitySubDistrictAndArea();
							//echo 'no keywords, with city, district and area';
														
							$this->load->view('ipapa/frontpage/head');
							//$this->load->view('ipapa/frontpage/header');
							$this->load->view('ipapa/frontpage/search-advance-map',$data);
							$this->load->view('ipapa/frontpage/search-map-result',$data);
							//$this->load->view('ipapa/frontpage/footer');

						}
						else {
							$data['result'] = $this->madvancesearch->searchByCityAndSubDistrict();
							//echo 'no keywords with city and district';
							$this->load->view('ipapa/frontpage/head');
							//$this->load->view('ipapa/frontpage/header');
							$this->load->view('ipapa/frontpage/search-advance-map',$data);
							$this->load->view('ipapa/frontpage/search-map-result',$data);
							//$this->load->view('ipapa/frontpage/footer');
						}						
					}
					else {
						$data['result'] = $this->madvancesearch->searchByCity();
						//echo 'no keyword and city only';
						$this->load->view('ipapa/frontpage/head');
						//$this->load->view('ipapa/frontpage/header');
						$this->load->view('ipapa/frontpage/search-advance-map',$data);
						$this->load->view('ipapa/frontpage/search-map-result',$data);
						//$this->load->view('ipapa/frontpage/footer');
					}
				}
			}
			else {
				if ($city != "0") {
					if ($district != "0") {
						if ($area != "0") {
							$data['total']	= $this->madvancesearch->getsearchByKeywordsCount();
							$data['result'] = $this->madvancesearch->searchByKeywordsCitySubDistrictAndArea();
							//echo 'keywords, with city, district and area';
							$this->load->view('ipapa/frontpage/head');
							//$this->load->view('ipapa/frontpage/header');
							$this->load->view('ipapa/frontpage/search-advance-map',$data);
							$this->load->view('ipapa/frontpage/search-map-result',$data);
							//$this->load->view('ipapa/frontpage/footer');
						}
						else {
							$data['result'] = $this->madvancesearch->searchByKeywordsCityAndSubDistrict();
							//echo 'keywords with city and district';
							$this->load->view('ipapa/frontpage/head');
							//$this->load->view('ipapa/frontpage/header');
							$this->load->view('ipapa/frontpage/search-advance-map',$data);
							$this->load->view('ipapa/frontpage/search-map-result',$data);
							//$this->load->view('ipapa/frontpage/footer');
						}						
					}
					else {
						$data['result'] = $this->madvancesearch->searchByKeywordsAndCity();
						//echo 'keyword and city only';
						$this->load->view('ipapa/frontpage/head');
						//$this->load->view('ipapa/frontpage/header');
						$this->load->view('ipapa/frontpage/search-advance-map',$data);
						$this->load->view('ipapa/frontpage/search-map-result',$data);
						//$this->load->view('ipapa/frontpage/footer');
					}
				}
				else {
					$data['result'] = $this->madvancesearch->searchByKeywords();
					//echo 'keywords only';
					$this->load->view('ipapa/frontpage/head');
					//$this->load->view('ipapa/frontpage/header');
					$this->load->view('ipapa/frontpage/search-advance-map',$data);
					$this->load->view('ipapa/frontpage/search-map-result',$data);
					//$this->load->view('ipapa/frontpage/footer');
				}	
			}
		}
		else
		{
			redirect('building/map','refresh');
			//echo "tidak ada input";
			//echo   "<script language='javascript'>alert('Anda belum memasukan kata pencarian');
			//			window.location='".base_url()."id/building/map'</script>";
			
			
		}
	}
	
	function redirects(){
		redirect($this->session->userdata('refered_from'));
	}

	function do_search(){

		$data['option_country'] = $this->mhomebase->getcity();

		//$city['option_province'] = $this->mChain->getprovince();
		$data['building'] = $this->msearch->doSearch();

		$this->load->view('ipapa/id/head');
		$this->load->view('ipapa/id/header');
		$this->load->view('ipapa/id/search-advance',$data);
		$this->load->view('ipapa/id/search-list-result',$data);
		$this->load->view('ipapa/id/footer');
	}

	function do_search_front(){
		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'id/building/index';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 4;
	    $config['per_page'] = 9;
	    //$config['num_links'] = 5;

	    $config['full_tag_open'] = '<div class="pagination_wrapper clearfix">
                                  <ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div>';
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;
	    
	    $this->pagination->initialize($config); 

	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	    $data['pagination'] = $this->pagination->create_links();

$data['option_country'] = $this->mhomebase->getcity();
		//$city['option_province'] = $this->mChain->getprovince();
		$data['building'] = $this->msearch->frontSearch($config['per_page'],$page);
		
		$radio	= $this->input->post('tabs');
		if($radio=="building") {
			$this->load->view('ipapa/id/head');
			$this->load->view('ipapa/id/header');
			$this->load->view('ipapa/id/search-advance',$data);
			$this->load->view('ipapa/id/search-list-result',$data);
			$this->load->view('ipapa/id/footer');
		}else{
			redirect('home','refresh');		
		}
	}

	function office_space_in_jakarta()
	{

		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'id/building/index';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 4;
	    $config['per_page'] = 9;
	    //$config['num_links'] = 5;

	    $config['full_tag_open'] = '<div class="pagination_wrapper clearfix">
                                  <ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div>';
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;
	    
	    $this->pagination->initialize($config); 

	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	    $data['pagination'] = $this->pagination->create_links();
		//$city['option_province'] = $this->mChain->getprovince();
		$data['option_country'] = $this->mhomebase->getcity();
		$data['building'] = $this->msearch->ft_office_space_in_jakarta($config['per_page'],$page);

		$this->load->view('ipapa/id/head');
		$this->load->view('ipapa/id/header');
		$this->load->view('ipapa/id/search-advance',$data);
		$this->load->view('ipapa/id/search-list-result',$data);
		$this->load->view('ipapa/id/footer');
	}

	function office_for_lease()
	{

		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'id/building/index';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 4;
	    $config['per_page'] = 9;
	    //$config['num_links'] = 5;

	    $config['full_tag_open'] = '<div class="pagination_wrapper clearfix">
                                  <ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div>';
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;
	    
	    $this->pagination->initialize($config); 

	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	    $data['pagination'] = $this->pagination->create_links();
		//$city['option_province'] = $this->mChain->getprovince();
		$data['option_country'] = $this->mhomebase->getcity();
		$data['building'] = $this->msearch->ft_office_space_in_jakarta($config['per_page'],$page);

		$this->load->view('ipapa/id/head');
		$this->load->view('ipapa/id/header');
		$this->load->view('ipapa/id/search-advance',$data);
		$this->load->view('ipapa/id/search-list-result',$data);
		$this->load->view('ipapa/id/footer');
	}

	function virtual_office_jakarta()
	{

		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'id/building/index';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 4;
	    $config['per_page'] = 9;
	    //$config['num_links'] = 5;

	    $config['full_tag_open'] = '<div class="pagination_wrapper clearfix">
                                  <ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div>';
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;
	    
	    $this->pagination->initialize($config); 

	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	    $data['pagination'] = $this->pagination->create_links();
		//$city['option_province'] = $this->mChain->getprovince();
		$data['option_country'] = $this->mhomebaside->getcity();
		$data['building'] = $this->msearch->ft_office_space_in_jakarta($config['per_page'],$page);

		$this->load->view('ipapa/id/head');
		$this->load->view('ipapa/id/header');
		$this->load->view('ipapa/id/search-advance',$data);
		$this->load->view('ipapa/id/search-list-result',$data);
		$this->load->view('ipapa/id/footer');
	}

	function available_office_space()
	{

		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'id/building/index';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 4;
	    $config['per_page'] = 9;
	    //$config['num_links'] = 5;

	    $config['full_tag_open'] = '<div class="pagination_wrapper clearfix">
                                  <ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div>';
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;
	    
	    $this->pagination->initialize($config); 

	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	    $data['pagination'] = $this->pagination->create_links();
		//$city['option_province'] = $this->mChain->getprovince();
		$data['option_country'] = $this->mhomebase->getcity();
		$data['building'] = $this->msearch->ft_office_space_in_jakarta($config['per_page'],$page);

		$this->load->view('ipapa/id/head');
		$this->load->view('ipapa/id/header');
		$this->load->view('ipapa/id/search-advance',$data);
		$this->load->view('ipapa/id/search-list-result',$data);
		$this->load->view('ipapa/id/footer');
	}

	function office_space_in_sudirman()
	{

		//$this->load->library('pagination');
		$rows = $this->db->get('building');
		//
		$config['base_url'] = base_url().'id/building/index';
		$config['total_rows'] = $rows->num_rows();
		$config['uri_segment'] = 4;
	    $config['per_page'] = 9;
	    //$config['num_links'] = 5;

	    $config['full_tag_open'] = '<div class="pagination_wrapper clearfix">
                                  <ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div>';
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;
	    
	    $this->pagination->initialize($config); 

	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	    $data['pagination'] = $this->pagination->create_links();
	    $data['option_country'] = $this->mhomebase->getcity();
		//$city['option_province'] = $this->mChain->getprovince();
		$data['building'] = $this->msearch->ft_office_space_in_sudirman($config['per_page'],$page);

		$this->load->view('ipapa/id/head');
		$this->load->view('ipapa/id/header');
		$this->load->view('ipapa/id/search-advance',$data);
		$this->load->view('ipapa/id/search-list-result',$data);
		$this->load->view('ipapa/id/footer');
	}
	
	function select_city(){
		if('IS_AJAX'){
			$data['option_city'] = $this->mChain->getcity();
			$this->load->view('ipapa/frontpage/selectcity',$data);
		}
	}
	
	function submit(){
		//echo "Country ID = ".$this->input->post("country_id");
		//echo "";

		echo "Province ID = ".$this->input->post("province_id");
		echo "";

		echo "City ID = ".$this->input->post("city_id");
		echo "";
	}
}