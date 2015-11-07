<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ipapa extends CI_Model{
// EDITOR
	function getBuildingEditor(){
		$this->db->select('e_building_status,pk_building_id,s_building_name,s_description_en,s_description_id,s_lat,s_lng,s_picture,s_location,t_added,s_seo_meta_description_en,s_seo_meta_tags_en,s_seo_title_en,s_seo_meta_description_id,s_seo_meta_tags_id,s_seo_title_id,t_updated')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id=building.pk_building_id')	 
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}


	// SEO
	function getSEO($bid){
		$this->db->select('s_city,s_kecamatan,s_kelurahan,s_description_en,s_description_id,pk_building_id,s_seo_title_en,s_seo_meta_description_en,s_seo_meta_description_id,s_seo_meta_tags_en,s_seo_meta_tags_id,s_building_name,t_updated')
				 ->from('building')
				 ->where('pk_building_id',$bid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	// magic
	function subscribeMe(){
		//$ip_addr = $this->input->ip_address();
		$email 	 = $this->input->post('g_subscribe');

		$data = array(
			's_email' => $email
			//'s_ip_address' => $ip_addr 
			);

		$this->db->insert('newsletter',$data);
	}

    function getGeoLocation($bid)
    {
        $this->db->select('s_lat,s_lng')
                 ->from('building')
                 ->where('pk_building_id',$bid);

        $query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
    }

	function getDescOfficeImages($bid="202")
	{
		$this->db->select('pk_office_id')
				 ->from('office')
				 ->join('building','building.pk_building_id = office.fk_building_id')
				 ->where('pk_building_id',$bid);

		$query = $this->db->get();

		foreach ($query->result() as $row)
		{
			$oid = $row->pk_office_id;

			$this->db->select('s_picture')
					 ->from('office_images')
					 //->group_by('fk_office_id');
					 ->where('fk_office_id',$oid);
			$query = $this->db->get();
		}

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}		
	}

	// add favorite

	function addFav(){
		$bid = $this->input->post('bid');
		$uid = $this->ion_auth->user()->row()->id;

		$data = array(
			'fk_building_id' => $bid,
			'fk_users_id'	 => $uid
			);

		$this->db->insert('building_favorites', $data);
	}

	function removeFav(){
		$bid = $this->input->post('bid');
		$uid = $this->ion_auth->user()->row()->id;

		$this->db->where('fk_building_id',$bid)
				 ->where('fk_users_id',$uid)
			 	 ->delete('building_favorites');
	}

	function displayFav(){
		$uid = $this->ion_auth->user()->row()->id;	

		$this->db->select('*')
				 ->from('building_favorites')
				 ->where('fk_users_id',$uid)
				 ->where('b_fav','1');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	// RNZOMIZER

	function randomBuilding(){
		//$sql = "SELECT * FROM building WHERE pk_building_id >= (SELECT FLOOR(MAX(pk_building_id) * RAND()) FROM building ORDER BY pk_building_id LIMIT 4";
		//$sql = "SELECT * FROM building ORDER BY RAND() LIMIT 4";

		$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->group_by('pk_building_id')
		 		 ->order_by('pk_building_id','RANDOM')
				 ->limit(9);
		//$query = $this->db->query($sql);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}

	}


	// DETAIL MISC

	function deleteBuildingImage(){
		//$bid = $this->uri->segment(4);
		$iid = $this->uri->segment(4);

		$selector = array(
			'pk_building_images_id' => $iid
			//'fk_building_id' => $bid
			);

		$this->db->delete('building_images',$selector);
	}

	function deleteOfficeImage(){
		//$bid = $this->uri->segment(4);
		$oid = $this->uri->segment(4);

		$selector = array(
			'pk_office_images_id' => $oid
			//'fk_building_id' => $bid
			);

		$this->db->delete('office_images',$selector);
	}


	function getNearestBuildings($bid){
		// get cid
		$this->db->select('fk_cities_id')
				 ->from('building')
				 ->where('pk_building_id',$bid);

		$query = $this->db->get();
		$melon = $query->row()->fk_cities_id;

		// kill the cat
		$this->db->select('*')
				 ->from('building')
				 ->where('fk_cities_id',$melon)
				 ->limit(5);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		} 
	}

	// BM FUNCTION START

	function getBMOffices(){
		$uid = $this->ion_auth->user()->row()->id;

		$this->db->select('*')
				 ->from('office')
				 ->join('building','building.pk_building_id = office.fk_building_id')
				 ->where('office.fk_users_id',$uid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}


	// FRU FUNCTION START

	function getFavoriteBuilding(){
		$uid = $this->ion_auth->user()->row()->id;
		
		$this->db->select('*')
				 ->from('building_favorites')
				 ->join('building','building.pk_building_id = building_favorites.fk_building_id')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id')
				 ->group_by('pk_building_id')
				 ->where('building_favorites.fk_users_id',$uid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	// BUILDING FUNCTION START

	function getBuildingFacilities($bid){
		$this->db->select('*')
				 ->from('building_facilities')
				 ->where('fk_building_id',$bid);

		return $this->db->get()->result();
	}
	
	function getBuildingImages($bid){
		$this->db->select('*')
				 ->from('building_images')
				 ->join('building','building.pk_building_id = building_images.fk_building_id','LEFT')
				 ->where('fk_building_id',$bid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function addBuilding(){
		$uid 	 = $this->ion_auth->user()->row()->id;
		$name 	 = $this->input->post('b_name');
		$offices = $this->input->post('b_offices');
		$location= $this->input->post('b_location');

		$data = array(
			'fk_users_id' 	  => $uid,
			's_building_name' => $name,
			's_location'	  => $location,
			'i_office_numbers'=> $offices 
			);

		$this->db->insert('building',$data);

	}

	function updateBuilding(){
		$bid 		   = $this->input->post('b_id');
		$building_code = $this->input->post('b_code');
		$building_name = $this->input->post('b_name');
		$building_status = $this->input->post('b_status');
		$building_type = $this->input->post('b_type');
		$location 	   = $this->input->post('b_location');
		$province 	   = $this->input->post('propinsi');
		$city 	  	   = $this->input->post('country_id');
		$kelurahan	   = $this->input->post('city_id');
		$kecamatan	   = $this->input->post('province_id');
		$kodepos	   = $this->input->post('kode_post');
		$currency	   = $this->input->post('b_br_currency');
		$typical	   = $this->input->post('b_br_typical');
		$ground_floor  = $this->input->post('b_br_ground_floor');
		$mezanine	   = $this->input->post('b_br_mezanine');
		$sc_currency   = $this->input->post('b_sc_currency');
		$sc_typical	   = $this->input->post('b_sc_typical');
		$sc_ground	   = $this->input->post('b_sc_ground_floor');
		$sc_mezanine   = $this->input->post('b_sc_mezanine');
		$sc_description = $this->input->post('b_sc_description');
		$term_of_payment = $this->input->post('b_term_of_payment');
		$security_deposit = $this->input->post('b_security_deposit');
		$minimum_lease_term = $this->input->post('b_minimum_lease_term');
		$lat    = $this->input->post('b_lat');
		$lng	= $this->input->post('b_lng');
		$elevators = $this->input->post('b_elevator');
		$low_zone  = $this->input->post('b_low_zone');
		$mezzanine_zone  = $this->input->post('b_mezanine_zone');
		$high_zone  = $this->input->post('b_high_zone');
		$executive  = $this->input->post('b_executive_zone');
		$overtime_currency = $this->input->post('e_overtime_currency');
		$overtime_charges = $this->input->post('b_overtime_charges');
		$overtime_description = $this->input->post('b_overtime_description');
		$parking = $this->input->post('b_parking');
		$description_en= $this->input->post('b_description_en');
		$description_id= $this->input->post('b_description_id');
		$seo_title_en = $this->input->post('b_seo_title_en');
		$seo_title_id = $this->input->post('b_seo_title_id');
		$seo_meta_tags_en = $this->input->post('b_seo_meta_tags_en');
		$seo_meta_tags_id = $this->input->post('b_seo_meta_tags_id');
		$seo_meta_description_en = $this->input->post('b_seo_meta_description_en');
		$seo_meta_description_id = $this->input->post('b_seo_meta_description_id');

		$data = array(
			's_building_code' => $building_code,
			's_building_name' => $building_name,
			'e_building_status' => $building_status,
			'e_building_type' => $building_type,
			's_location'	  => $location,
			's_province' => $province,
			's_city'	=> $city,
			's_kelurahan' => $kelurahan,
			's_kecamatan' => $kecamatan,
			's_kodepos' => $kodepos,
			'e_br_currency'	=> $currency,
			'f_br_typical' => $typical,
			's_br_ground_floor'=> $ground_floor,
			's_br_mezanine'=> $mezanine,
			'e_sc_currency'	=> $sc_currency,
			'f_sc_typical' => $sc_typical,
			's_sc_ground_floor' => $sc_ground,
			's_sc_mezanine' => $sc_mezanine,
			's_sc_description' => $sc_description,
			's_term_of_payment'	=> $term_of_payment,
			's_security_deposit' => $security_deposit,
			's_minimum_lease_term' => $minimum_lease_term,
			's_lat' => $lat,
			's_lng' => $lng,
			's_elevator' => $elevators,
			's_elevator_low_zone' => $low_zone,
			's_elevator_mezanine_zone'=> $mezzanine_zone,
			's_elevator_high_zone'=> $high_zone,
			's_elevator_executive'=> $executive,
			'e_overtime_currency' => $overtime_currency,		
			's_overtime_charges' => $overtime_charges,
			's_overtime_charges' => $overtime_charges,
			's_overtime_description' => $overtime_description,
			's_parking' => $parking,
			's_description_en'	=> $description_en,
			's_description_id'	=> $description_id,
			's_seo_title_en' => $seo_title_en,
			's_seo_title_id' => $seo_title_id,
			's_seo_meta_tags_en' => $seo_meta_tags_en,
			's_seo_meta_tags_id' => $seo_meta_tags_id,
			's_seo_meta_description_en' => $seo_meta_description_en,
			's_seo_meta_description_id' => $seo_meta_description_id,
			't_updated' => date('Y-m-d H:i:s')
			);

		// update building table
		$this->db->where('pk_building_id',$bid)
				 ->update('building',$data);
	}

	function insertBuildingImages(){
		$bid = $this->input->post('b_id');
		$data = $this->upload->get_multi_upload_data();

		foreach($data as $row){
			$img = array(
				's_picture' => $row['file_name'],
				'fk_building_id' => $bid
				);

			//return $img;
			$this->db->insert('building_images',$img);
		}
	}

	function insertBuildingFacilities(){
		$bid = $this->input->post('b_id');

		// facilities goes here
		$bank = $this->input->post('f_bank');
		$canteen = $this->input->post('f_canteen');
		$musholla = $this->input->post('f_musholla');
		$function_hall = $this->input->post('f_function_hall');
		$food_court = $this->input->post('f_food_court');
		$cafe = $this->input->post('f_cafe');
		$mini_market = $this->input->post('f_mini_market');
		$multi_function = $this->input->post('f_multi_function');
		$health_clinic = $this->input->post('f_health_clinic');
		$post_office = $this->input->post('f_post_office');
		$money_charger = $this->input->post('f_money_charger');
		$travel_agent = $this->input->post('f_travel_agent');
		$bar = $this->input->post('f_bar');
		$mall = $this->input->post('f_mall');
		$backery = $this->input->post('f_bakery');
		$bcenter = $this->input->post('f_business_center');
		$penthouse = $this->input->post('f_penthouse');
		$apartement = $this->input->post('f_apartement');
		$restaurant = $this->input->post('f_restaurant');
		$coffee = $this->input->post('f_coffee_shop');
		$photo = $this->input->post('f_photo_gallery');
		$meeting = $this->input->post('f_meeting_room');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		// get id
		$this->db->select('fk_building_id')
				 ->from('building_facilities')
				 ->where('fk_building_id',$bid);

		$query = $this->db->get();

		$melon = $query->row()->fk_building_id;
		if($bid == $melon){
			$data = array(
				//'fk_building_id' => $bid,
				'b_bank'		 => $bank,
				'b_canteen'		 => $canteen,
				'b_musholla'	 => $musholla,
				'b_function_hall'=> $function_hall,
				'b_food_court'	 => $food_court,
				'b_cafe'		 => $cafe,
				'b_mini_market'	 => $mini_market,
				'b_multi_function_room' => $multi_function,
				'b_health_clinic'=> $health_clinic,
				'b_post_office'	 => $post_office,
				'b_money_changer'=> $money_charger,
				'b_travel_agent' => $travel_agent,
				'b_bar'			 => $bar,
				'b_bakery'		 => $backery,
				'b_business_center' => $bcenter,
				'b_penthouse'    => $penthouse,
				'b_apartement'    => $apartement,
				'b_restaurant'   => $restaurant,
				'b_coffee_shop'	 => $coffee,
				'b_photo_gallery' => $photo,
				'b_meeting_room' => $meeting,
				'b_mall'		 => $mall,
				't_updated'		 => $date
				); 
			$this->db->where('fk_building_id',$bid)
					 ->update('building_facilities',$data);
		}else{
			$data = array(
				'fk_building_id' => $bid,
				'b_bank'		 => $bank,
				'b_canteen'		 => $canteen,
				'b_musholla'	 => $musholla,
				'b_function_hall'=> $function_hall,
				'b_food_court'	 => $food_court,
				'b_cafe'		 => $cafe,
				'b_mini_market'	 => $mini_market,
				'b_multi_function_room' => $multi_function,
				'b_health_clinic'=> $health_clinic,
				'b_post_office'	 => $post_office,
				'b_money_changer'=> $money_charger,
				'b_travel_agent' => $travel_agent,
				'b_bar'			 => $bar,
				'b_bakery'		 => $backery,
				'b_business_center' => $bcenter,
				'b_penthouse'    => $penthouse,
				'b_apartement'    => $apartement,
				'b_restaurant'   => $restaurant,
				'b_coffee_shop'	 => $coffee,
				'b_photo_gallery' => $photo,
				'b_meeting_room' => $meeting,
				'b_mall'		 => $mall,
				't_updated'		 => $date
				); 
			$this->db->insert('building_facilities',$data);
		}
	}

	

	function getBuilding($limit,$start){
		$this->db->select('*')
				 ->from('building')
				 ->join('users','users.id = building.pk_building_id','LEFT')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_favorites','building_favorites.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')				
				 ->limit($limit,$start)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function getBuildingMap(){
		$this->db->select('*')
				 ->from('building')
				 ->join('users','users.id = building.pk_building_id','LEFT')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_favorites','building_favorites.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')				
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getBuildingAdmin(){
		$this->db->select('*')
				 ->from('building');
				// ->join('users','users.id = building.pk_building_id','LEFT');
				// ->limit($limit,$start);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function deleteBuilding(){
		$uid = $this->uri->segment(4);

		$this->db->delete('building',array('pk_building_id' => $uid));
	}

	function getBuildingInfo($bid){
		$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_favorites','building_favorites.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->group_by('pk_building_id')
				 ->where('pk_building_id',$bid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getFacilities(){
		$this->db->select('*')
				 ->from('building_facilities')
				 ->where('fk_building_id',$bid)
				 ->where('b_status','1');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}

	}

	// BUILDING FUNCTION END

	// OFFICE FUNCTION START

	function insertOfficeImages(){
		$oid = $this->input->post('o_id');
		$data = $this->upload->get_multi_upload_data();

		foreach($data as $row){
			$img = array(
				's_picture' => $row['file_name'],
				'fk_office_id' => $oid
				);
			//return $img;
			$this->db->insert('office_images', $img);
		}	
	}

	function getOfficeImages($oid){
		$this->db->select('*')
				 ->from('office_images')
				 ->where('fk_office_id',$oid);
				 //->group_by('fk_office_id');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}


	function getUserBuilding(){
		$uid = $this->ion_auth->user()->row()->id;

		$this->db->select('s_building_name,pk_building_id')
				 ->from('building')
                 ->order_by('s_building_name','ASC');
				 //->where('fk_users_id',$uid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function addOffice(){
		// vars
		//$office_name = $this->input->post('o_name');
		$bid 		 = $this->input->post('o_bid');
		$t_available = $this->input->post('o_available');
		//$date 		 = new DateTime($t_avail);
		//$t_available = $date->format('d-m-Y');
		$floor 		 = $this->input->post('o_floor');
		$unit 		 = $this->input->post('o_unit');
		$price 		 = $this->input->post('o_price');
		$currency 	 = $this->input->post('o_currecy');
		$desc_en 	 = $this->input->post('o_desc_en');
		$desc_id 	 = $this->input->post('o_desc_id');
		$uid 		 = $this->ion_auth->user()->row()->id;

		$data = array (
			//'s_office_name'	 => $office_name,
			'fk_building_id' => $bid,
			't_available'	 => $t_available,
			's_office_floor' => $floor,
			's_office_unit'	 => $unit,
			'f_office_price' => $price,
			'e_currency'	 => $currency,
			's_office_desc_en' => $desc_en,
			's_office_desc_id' => $desc_id,
			'fk_users_id'	 => $uid
		);

		$this->db->insert('office',$data);
	}

	function getOfficeInfo($oid){
		$this->db->select('*')
				 ->from('office')
				 ->join('office_facilities','office_facilities.fk_office_id = office.pk_office_id','LEFT')

				 ->where('pk_office_id',$oid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}


	function getOffice(){
		$this->db->select('*')
				 ->from('office')
				 ->join('building','building.pk_building_id = office.fk_building_id','LEFT');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}



	function getOffices($bid){
		$this->db->select('*')
				 ->from('office')
				 ->join('building','building.pk_building_id = office.fk_building_id','LEFT')
				 ->join('office_images','office_images.fk_office_id = office.pk_office_id','LEFT')
				 ->where('fk_building_id',$bid)
				 ->group_by('fk_office_id');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}


	function updateOffice(){
	// vars
		//$office_name = $this->input->post('o_name');
		$oid 		 = $this->input->post('o_id'); // hidden
		$bid 		 = $this->input->post('o_bid');
		$t_available 	 = $this->input->post('o_available');
		//$date 		 = new DateTime($t_avail);
		//$t_available = $date->format('d-m-Y');
		$floor 		 = $this->input->post('o_floor');
		$unit 		 = $this->input->post('o_unit');
		$price 		 = $this->input->post('o_price');
		$currency 	 = $this->input->post('o_currecy');
		$desc_en 	 = $this->input->post('o_desc_en');
		$desc_id 	 = $this->input->post('o_desc_id');
		$t_update	 = date('Y-m-d H:i:s');
		$uid 		 = $this->ion_auth->user()->row()->id;

		$data = array (
			//'s_office_name'  => $office_name,
			'fk_building_id' => $bid,
			't_available'	 => $t_available,
			's_office_floor' => $floor,
			's_office_unit'  => $unit,
			'f_office_price' => $price,
			'e_currency' 	 => $currency,
			's_office_desc_en' => $desc_en,
			's_office_desc_id' => $desc_id,
			'fk_users_id'	 => $uid,
			't_update'		=> $t_update
		);

		$this->db->where('pk_office_id',$oid)
				 ->update('office',$data);
	}

	function insertOfficeFacilities(){
		$oid = $this->input->post('o_id');

		// facilities goes here
		$air_conditioner = $this->input->post('f_ac');
		$washing_room 	 = $this->input->post('f_washing_room');
		$parking_area 	 = $this->input->post('f_parking_area');
		$internet 		 = $this->input->post('f_internet');

		// get id
		$this->db->select('fk_office_id')
				 ->from('office_facilities')
				 ->where('fk_office_id',$oid);

		$query = $this->db->get();

		$melon = $query->row()->fk_office_id;
		if($oid == $melon){
			$data = array(
				//'fk_building_id' => $bid,
				'b_ac' => $air_conditioner,
				'b_washing_room' => $washing_room,
				'b_parking_area' => $parking_area,
				'b_internet'	 => $internet
				); 
			$this->db->where('fk_office_id',$oid)
					 ->update('office_facilities',$data);
		}else{
			$data = array(
				'fk_office_id' => $oid,
				'b_ac' => $air_conditioner,
				'b_washing_room' => $washing_room,
				'b_parking_area' => $parking_area,
				'b_internet'	 => $internet
				); 
			$this->db->insert('office_facilities',$data);
		}
	}

	function deleteOffice(){
		$oid = $this->uri->segment(4);
		$uid = $this->ion_auth->user()->row()->id;

		$this->db->delete('office',array('pk_office_id' => $oid, 'fk_users_id' => $uid));
	}

	// OFFICE FUNCTION END

	// USER FUNCTION START

	function addUser(){
		// register user
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email 	  = $this->input->post('email');
		$additional_data = array(
			'first_name' => '',
			'last_name'	 =>''
			);

		$this->ion_auth->register($username,$password,$email,$additional_data);

		
		if($this->input->post('level')){
			// add groups
			$this->db->select('users.id')
					 ->from('users')
					 ->where('email',$email);

			$uid 	= $this->db->get()->row()->id;
			$group 	= $this->input->post('level');

			$data = array(
				'user_id'	=> $uid,
				'group_id' 	=> $group
				);
			$this->db->insert('users_groups',$data);
		}	
	}


	function updateUser(){
		//where
		$uid 	  = $this->input->post('u_uid');

		// getvars
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$address  = $this->input->post('address');
		$company  = $this->input->post('company');
		$phone 	  = $this->input->post('phone');

		$data = array(
			'username' => $username,
			'password' => $password,
			'address'  => $address,
			'company'  => $company,
			'phone'    => $phone
			); 
		$this->ion_auth->update($uid,$data);
	}

	function updateAvatar(){
		$uid = $this->ion_auth->user()->row()->id;
		//$key = uniqid();
		
		$a_avatar = $this->upload->data();
		$avatar   = $a_avatar['file_name'];

		$data = array(
			's_avatar' => $avatar//,
			//'s_random' => $key
			); 

		$this->db->where('id',$uid)
				 ->update('users',$data);
	}

	function removeAvatar(){
		$uid = $this->ion_auth->user()->row()->id;
		$avatar = "";

		$data = array(
			's_avatar' => $avatar
			); 
		$this->ion_auth->update($uid,$data);
	}

	function getUser(){
		$this->db->select('users.username,users.id,users.ip_address,users.email,users.created_on,users.last_login,users.active,users_groups.group_id,groups.description')
				 ->from('users')
				 ->join('users_groups','users_groups.user_id = users.id','LEFT')
				 ->join('groups','groups.id = users_groups.group_id','LEFT')
				 ->group_by('users.id');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getUserData($uid){
		$this->db->select('*')//->select('users.username,users.id,users.email,users.password')
				 ->from('users')
				 ->join('users_groups','users_groups.user_id = users.id','LEFT')
				 ->join('groups','groups.id = users_groups.group_id','LEFT')
                 ->group_by('users.id')
				 ->where('users.id',$uid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function addUserBM(){
		// register user
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		$email 	  = $this->input->post('email');
		$additional_data = array(
			'first_name' => '',
			'last_name'	 =>''
			);

		$this->ion_auth->register($username,$password,$email,$additional_data);

		
		if($this->input->post('level')){
			// add groups
			$this->db->select('users.id')
					 ->from('users')
					 ->where('email',$email);

			$uid 	= $this->db->get()->row()->id;
			$group 	= $this->input->post('level');

			$data = array(
				'user_id'	=> $uid,
				'group_id' 	=> $group
				);
			$this->db->insert('users_groups',$data);
		}	
	}

	// USER FUNCTION END

	// EXTRA
	
	//UPDATE BUILDING EDITOR
	function updateBuildingEditor(){
		$bid 		   	= $this->input->post('b_id');
		$description_en	= $this->input->post('b_description_en');
		$description_id	= $this->input->post('b_description_id');
		$lat    		= $this->input->post('b_lat');
		$lng			= $this->input->post('b_lng');
		
		$data = array(
			's_description_en'		=> $description_en,
			's_description_id'		=> $description_id,
			's_lat' 				=> $lat,
			's_lng' 				=> $lng,
			't_updated'			=> date('Y-m-d H:i:s')
			);

		// update building EDITOR table
		$this->db->where('pk_building_id',$bid)
				 ->update('building',$data);
	}
	
	//UPDATE BUILDING SEO
	function updateBuildingSEO(){
		$bid 		   				= $this->input->post('b_id');
		$seo_title_en 				= $this->input->post('b_seo_title_en');
		$seo_title_id 				= $this->input->post('b_seo_title_id');
		$seo_meta_tags_en 			= $this->input->post('b_seo_meta_tags_en');
		$seo_meta_tags_id 			= $this->input->post('b_seo_meta_tags_id');
		$seo_meta_description_en	= $this->input->post('b_seo_meta_description_en');
		$seo_meta_description_id 	= $this->input->post('b_seo_meta_description_id');
		
		$data = array(
			's_seo_title_en' 			=> $seo_title_en,
			's_seo_title_id'			=> $seo_title_id,
			's_seo_meta_tags_en' 		=> $seo_meta_tags_en,
			's_seo_meta_tags_id' 		=> $seo_meta_tags_id,
			's_seo_meta_description_en' => $seo_meta_description_en,
			's_seo_meta_description_id' => $seo_meta_description_id,
			't_updated'				=> date('Y-m-d H:i:s')
			);

		// update building table
		$this->db->where('pk_building_id',$bid)
				 ->update('building',$data);
	}
	
	//UPDATE BUILDING MARKETING
	function updateBuildingMarketing(){
		$bid 		   	= $this->input->post('b_id');
		$building_name 	= $this->input->post('b_name');
		$building_status= $this->input->post('b_status');
		$building_type 	= $this->input->post('b_type');
		$location		= $this->input->post('b_location');
		$province 		= $this->input->post('province_id');
		$city 	  		= $this->input->post('city_id');
		$kelurahan		= $this->input->post('kelurahan_id');
		$kecamatan		= $this->input->post('kecamatan_id');
		$kodepos		= $this->input->post('kode_post');
		
		$br_currency	= $this->input->post('e_br_currency');
		$br_typical		= $this->input->post('b_br_typical');
		$br_ground_floor= $this->input->post('b_br_ground_floor');
		$br_mezanine	= $this->input->post('b_br_mezanine');
		
		$sc_currency	= $this->input->post('e_sc_currency');
		$sc_typical	   	= $this->input->post('b_sc_typical');
		$sc_ground	   	= $this->input->post('b_sc_ground_floor');
		$sc_mezanine	= $this->input->post('b_sc_mezanine');
		$sc_description	= $this->input->post('b_sc_description');
		
		$term_of_payment	= $this->input->post('b_term_of_payment');
		$security_deposit	= $this->input->post('b_security_deposit');
		$minimum_lease_term = $this->input->post('b_minimum_lease_term');
		
		$elevator					= $this->input->post('b_elevator');
		$elevator_low_zone			= $this->input->post('b_low_zone');
		$elevator_mezzanine_zone	= $this->input->post('b_mezanine_zone');
		$elevator_middle_zone 		= $this->input->post('b_middle_zone');
		$elevator_high_zone 		= $this->input->post('b_high_zone');
		$elevator_executive_zone	= $this->input->post('b_executive_zone');
		
		$overtime_currency 		= $this->input->post('b_overtime_currency');
		$overtime_charges 		= $this->input->post('b_overtime_charges');
		$overtime_description 	= $this->input->post('b_overtime_description');
		
		$parking 				= $this->input->post('b_parking');

		$data = array(
			's_building_name' 		=> $building_name,
			'e_building_status' 	=> $building_status,
			'e_building_type' 		=> $building_type,
			's_location'			=> $location,
			's_province'			=> $province,
			's_city'				=> $city,
			's_kelurahan'			=> $kelurahan,
			's_kecamatan'			=> $kecamatan,
			's_kodepos'				=> $kodepos,
			
			'e_br_currency'			=> $br_currency,
			'f_br_typical'			=> $br_typical,
			's_br_ground_floor'		=> $br_ground_floor,
			's_br_mezanine'			=> $br_mezanine,
			
			'e_sc_currency'			=> $sc_currency,
			'f_sc_typical'			=> $sc_typical,
			's_sc_ground_floor'		=> $sc_ground_floor,
			's_sc_mezanine'			=> $sc_mezanine,
			's_sc_description'		=> $sc_descrioption,
			
			's_term_of_payment'		=> $term_of_payment,
			's_security_deposit'	=> $security_deposit,
			's_minimum_lease_term'	=> $minimum_lease_term,
			
			's_elevator' 				=> $elevator,
			's_elevator_low_zone'		=> $elevator_low_zone,
			's_elevator_mezanine_zone'	=> $elevator_mezzanine_zone,
			's_elevator_high_zone'		=> $elevator_high_zone,
			's_elevator_executive'		=> $elevator_executive_zone,
			
			'e_overtime_currency'		=> $overtime_currency,
			's_overtime_charges'		=> $overtime_charges,
			's_overtime_description'	=> $overtime_description,
			
			's_parking'					=> $parking,

			't_updated'		=> date('Y-m-d H:i:s')
			);

		// update building table
		$this->db->where('pk_building_id',$bid)
				 ->update('building',$data);
	}

	//UPDATE BUILDING 2
	function updateBuilding2(){
		$bid 		   	= $this->input->post('b_id');
		$building_name 	= $this->input->post('b_name');
		$building_status= $this->input->post('b_status');
		$building_type 	= $this->input->post('b_type');
		$location		= $this->input->post('b_location');
		$province 		= $this->input->post('province_id');
		$city 	  		= $this->input->post('city_id');
		$kelurahan		= $this->input->post('kelurahan_id');
		$kecamatan		= $this->input->post('kecamatan_id');
		$kodepos		= $this->input->post('kode_post');
		
		$br_currency	= $this->input->post('b_br_currency');
		$br_typical		= $this->input->post('b_br_typical');
		$br_ground_floor= $this->input->post('b_br_ground_floor');
		$br_mezanine	= $this->input->post('b_br_mezanine');
		
		$sc_currency	= $this->input->post('b_sc_currency');
		$sc_typical	   	= $this->input->post('b_sc_typical');
		$sc_ground_floor= $this->input->post('b_sc_ground_floor');
		$sc_mezanine	= $this->input->post('b_sc_mezanine');
		$sc_description	= $this->input->post('b_sc_description');
		
		$term_of_payment	= $this->input->post('b_term_of_payment');
		$security_deposit	= $this->input->post('b_security_deposit');
		$minimum_lease_term = $this->input->post('b_minimum_lease_term');
		
		$lat    		= $this->input->post('b_lat');
		$lng			= $this->input->post('b_lng');
		
		$elevator					= $this->input->post('b_elevator');
		$elevator_low_zone			= $this->input->post('b_low_zone');
		$elevator_mezzanine_zone	= $this->input->post('b_mezanine_zone');
		$elevator_middle_zone 		= $this->input->post('b_middle_zone');
		$elevator_high_zone 		= $this->input->post('b_high_zone');
		$elevator_executive_zone	= $this->input->post('b_executive_zone');
		
		$overtime_currency 		= $this->input->post('b_overtime_currency');
		$overtime_charges 		= $this->input->post('b_overtime_charges');
		$overtime_description 	= $this->input->post('b_overtime_description');
		
		$parking 				= $this->input->post('b_parking');
		
		$description_en	= $this->input->post('b_description_en');
		$description_id	= $this->input->post('b_description_id');
		
		$seo_title_en 				= $this->input->post('b_seo_title_en');
		$seo_title_id 				= $this->input->post('b_seo_title_id');
		$seo_meta_tags_en 			= $this->input->post('b_seo_meta_tags_en');
		$seo_meta_tags_id 			= $this->input->post('b_seo_meta_tags_id');
		$seo_meta_description_en	= $this->input->post('b_seo_meta_description_en');
		$seo_meta_description_id 	= $this->input->post('b_seo_meta_description_id');
		
		$data = array(
			's_building_name' 		=> $building_name,
			'e_building_status' 	=> $building_status,
			'e_building_type' 		=> $building_type,
			's_location'			=> $location,
			's_province'			=> $province,
			's_city'				=> $city,
			's_kelurahan'			=> $kelurahan,
			's_kecamatan'			=> $kecamatan,
			's_kodepos'				=> $kodepos,
			
			's_lat' 				=> $lat,
			's_lng' 				=> $lng,
			
			'e_br_currency'			=> $br_currency,
			'f_br_typical'			=> $br_typical,
			's_br_ground_floor'		=> $br_ground_floor,
			's_br_mezanine'			=> $br_mezanine,
			
			'e_sc_currency'			=> $sc_currency,
			'f_sc_typical'			=> $sc_typical,
			's_sc_ground_floor'		=> $sc_ground_floor,
			's_sc_mezanine'			=> $sc_mezanine,
			's_sc_description'		=> $sc_description,
			
			's_term_of_payment'		=> $term_of_payment,
			's_security_deposit'	=> $security_deposit,
			's_minimum_lease_term'	=> $minimum_lease_term,
			
			's_elevator' 				=> $elevator,
			's_elevator_low_zone'		=> $elevator_low_zone,
			's_elevator_mezanine_zone'	=> $elevator_mezzanine_zone,
			's_elevator_high_zone'		=> $elevator_high_zone,
			's_elevator_executive'		=> $elevator_executive_zone,
			
			'e_overtime_currency'		=> $overtime_currency,
			's_overtime_charges'		=> $overtime_charges,
			's_overtime_description'	=> $overtime_description,
			
			's_parking'					=> $parking,
			
			's_description_en'		=> $description_en,
			's_description_id'		=> $description_id,
			
			's_seo_title_en' 			=> $seo_title_en,
			's_seo_title_id'			=> $seo_title_id,
			's_seo_meta_tags_en' 		=> $seo_meta_tags_en,
			's_seo_meta_tags_id' 		=> $seo_meta_tags_id,
			's_seo_meta_description_en' => $seo_meta_description_en,
			's_seo_meta_description_id' => $seo_meta_description_id,
			
			't_updated'		=> date('Y-m-d H:i:s')
			);

		// update building table
		$this->db->where('pk_building_id',$bid)
				 ->update('building',$data);
	}
	
	function getUserAdmin()
	{
		$uid = $this->ion_auth->user()->row()->id;
		
		$this->db->select('users.username,users.id,users.ip_address,users.email,users.created_on,users.last_login,users.active,users.first_name,users.last_name,users_groups.group_id,groups.description,users.s_avatar')
				 ->from('users')
				 ->join('users_groups','users_groups.user_id = users.id','LEFT')
				 ->join('groups','groups.id = users_groups.group_id','LEFT')
				 ->where('users.id',$uid)
				 ->group_by('users.id');
		
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function getnameBuilding($oid)
	{
		$this->db->select('*')
			     ->from('office')
				 ->where('pk_office_id',$oid);
		$query = $this->db->get();
		$fk = $query->row()->fk_building_id;
		
		$this->db->select('*')
			     ->from('building')
				 ->where('pk_building_id',$fk);
		$query2 = $this->db->get();
		
		if($query2->num_rows() > 0){
			return $query2->result();
		}
		else{
			return array();
		}
		
	}
	
	function getLogActivity()
	{
		$this->db->select('*')
				 ->from('activity')
				 ->like('t_added',date('Y-m-d'))
				 ->order_by('pk_activity_id','DESC');
		$query = $this->db->get();
				 
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}	
	}
	
	//Added 5 Maret 2015
	function getCompareLocation($limit,$start)
	{
		foreach($this->cart->contents() as $items)
		{
			$this->db->select('*')
					 ->from('building')
					 ->join('users','users.id = building.pk_building_id','LEFT')
					 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
					 ->join('building_favorites','building_favorites.fk_building_id = building.pk_building_id','LEFT')
					 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')				
					 ->limit($limit,$start)
					 ->like('s_city',$items['s_city'])
					 ->group_by('pk_building_id')
					 ->order_by('s_building_name','ASC');
	
			$query = $this->db->get();
	
			if($query->num_rows() > 0){
				return $query->result();
			}
			else{
				return array();
			}
		}
	}
	function getComparePrice($limit,$start)
	{
		foreach($this->cart->contents() as $items)
		{
			$this->db->select('*')
					 ->from('building')
					 ->join('users','users.id = building.pk_building_id','LEFT')
					 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
					 ->join('building_favorites','building_favorites.fk_building_id = building.pk_building_id','LEFT')
					 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')				
					 ->limit($limit,$start)
					 ->where('e_br_currency',$items['e_br_currency'])
					 ->where('f_br_typical <=',$items['f_br_typical'])
					 ->group_by('pk_building_id')
					 ->order_by('s_building_name','ASC');
	
			$query = $this->db->get();
	
			if($query->num_rows() > 0){
				return $query->result();
			}
			else{
				return array();
			}
		}
	}
}
