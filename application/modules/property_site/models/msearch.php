<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msearch extends CI_Model{
	// advance search
	function advanceSearch()
	{
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

		$this->db->query(
			"
				SELECT 
					*
				FROM
					building
				WHERE
					(b_bank LIKE %$bank%)
				OR
					(b_mini_market LIKE %$minimarket%)
				OR
					(b_canteen LIKE %$canteen%)	
				OR
					(b_musholla LIKE %$musholla%)
				OR
					(b_function_hall LIKE %$functionhall%)
				OR
					(b_food_court LIKE %$foodcourt%)
				OR
					(b_mall LIKE %$mall%)
				OR
					(b_health_clinic LIKE %$healthclinic%)
				OR
					(b_money_changer LIKE %$moneychanger%)
				OR
					(b_meeting_room LIKE %$meetingroom%)
				OR
					(b_penthouse LIKE %$penthouse%)
				OR
					(b_apartement LIKE %$apartement%)
				OR
					(b_post_office LIKE %$postoffice%)
				OR
					(b_business_center LIKE %$businesscenter%)
				OR
					(b_bar LIKE %$bar%)
				OR
					(b_bakery LIKE %$bakery%)
				OR
					(b_photo_gallery LIKE %$photogallery%)
				OR
					(b_cafe LIKE %$cafe%)
				OR
					(b_multi_function_room LIKE %$multifunction%);

			"
			);
	}


	// SEARCH
	function sessionSearch(){
		$session 	= $this->session->all_userdata();
		$keywords 	= $session['keyword'];
		$city 		= $session['city'];
		$kecamatan	= $session['kecamatan'];
		$kelurahan	= $session['kelurahan'];
		
		$this->db->select('pk_building_id,e_br_currency,t_updated,s_location,f_br_typical,s_province,s_city,s_kecamatan,s_kelurahan,s_building_name,s_description_en,s_description_id,s_picture,b_cafe,b_bank,b_food_court,b_musholla')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->join('default_cities','default_cities.id = building.s_city','LEFT')
				 ->join('default_kecamatan','default_kecamatan.id = building.s_kecamatan','LEFT')
				 ->join('default_kelurahan','default_kelurahan.id = building.s_kelurahan','LEFT')
				 ->like('building.s_building_name',$keywords)
				 ->like('building.s_description_id',$keywords)
				 ->like('building.s_description_en',$keywords)
				 ->where('default_cities.id',$city)
				 ->where('default_kecamatan.id',$kecamatan)
				 ->where('default_kelurahan.id',$kelurahan)
				 ->group_by('building.pk_building_id')
				 ->order_by('building.t_updated','DESC');
				 
		$queryfs = $this->db->get();
		//$queryfs = $this->db->query($q_front);
		//echo $keywords;
		//echo $q_front;
		
		if($queryfs->num_rows() > 0){
			return $queryfs->result();
		}
		else{
			return array();
		}
	}

	//function frontSearch($limit,$start) {
	function frontSearch() {
		$keywords = $this->input->post('s_keywords');
		$province	= $this->input->post('b_province');
		$city 		= $this->input->post('b_city');
		$kelurahan	= $this->input->post('b_kelurahan');
		//mysql_real_escape_string($keywords);
		
		$this->db->select('pk_building_id,e_br_currency,t_updated,s_location,f_br_typical,s_province,s_city,s_kelurahan,s_building_name,s_description_en,s_description_id,s_picture,b_cafe,b_bank,b_food_court,b_musholla')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->join('default_provinces','default_provinces.id = building.s_province','LEFT')
				 ->join('default_cities','default_cities.id = building.s_city','LEFT')
				 ->join('default_kelurahan','default_kelurahan.id = building.s_kelurahan','LEFT')
				 ->like('building.s_building_name',$keywords)
				 ->or_like('building.s_description_id',$keywords)
				 ->or_like('building.s_description_en',$keywords)
				 ->or_like('default_provinces.id',$province)
				 ->or_like('default_cities.id',$city)
				 ->or_like('default_kelurahan.id',$kelurahan)
				 //->limit($limit,$start)
				 ->group_by('building.pk_building_id')
				 ->order_by('building.t_updated','DESC');
				 
		$queryfs = $this->db->get();
		//$queryfs = $this->db->query($q_front);
		//echo $keywords;
		//echo $q_front;
		
		if($queryfs->num_rows() > 0){
			return $queryfs->result();
		}
		else{
			return array();
		}

	}

	function doSearch(){
		$keywords = $this->input->post('s_keywords');
		$pid = $this->input->post('province_id');
		$cid = $this->input->post('city_id');
		mysql_real_escape_string($keywords);
		mysql_real_escape_string($pid);
		mysql_real_escape_string($cid);

		$q_no_keywords_building = "(a.s_building_name LIKE '$keywords') OR
								(a.s_building_desc_id LIKE '$keywords') OR
								(a.s_building_desc_en LIKE'$keywords')";
		$q_keywords_cid = "(a.fk_cities_id = '$cid')";
		$q_keywords_building = "(a.s_building_name LIKE '%$keywords%') OR
								(a.s_building_desc_id LIKE '%$keywords%') OR
								(a.s_building_desc_en LIKE'%$keywords%')";
		$q_keywords_cid = "(a.fk_cities_id = '$cid')";
		$q_keywords_pid = "(a.fk_provinces_id = '$pid')";


		$q_search_head = "SELECT
				a.pk_building_id,
				a.e_currency,
				a.t_last_update,
				a.s_location,
				a.f_price,
				a.s_building_name,
				a.s_building_desc_en,
				a.s_building_desc_id,

				b.name AS province,
				c.name AS cities

			FROM

				building AS a,
				default_provinces AS b,
				default_cities AS c

			WHERE ";
		$q_search_end = "
			AND
				(b.id = a.fk_provinces_id) AND
				(c.id = a.fk_cities_id)
		";


		if ($keywords != "") {								// kalau ada keywords
			if ($cid != "0") {								// kalau ada keywords dan cid
				$search_terms = "(" . $q_keywords_building . ") AND " . $q_keywords_cid;

			}
			elseif ( ($pid != "0") && ($cid == "0") ) {							// kalau ada keywords dan pid
				$search_terms = " ( " . $q_keywords_building .  ") AND " . $q_keywords_pid;
			}
			elseif ($pid == "0") {		// kalau ada keywords aja
				$search_terms = " ( " . $q_keywords_building . " ) ";
			}
		}
		else {
			if ( ($cid != "0") ) {		// kalau ga ada keywords, ada cid
				$search_terms = $q_keywords_cid;

			}
			elseif ($pid != "") {	// kalau ga ada keywords, ada pid
				$search_terms = $q_keywords_pid;
			}
			else {
				$search_terms = $q_no_keywords_building;
			}
		}

		$query_nya_adalah = $q_search_head . $search_terms . $q_search_end;
		//echo $query_nya_adalah;




		// do the query
		$query = $this->db->query($query_nya_adalah);
		
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	// FOOTER
	function ft_office_space_in_jakarta($limit,$start) {
		$keywords = "";//$this->input->post('s_keywords');
		//$keywords = $this->input->post('s_keywords');
		//mysql_real_escape_string($keywords);
		
		$this->db->select('s_br_info,pk_building_id,e_br_currency,t_updated,s_location,f_br_typical,s_building_name,s_description_en,s_description_id,s_picture,b_cafe,b_bank,b_food_court,b_musholla')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('building.s_building_name','keywords')
				 ->or_like('building.s_description_en',$keywords)
				 ->or_like('building.s_description_id',$keywords)
				 ->limit($limit,$start)
				 ->group_by('building.pk_building_id')
				 ->order_by('building.t_updated','DESC');
				 
		

		$queryfs = $this->db->get();
		//$queryfs = $this->db->query($q_front);
		//echo $keywords;
		//echo $q_front;
		
		if($queryfs->num_rows() > 0){
			return $queryfs->result();
		}
		else{
			return array();
		}
	}

	function ft_office_space_in_sudirman($limit,$start) {
		$keywords = "sudirman";//$this->input->post('s_keywords');
		//$keywords = $this->input->post('s_keywords');
		//mysql_real_escape_string($keywords);
		
		$this->db->select('s_br_info,pk_building_id,e_br_currency,t_updated,s_location,f_br_typical,s_building_name,s_description_en,s_description_id,s_picture,b_cafe,b_bank,b_food_court,b_musholla')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				  ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->like('building.s_building_name','keywords')
				 ->or_like('building.s_description_id',$keywords)
				 ->or_like('building.s_description_en',$keywords)
				 ->limit($limit,$start)
				 ->group_by('building.pk_building_id')
				 ->order_by('building.t_updated','DESC');
				 
		

		$queryfs = $this->db->get();
		//$queryfs = $this->db->query($q_front);
		//echo $keywords;
		//echo $q_front;
		
		if($queryfs->num_rows() > 0){
			return $queryfs->result();
		}
		else{
			return array();
		}
	}
}