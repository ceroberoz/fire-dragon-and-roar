<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Madvancesearch extends CI_Model
{
	function getMapCenter()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$this->db->select('s_lat,s_lng')
				 ->from('default_cities')
				 ->where('id',$cid)
				 ->group_by('id');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function searchByKeywords()
	{
		$keywords = $this->input->post('s_keywords');

		$bank = $this->input->post('f_bank');
		$minimarket = $this->input->post('f_mini_market');
		$canteen = $this->input->post('f_canteen');
		$musholla = $this->input->post('f_musholla');
		$functionhall = $this->input->post('f_function_hall');
		$foodcourt = $this->input->post('f_food_court');
		$mall = $this->input->post('f_mall');
		$healthclinic = $this->input->post('f_health_clinic');
		$moneychanger = $this->input->post('f_money_changer');
		$meetingroom = $this->input->post('f_meeting_room');
		$penthouse = $this->input->post('f_penthouse');
		$apartement = $this->input->post('f_apartement');
		$postoffice = $this->input->post('f_post_office');
		$businesscenter = $this->input->post('f_business_center');
		$bar = $this->input->post('f_bar');
		$bakery = $this->input->post('f_bakery');
		$photogallery = $this->input->post('f_photo_gallery');
		$cafe = $this->input->post('f_cafe');
		$multifunction = $this->input->post('f_multi_function');

		if($bank OR $minimarket OR $canteen OR $musholla OR $functionhall OR $foodcourt OR $mall OR $healthclinic OR $moneychanger OR $meetingroom OR $penthouse OR $apartement OR $postoffice OR $businesscenter OR $bar OR $bakery OR $photogallery OR $cafe OR $multifunction){
			// function if any condition checked
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_building_name',$keywords)

				 ->like('b_bank',$bank)
				 ->like('b_mini_market',$bank)
				 ->like('b_canteen',$canteen)
				 ->like('b_musholla',$musholla)
				 ->like('b_function_hall',$functionhall)
				 ->like('b_food_court',$foodcourt)
				 ->like('b_mall',$mall)
				 ->like('b_health_clinic',$healthclinic)
				 ->like('b_money_changer',$moneychanger)
				 ->like('b_meeting_room',$meetingroom)
				 ->like('b_penthouse',$penthouse)
				 ->like('b_apartement',$apartement)
				 ->like('b_post_office',$postoffice)
				 ->like('b_business_center',$businesscenter)
				 ->like('b_bar',$bar)
				 ->like('b_bakery',$bakery)
				 ->like('b_photo_gallery',$photogallery)
				 ->like('b_cafe',$cafe)
				 ->like('b_multi_function_room',$multifunction)

				 ->or_like('s_location',$keywords)
				 ->or_like('s_city',$keywords)
				 ->or_like('s_kecamatan',$keywords)
				 ->or_like('s_kelurahan',$keywords)
				  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}else{
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_building_name',$keywords)
				 ->or_like('s_location',$keywords)
				 ->or_like('s_city',$keywords)
				 ->or_like('s_kecamatan',$keywords)
				 ->or_like('s_kelurahan',$keywords)
				  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getsearchByKeywordsCount()
	{
		$keywords = $this->input->post('s_keywords');
		
		$query = $this->db->like('s_building_name',$keywords)
		 ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)
						  ->from('building')
				     	  ->count_all_results();

		return $query;

	}

	function searchByKeywordsAndCity()
	{
		$keywords = $this->input->post('s_keywords');

		$bank = $this->input->post('f_bank');
		$minimarket = $this->input->post('f_mini_market');
		$canteen = $this->input->post('f_canteen');
		$musholla = $this->input->post('f_musholla');
		$functionhall = $this->input->post('f_function_hall');
		$foodcourt = $this->input->post('f_food_court');
		$mall = $this->input->post('f_mall');
		$healthclinic = $this->input->post('f_health_clinic');
		$moneychanger = $this->input->post('f_money_changer');
		$meetingroom = $this->input->post('f_meeting_room');
		$penthouse = $this->input->post('f_penthouse');
		$apartement = $this->input->post('f_apartement');
		$postoffice = $this->input->post('f_post_office');
		$businesscenter = $this->input->post('f_business_center');
		$bar = $this->input->post('f_bar');
		$bakery = $this->input->post('f_bakery');
		$photogallery = $this->input->post('f_photo_gallery');
		$cafe = $this->input->post('f_cafe');
		$multifunction = $this->input->post('f_multi_function');

		// get city name
		$cid = $this->input->post('country_id');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$alpha = $this->db->get();
		$melon = $alpha->row()->name;

		// start query
		if($bank OR $minimarket OR $canteen OR $musholla OR $functionhall OR $foodcourt OR $mall OR $healthclinic OR $moneychanger OR $meetingroom OR $penthouse OR $apartement OR $postoffice OR $businesscenter OR $bar OR $bakery OR $photogallery OR $cafe OR $multifunction){
			// function if any condition checked
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_building_name',$keywords)
				 ->like('s_city',$melon)

				 ->like('b_bank',$bank)
				 ->like('b_mini_market',$bank)
				 ->like('b_canteen',$canteen)
				 ->like('b_musholla',$musholla)
				 ->like('b_function_hall',$functionhall)
				 ->like('b_food_court',$foodcourt)
				 ->like('b_mall',$mall)
				 ->like('b_health_clinic',$healthclinic)
				 ->like('b_money_changer',$moneychanger)
				 ->like('b_meeting_room',$meetingroom)
				 ->like('b_penthouse',$penthouse)
				 ->like('b_apartement',$apartement)
				 ->like('b_post_office',$postoffice)
				 ->like('b_business_center',$businesscenter)
				 ->like('b_bar',$bar)
				 ->like('b_bakery',$bakery)
				 ->like('b_photo_gallery',$photogallery)
				 ->like('b_cafe',$cafe)
				 ->like('b_multi_function_room',$multifunction)

				  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)
				 //->or_like('s_location',$keywords)
				 //->or_like('s_city',$keywords)
				 //->or_like('s_kecamatan',$keywords)
				 //->or_like('s_kelurahan',$keywords)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}else{
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_building_name',$keywords)
				 ->like('s_city',$melon)
				  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)
				 //->or_like('s_location',$keywords)
				 //->or_like('s_city',$keywords)
				 //->or_like('s_kecamatan',$keywords)
				 //->or_like('s_kelurahan',$keywords)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getsearchByKeywordsAndCityCount()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$query = $this->db->get();
		$melon = $query->row()->name;

		$keywords = $this->input->post('s_keywords');
		
		$query = $this->db->like('s_building_name',$keywords)
						 ->like('s_city',$melon)
						 ->or_like('s_location',$keywords)
						 ->or_like('s_city',$keywords)
						 ->or_like('s_kecamatan',$keywords)
						 ->or_like('s_kelurahan',$keywords)
						  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)
						  ->from('building')
				     	  ->count_all_results();

		return $query;

	}

	function searchByCity()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$bank = $this->input->post('f_bank');
		$minimarket = $this->input->post('f_mini_market');
		$canteen = $this->input->post('f_canteen');
		$musholla = $this->input->post('f_musholla');
		$functionhall = $this->input->post('f_function_hall');
		$foodcourt = $this->input->post('f_food_court');
		$mall = $this->input->post('f_mall');
		$healthclinic = $this->input->post('f_health_clinic');
		$moneychanger = $this->input->post('f_money_changer');
		$meetingroom = $this->input->post('f_meeting_room');
		$penthouse = $this->input->post('f_penthouse');
		$apartement = $this->input->post('f_apartement');
		$postoffice = $this->input->post('f_post_office');
		$businesscenter = $this->input->post('f_business_center');
		$bar = $this->input->post('f_bar');
		$bakery = $this->input->post('f_bakery');
		$photogallery = $this->input->post('f_photo_gallery');
		$cafe = $this->input->post('f_cafe');
		$multifunction = $this->input->post('f_multi_function');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$query = $this->db->get();
		$melon = $query->row()->name;

		// start query
		if($bank OR $minimarket OR $canteen OR $musholla OR $functionhall OR $foodcourt OR $mall OR $healthclinic OR $moneychanger OR $meetingroom OR $penthouse OR $apartement OR $postoffice OR $businesscenter OR $bar OR $bakery OR $photogallery OR $cafe OR $multifunction){
			// function if any condition checked
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_city',$melon)

				  ->like('b_bank',$bank)
				 ->like('b_mini_market',$bank)
				 ->like('b_canteen',$canteen)
				 ->like('b_musholla',$musholla)
				 ->like('b_function_hall',$functionhall)
				 ->like('b_food_court',$foodcourt)
				 ->like('b_mall',$mall)
				 ->like('b_health_clinic',$healthclinic)
				 ->like('b_money_changer',$moneychanger)
				 ->like('b_meeting_room',$meetingroom)
				 ->like('b_penthouse',$penthouse)
				 ->like('b_apartement',$apartement)
				 ->like('b_post_office',$postoffice)
				 ->like('b_business_center',$businesscenter)
				 ->like('b_bar',$bar)
				 ->like('b_bakery',$bakery)
				 ->like('b_photo_gallery',$photogallery)
				 ->like('b_cafe',$cafe)
				 ->like('b_multi_function_room',$multifunction)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}else{
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_city',$melon)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}
		

		$query2 = $this->db->get();

		if($query2->num_rows() > 0){
			return $query2->result();
		}
		else{
			return array();
		}
	}

	function getsearchByCityCount()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$query = $this->db->get();
		$melon = $query->row()->name;
		
		$query = $this->db->like('s_city',$melon)
						  ->from('building')
				     	  ->count_all_results();

		return $query;

	}

	function searchByKeywordsCityAndSubDistrict()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$bank = $this->input->post('f_bank');
		$minimarket = $this->input->post('f_mini_market');
		$canteen = $this->input->post('f_canteen');
		$musholla = $this->input->post('f_musholla');
		$functionhall = $this->input->post('f_function_hall');
		$foodcourt = $this->input->post('f_food_court');
		$mall = $this->input->post('f_mall');
		$healthclinic = $this->input->post('f_health_clinic');
		$moneychanger = $this->input->post('f_money_changer');
		$meetingroom = $this->input->post('f_meeting_room');
		$penthouse = $this->input->post('f_penthouse');
		$apartement = $this->input->post('f_apartement');
		$postoffice = $this->input->post('f_post_office');
		$businesscenter = $this->input->post('f_business_center');
		$bar = $this->input->post('f_bar');
		$bakery = $this->input->post('f_bakery');
		$photogallery = $this->input->post('f_photo_gallery');
		$cafe = $this->input->post('f_cafe');
		$multifunction = $this->input->post('f_multi_function');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$alpha = $this->db->get();
		$melon = $alpha->row()->name;

		// get sub district name
		$sid = $this->input->post('province_id');

		$this->db->select('name')
				 ->from('default_kecamatan')
				 ->where('id',$sid);

		$beta = $this->db->get();
		$coconut = $beta->row()->name;

		// start query
		$keywords = $this->input->post('s_keywords');

		if($bank OR $minimarket OR $canteen OR $musholla OR $functionhall OR $foodcourt OR $mall OR $healthclinic OR $moneychanger OR $meetingroom OR $penthouse OR $apartement OR $postoffice OR $businesscenter OR $bar OR $bakery OR $photogallery OR $cafe OR $multifunction){
			// function if any condition checked
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_building_name',$keywords)
				 ->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)	
				 ->like('b_bank',$bank)
				 ->like('b_mini_market',$bank)
				 ->like('b_canteen',$canteen)
				 ->like('b_musholla',$musholla)
				 ->like('b_function_hall',$functionhall)
				 ->like('b_food_court',$foodcourt)
				 ->like('b_mall',$mall)
				 ->like('b_health_clinic',$healthclinic)
				 ->like('b_money_changer',$moneychanger)
				 ->like('b_meeting_room',$meetingroom)
				 ->like('b_penthouse',$penthouse)
				 ->like('b_apartement',$apartement)
				 ->like('b_post_office',$postoffice)
				 ->like('b_business_center',$businesscenter)
				 ->like('b_bar',$bar)
				 ->like('b_bakery',$bakery)
				 ->like('b_photo_gallery',$photogallery)
				 ->like('b_cafe',$cafe)
				 ->like('b_multi_function_room',$multifunction)

				 ->or_like('s_location',$keywords)
				 ->or_like('s_city',$keywords)
				 ->or_like('s_kecamatan',$keywords)
				 ->or_like('s_kelurahan',$keywords)
				  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)			 
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}else{
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_building_name',$keywords)
				 ->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)	

				 ->or_like('s_location',$keywords)
				 ->or_like('s_city',$keywords)
				 ->or_like('s_kecamatan',$keywords)
				 ->or_like('s_kelurahan',$keywords)
				  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)			 
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getByKeywordsCityAndSubDistrictCount()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$alpha = $this->db->get();
		$melon = $alpha->row()->name;

		// get sub district name
		$sid = $this->input->post('province_id');

		$this->db->select('name')
				 ->from('default_kecamatan')
				 ->where('id',$sid);

		$beta = $this->db->get();
		$coconut = $beta->row()->name;

		// start query
		$keywords = $this->input->post('s_keywords');
		
		$query = $this->db->like('s_building_name',$keywords)
				 ->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)	
				 ->or_like('s_location',$keywords)
				 ->or_like('s_city',$keywords)
				 ->or_like('s_kecamatan',$keywords)
				 ->or_like('s_kelurahan',$keywords)	
				  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)
						  ->from('building')
				     	  ->count_all_results();

		return $query;

	}

	function searchByCityAndSubDistrict()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$bank = $this->input->post('f_bank');
		$minimarket = $this->input->post('f_mini_market');
		$canteen = $this->input->post('f_canteen');
		$musholla = $this->input->post('f_musholla');
		$functionhall = $this->input->post('f_function_hall');
		$foodcourt = $this->input->post('f_food_court');
		$mall = $this->input->post('f_mall');
		$healthclinic = $this->input->post('f_health_clinic');
		$moneychanger = $this->input->post('f_money_changer');
		$meetingroom = $this->input->post('f_meeting_room');
		$penthouse = $this->input->post('f_penthouse');
		$apartement = $this->input->post('f_apartement');
		$postoffice = $this->input->post('f_post_office');
		$businesscenter = $this->input->post('f_business_center');
		$bar = $this->input->post('f_bar');
		$bakery = $this->input->post('f_bakery');
		$photogallery = $this->input->post('f_photo_gallery');
		$cafe = $this->input->post('f_cafe');
		$multifunction = $this->input->post('f_multi_function');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$alpha = $this->db->get();
		$melon = $alpha->row()->name;

		// get sub district name
		$sid = $this->input->post('province_id');

		$this->db->select('name')
				 ->from('default_kecamatan')
				 ->where('id',$sid);

		$beta = $this->db->get();
		$coconut = $beta->row()->name;

		// start query
		if($bank OR $minimarket OR $canteen OR $musholla OR $functionhall OR $foodcourt OR $mall OR $healthclinic OR $moneychanger OR $meetingroom OR $penthouse OR $apartement OR $postoffice OR $businesscenter OR $bar OR $bakery OR $photogallery OR $cafe OR $multifunction){
			// function if any condition checked
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)
				 ->like('b_bank',$bank)
				 ->like('b_mini_market',$bank)
				 ->like('b_canteen',$canteen)
				 ->like('b_musholla',$musholla)
				 ->like('b_function_hall',$functionhall)
				 ->like('b_food_court',$foodcourt)
				 ->like('b_mall',$mall)
				 ->like('b_health_clinic',$healthclinic)
				 ->like('b_money_changer',$moneychanger)
				 ->like('b_meeting_room',$meetingroom)
				 ->like('b_penthouse',$penthouse)
				 ->like('b_apartement',$apartement)
				 ->like('b_post_office',$postoffice)
				 ->like('b_business_center',$businesscenter)
				 ->like('b_bar',$bar)
				 ->like('b_bakery',$bakery)
				 ->like('b_photo_gallery',$photogallery)
				 ->like('b_cafe',$cafe)
				 ->like('b_multi_function_room',$multifunction)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}else{
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getsearchByCityAndSubDistrictCount()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$alpha = $this->db->get();
		$melon = $alpha->row()->name;

		// get sub district name
		$sid = $this->input->post('province_id');

		$this->db->select('name')
				 ->from('default_kecamatan')
				 ->where('id',$sid);

		$beta = $this->db->get();
		$coconut = $beta->row()->name;
		
		$query = $this->db->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)
						  ->from('building')
				     	  ->count_all_results();

		return $query;

	}

	function searchByKeywordsCitySubDistrictAndArea()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$bank = $this->input->post('f_bank');
		$minimarket = $this->input->post('f_mini_market');
		$canteen = $this->input->post('f_canteen');
		$musholla = $this->input->post('f_musholla');
		$functionhall = $this->input->post('f_function_hall');
		$foodcourt = $this->input->post('f_food_court');
		$mall = $this->input->post('f_mall');
		$healthclinic = $this->input->post('f_health_clinic');
		$moneychanger = $this->input->post('f_money_changer');
		$meetingroom = $this->input->post('f_meeting_room');
		$penthouse = $this->input->post('f_penthouse');
		$apartement = $this->input->post('f_apartement');
		$postoffice = $this->input->post('f_post_office');
		$businesscenter = $this->input->post('f_business_center');
		$bar = $this->input->post('f_bar');
		$bakery = $this->input->post('f_bakery');
		$photogallery = $this->input->post('f_photo_gallery');
		$cafe = $this->input->post('f_cafe');
		$multifunction = $this->input->post('f_multi_function');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$alpha = $this->db->get();
		$melon = $alpha->row()->name;

		// get sub district name
		$sid = $this->input->post('province_id');

		$this->db->select('name')
				 ->from('default_kecamatan')
				 ->where('id',$sid);

		$beta = $this->db->get();
		$coconut = $beta->row()->name;

		// get sub district name
		$aid = $this->input->post('city_id');

		$this->db->select('name')
				 ->from('default_kelurahan')
				 ->where('id',$sid);

		$charlie = $this->db->get();
		$orange = $charlie->row()->name;

		// start query
		$keywords = $this->input->post('s_keywords');

		if($bank OR $minimarket OR $canteen OR $musholla OR $functionhall OR $foodcourt OR $mall OR $healthclinic OR $moneychanger OR $meetingroom OR $penthouse OR $apartement OR $postoffice OR $businesscenter OR $bar OR $bakery OR $photogallery OR $cafe OR $multifunction){
			// function if any condition checked
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_building_name',$keywords)
				 ->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)
				 ->like('s_kelurahan',$orange)
				 ->like('b_bank',$bank)
				 ->like('b_mini_market',$bank)
				 ->like('b_canteen',$canteen)
				 ->like('b_musholla',$musholla)
				 ->like('b_function_hall',$functionhall)
				 ->like('b_food_court',$foodcourt)
				 ->like('b_mall',$mall)
				 ->like('b_health_clinic',$healthclinic)
				 ->like('b_money_changer',$moneychanger)
				 ->like('b_meeting_room',$meetingroom)
				 ->like('b_penthouse',$penthouse)
				 ->like('b_apartement',$apartement)
				 ->like('b_post_office',$postoffice)
				 ->like('b_business_center',$businesscenter)
				 ->like('b_bar',$bar)
				 ->like('b_bakery',$bakery)
				 ->like('b_photo_gallery',$photogallery)
				 ->like('b_cafe',$cafe)
				 ->like('b_multi_function_room',$multifunction)
				 ->or_like('s_location',$keywords)
				 ->or_like('s_city',$keywords)
				 ->or_like('s_kecamatan',$keywords)
				 ->or_like('s_kelurahan',$keywords)
				  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}else{
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_building_name',$keywords)
				 ->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)
				 ->like('s_kelurahan',$orange)
				 ->or_like('s_location',$keywords)
				 ->or_like('s_city',$keywords)
				 ->or_like('s_kecamatan',$keywords)
				 ->or_like('s_kelurahan',$keywords)
				  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}
		

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}


	function getsearchByKeywordsCitySubDistrictAndAreaCount()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$alpha = $this->db->get();
		$melon = $alpha->row()->name;

		// get sub district name
		$sid = $this->input->post('province_id');

		$this->db->select('name')
				 ->from('default_kecamatan')
				 ->where('id',$sid);

		$beta = $this->db->get();
		$coconut = $beta->row()->name;

		// get sub district name
		$aid = $this->input->post('city_id');

		$this->db->select('name')
				 ->from('default_kelurahan')
				 ->where('id',$sid);

		$charlie = $this->db->get();
		$orange = $charlie->row()->name;

		// start query
		$keywords = $this->input->post('s_keywords');
		
		$query = $this->db->like('s_building_name',$keywords)
				 ->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)
				 ->like('s_kelurahan',$orange)
				 ->or_like('s_location',$keywords)
				 ->or_like('s_city',$keywords)
				 ->or_like('s_kecamatan',$keywords)
				 ->or_like('s_kelurahan',$keywords)
				  ->or_like('s_description_en',$keywords)
				 ->or_like('s_description_id',$keywords)
						  ->from('building')
				     	  ->count_all_results();

		return $query;

	}

		function searchByCitySubDistrictAndArea()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$bank = $this->input->post('f_bank');
		$minimarket = $this->input->post('f_mini_market');
		$canteen = $this->input->post('f_canteen');
		$musholla = $this->input->post('f_musholla');
		$functionhall = $this->input->post('f_function_hall');
		$foodcourt = $this->input->post('f_food_court');
		$mall = $this->input->post('f_mall');
		$healthclinic = $this->input->post('f_health_clinic');
		$moneychanger = $this->input->post('f_money_changer');
		$meetingroom = $this->input->post('f_meeting_room');
		$penthouse = $this->input->post('f_penthouse');
		$apartement = $this->input->post('f_apartement');
		$postoffice = $this->input->post('f_post_office');
		$businesscenter = $this->input->post('f_business_center');
		$bar = $this->input->post('f_bar');
		$bakery = $this->input->post('f_bakery');
		$photogallery = $this->input->post('f_photo_gallery');
		$cafe = $this->input->post('f_cafe');
		$multifunction = $this->input->post('f_multi_function');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$alpha = $this->db->get();
		$melon = $alpha->row()->name;

		// get sub district name
		$sid = $this->input->post('province_id');

		$this->db->select('name')
				 ->from('default_kecamatan')
				 ->where('id',$sid);

		$beta = $this->db->get();
		$coconut = $beta->row()->name;

		// get sub district name
		$aid = $this->input->post('city_id');

		$this->db->select('name')
				 ->from('default_kelurahan')
				 ->where('id',$aid);

		$charlie = $this->db->get();
		$orange = $charlie->row()->name;

		// start query
		if($bank OR $minimarket OR $canteen OR $musholla OR $functionhall OR $foodcourt OR $mall OR $healthclinic OR $moneychanger OR $meetingroom OR $penthouse OR $apartement OR $postoffice OR $businesscenter OR $bar OR $bakery OR $photogallery OR $cafe OR $multifunction){
			// function if any condition checked
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)
				 ->like('s_kelurahan',$orange)
				 ->like('b_bank',$bank)
				 ->like('b_mini_market',$bank)
				 ->like('b_canteen',$canteen)
				 ->like('b_musholla',$musholla)
				 ->like('b_function_hall',$functionhall)
				 ->like('b_food_court',$foodcourt)
				 ->like('b_mall',$mall)
				 ->like('b_health_clinic',$healthclinic)
				 ->like('b_money_changer',$moneychanger)
				 ->like('b_meeting_room',$meetingroom)
				 ->like('b_penthouse',$penthouse)
				 ->like('b_apartement',$apartement)
				 ->like('b_post_office',$postoffice)
				 ->like('b_business_center',$businesscenter)
				 ->like('b_bar',$bar)
				 ->like('b_bakery',$bakery)
				 ->like('b_photo_gallery',$photogallery)
				 ->like('b_cafe',$cafe)
				 ->like('b_multi_function_room',$multifunction)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}else{
			$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)
				 ->like('s_kelurahan',$orange)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');
		}
		

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getsearchByCitySubDistrictAndAreaCount()
	{
		// get city name
		$cid = $this->input->post('country_id');

		$this->db->select('name')
				 ->from('default_cities')
				 ->where('id',$cid);

		$alpha = $this->db->get();
		$melon = $alpha->row()->name;

		// get sub district name
		$sid = $this->input->post('province_id');

		$this->db->select('name')
				 ->from('default_kecamatan')
				 ->where('id',$sid);

		$beta = $this->db->get();
		$coconut = $beta->row()->name;

		// get sub district name
		$aid = $this->input->post('city_id');

		$this->db->select('name')
				 ->from('default_kelurahan')
				 ->where('id',$aid);

		$charlie = $this->db->get();
		$orange = $charlie->row()->name;
		
		$query = $this->db->like('s_city',$melon)
				 ->like('s_kecamatan',$coconut)
				 ->like('s_kelurahan',$orange)
						  ->from('building')
				     	  ->count_all_results();

		return $query;

	}
}