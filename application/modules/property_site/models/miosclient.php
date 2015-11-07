<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Miosclient extends CI_Model{

	function getBuildingImages()
	{
		$bid = $this->uri->segment(4);
		
		$this->db->select('s_picture')
				 ->from('building_images')
				 ->where('fk_building_id',$bid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getBuildingFacilities()
	{
		$bid = $this->uri->segment(4);

		$this->db->select('
					b_bank,
					b_canteen,
					b_musholla,
					b_function_hall,
					b_food_court,
					b_cafe,
					b_mini_market,
					b_multi_function_room,
					b_health_clinic,
					b_post_office,
					b_money_changer,
					b_travel_agent,
					b_bar,
					b_mall,
					b_restaurant,
					b_photo_gallery,
					b_bakery,
					b_penthouse,
					b_coffee_shop,
					b_meeting_room,
					b_business_center,
					b_apartement
					')
				 ->from('building_facilities')
				 ->where('fk_building_id',$bid);

		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getBuildingDetail()
	{
		$bid = $this->uri->segment(4);

		$this->db->select('
					s_br_ground_floor,
					s_br_mezanine,
					s_location,
					s_province,
					s_city,
					s_kelurahan,
					s_kecamatan,
					s_kodepos,
					f_sc_typical,
					e_sc_currency,
					s_sc_ground_floor,
					s_sc_mezanine,
					s_sc_description,
					s_term_of_payment,
					s_security_deposit,
					s_minimum_lease_term,								
					s_elevator,
					s_elevator_low_zone,
					s_elevator_mezanine_zone,
					s_elevator_high_zone,
					s_elevator_executive,
					e_overtime_currency,
					s_overtime_description,
					s_parking,
					s_description_en,
					s_sc_info,
					s_overtime_info,
					s_overtime_ac,
					s_overtime_lighting,
					s_overtime_power_outlet')
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

	function getNearestIosClient1()
	{
		$username = $this->uri->segment(4);
		$lat = $this->uri->segment(5);
      	$lng = $this->uri->segment(6);
      	//$distance = $this->uri->segment(6);

      	mysql_real_escape_string($lat);
		mysql_real_escape_string($lng);
		mysql_real_escape_string($username);

		// 3959 = miles
		// 6371 = kilos

		$madness = "
				SELECT
					s_br_info,s_sc_info,s_overtime_info,s_overtime_ac,s_overtime_lighting,s_overtime_power_outlet,pk_building_id,s_building_name,s_location,s_city,s_kodepos,e_br_currency,f_br_typical,COALESCE(s_picture,0) AS s_picture,COALESCE(pk_office_id,0) AS pk_office_id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( s_lat ) ) * cos( radians( s_lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( s_lat ) ) ) )
				AS
					distance
				FROM
					building
				LEFT JOIN
					building_favorites ON building.pk_building_id = building_favorites.fk_building_id 
				LEFT JOIN
					building_images ON building.pk_building_id = building_images.fk_building_id 
				LEFT JOIN
					office ON building.pk_building_id = office.fk_building_id 
				LEFT JOIN
					users ON users.id = building_favorites.fk_users_id 
				WHERE 
					users.email = '$username'
				GROUP BY
					pk_building_id		
				ORDER BY
					distance;
				";

		$sparta = $this->db->query($madness);

		if($sparta->num_rows() > 0){
			return $sparta->result();
		}
		else{
			return array();
		}
	}


	function addFav()
	{
		$username = $this->uri->segment(4);
    	$bid      = $this->uri->segment(5);

    	// get uid

    	$this->db->select('id')
             ->from('users')
             ->where('email',$username);

	    $query = $this->db->get();

	    if($query->num_rows() > 0){
	      //return $query->result();

	      $id = $query->result()->row()->id;

	      $data = array(
			'fk_users_id' 	 => $id,
			'fk_building_id' => $bid,
			'b_fav'			 => 1
			);

		$this->db->insert('building_favorites',$data); 

	      //$info = array('update');
	    }
	    else{
	      return array();
	    }

	}


	//

	function removeFav()
	{
		$username = $this->uri->segment(4);
    	$bid      = $this->uri->segment(5);

    	// get uid

    	$this->db->select('id')
             ->from('users')
             ->where('email',$username);

	    $query = $this->db->get();

	    if($query->num_rows() > 0){
	      //return $query->result();

	      $id = $query->result()->row()->id;

	      $data = array(
			'fk_users_id' 	 => $id,
			'fk_building_id' => $bid,
			'b_fav'			 => 0
			);

		$this->db->insert('building_favorites',$data); 

	      //$info = array('update');
	    }
	    else{
	      return array();
	    }

	}

	//

	function doFeedback($filename_image1)
	{
		$name 	 = $this->input->post('name');
		$email 	 = $this->input->post('email');
		$picture = $filename_image1;
		$message = $this->input->post('message');

		$data = array(
			's_name' => $name,
			's_email'	=> $email,
			's_picture'	=> $picture,
			's_message'	=> $message
			);

		$this->db->insert('feedback',$data);
	}

	function doContact()
	{
		$name  = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$message = $this->input->post('message');

		$data = array(
			's_name' => $name,
			's_email'	=> $email,
			's_phone'	=> $phone,
			's_message'	=> $message
			);

		$this->db->insert('contact',$data);
	}

	function getVisit()
	{
		$username = $this->uri->segment(4);

		$this->db->select('s_log')
				 ->where('s_username',$username)
				 ->where('s_client','ios')
				 ->limit('10')
				 ->order_by('t_added','ASC');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getUserProfile()
	{
		$email = $this->uri->segment(4);

		mysql_real_escape_string($email);

		$madness = "	
					SELECT
						COALESCE(email,0) AS email,COALESCE(first_name,0) AS first_name,COALESCE(last_name,0) AS last_name,COALESCE(s_avatar,0) AS s_avatar
					FROM
						users
					WHERE
						email='$email';
					";

		$query = $this->db->query($madness);

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

}