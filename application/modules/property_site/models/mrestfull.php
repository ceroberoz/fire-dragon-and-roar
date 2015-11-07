<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mrestfull extends CI_Model
{

	// added 2 Mar 2015 //

	function doContact()
	{
		$name = $this->input->post('first_name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$message = $this->input->post('message');

		$data = array(
			's_name' =>$name,
			's_email' =>$email,
			's_phone' =>$phone,
			's_message' =>$message,
			's_client' => "iosclient"
			);

		$this->db->insert('conctact',$data);
	}

	// EOL //

	// added 24 Feb 2015 //

	function getFavoriteData()
	{
		$username = $this->uri->segment(4);
		// get uid
		$this->db->select('id')
				 ->from('users')
				 ->where('username',$username);

		$query = $this->db->get();

		$uid = $query->row()->id;

		// derp
		$this->db->select('pk_building_id,s_building_name,s_location,s_city,s_kodepos,e_br_currency,s_br_info,f_br_typical,s_picture,pk_office_id')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('office','office.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_favorites','building_favorites.fk_building_id = building.pk_building_id','LEFT')
				 ->where('fk_users_id',$uid)
				 ->group_by('pk_building_id');

		$query2 = $this->db->get();

		if($query2->num_rows() > 0){
			return $query2->result();
		}
		else{
			return array();
		}
	}

	function getNearestIosClient2()
	{
		$lat = $this->uri->segment(4);
      	$lng = $this->uri->segment(5);
      	$distance = $this->uri->segment(6);
      	$username = $this->uri->segment(7);

      	mysql_real_escape_string($lat);
		mysql_real_escape_string($lng);
		mysql_real_escape_string($distance);
		mysql_real_escape_string($username);

		// 3959 = miles
		// 6371 = kilos

		$madness = "
				SELECT
					COALESCE(b_fav,0) AS b_fav,s_br_info,s_sc_info,s_overtime_info,s_overtime_ac,s_overtime_lighting,s_overtime_power_outlet,pk_building_id,s_building_name,s_lat,s_lng,s_location,s_city,s_kodepos,e_br_currency,f_br_typical,COALESCE(s_picture,0) AS s_picture,COALESCE(pk_office_id,0) AS pk_office_id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( s_lat ) ) * cos( radians( s_lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( s_lat ) ) ) )
				AS
					distance
				FROM
					building
				LEFT JOIN
					building_images ON building.pk_building_id = building_images.fk_building_id 
					LEFT JOIN
					building_favorites ON building.pk_building_id = building_favorites.fk_building_id 
				LEFT JOIN
					office ON building.pk_building_id = office.fk_building_id 
				GROUP BY
					pk_building_id	
				HAVING
					distance < $distance
				
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

	//

	function getNearestIosClient()
	{
		$lat = $this->uri->segment(4);
      	$lng = $this->uri->segment(5);
      	$distance = $this->uri->segment(6);

      	mysql_real_escape_string($lat);
		mysql_real_escape_string($lng);
		mysql_real_escape_string($distance);

		// 3959 = miles
		// 6371 = kilos

		$madness = "
				SELECT
					s_br_info,s_sc_info,s_overtime_info,s_overtime_ac,s_overtime_lighting,s_overtime_power_outlet,pk_building_id,s_building_name,s_lat,s_lng,s_location,s_city,s_kodepos,e_br_currency,f_br_typical,COALESCE(s_picture,0) AS s_picture,COALESCE(pk_office_id,0) AS pk_office_id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( s_lat ) ) * cos( radians( s_lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( s_lat ) ) ) )
				AS
					distance
				FROM
					building
				LEFT JOIN
					building_images ON building.pk_building_id = building_images.fk_building_id 
				LEFT JOIN
					office ON building.pk_building_id = office.fk_building_id 
				GROUP BY
					pk_building_id	
				HAVING
					distance < $distance
				
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

	function logActivity() // search
	{
		$username 	= $this->uri->segment(7);
		$search 	= $this->uri->segment(8);
		$client 	= $this->uri->segment(9);

		//if($this->uri->segment(3) == "getdetail"){
		//	$input 	= $this->uri->segment(4);

		//	$this->db->select('s_building_name')
		//			 ->from('building')
		//			 ->where('pk_building_id',$input);

		//	$query 		= $this->db->get();
		//	$something 	= $query->row()->s_building_name;

		//}else{
			$input 		= $this->uri->segment(6);
			$something 	= str_replace('@', ' ', $input);
		//}

		$ip = $this->input->ip_address();
		

		$data = array(
			's_username' => $username,
			's_activity' => $search,
			's_log' 	 => $something,
			's_client' 	 => $client,
			's_ip_address' => $ip
			);

		$this->db->insert('activity',$data);

	}

	function logActivity2() //detail
	{
		$username 	= $this->uri->segment(7);
		$detail 	= $this->uri->segment(8);
		$client 	= $this->uri->segment(9);

		//if($this->uri->segment(3) == "getdetail"){
			$input 	= $this->uri->segment(4);

			$this->db->select('s_building_name')
					 ->from('building')
					 ->where('pk_building_id',$input);

			$query 		= $this->db->get();
			$something 	= $query->row()->s_building_name;

		//}else{
		//	$input 		= $this->uri->segment(6);
		//	$something 	= str_replace('@', ' ', $input);
		//}

		$ip = $this->input->ip_address();
		

		$data = array(
			's_username' => $username,
			's_activity' => $detail,
			's_log' 	 => $something,
			's_client' 	 => $client,
			's_ip_address' => $ip
			);

		$this->db->insert('activity',$data);

	}

	function getBuildingName(){
		$key = $this->uri->segment(4);
		$keywords = str_replace('@', ' ', $key);

		$this->db->select('pk_building_id,s_building_name')
				 ->from('building')
				 //->join('building_images','building_images.fk_building_id=building.pk_building_id')	 
				 ->like('s_building_name',$keywords)
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

	function getBuildingCity(){
		$key = $this->uri->segment(4);
		$keywords = str_replace('@', ' ', $key);

		$this->db->select('id,name')
				 ->from('default_cities')
				 //->join('building_images','building_images.fk_building_id=building.pk_building_id')	 
				 ->like('name',$keywords)
				 //->group_by('id')
				 ->order_by('name','ASC');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getBuildingDistrict(){
		$key = $this->uri->segment(4);
		$keywords = str_replace('@', ' ', $key);

		$this->db->select('id,name')
				 ->from('default_kecamatan')
				 //->join('building_images','building_images.fk_building_id=building.pk_building_id')	 
				 ->like('name',$keywords)
				 //->group_by('id')
				 ->order_by('name','ASC');

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
		$lat = $this->uri->segment(4);
		$lng = $this->uri->segment(5);
		$key = $this->uri->segment(6);

		mysql_real_escape_string($lat);
		mysql_real_escape_string($lat);
		mysql_real_escape_string($key);
		$keywords = str_replace('@', ' ', $key);

		// nama gedung
		// available office
		// alamat 
		// kota
		// kode pos
		// jarak
		// base rent typical
		// gambar

		$madness = "	
					SELECT
						f_br_typical,e_br_currency,pk_building_id,s_building_name,s_location,s_city,s_kodepos,COALESCE(s_picture,0) AS s_picture,COALESCE(pk_office_id,0) AS pk_office_id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( s_lat ) ) * cos( radians( s_lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( s_lat ) ) ) )
					AS
						distance
					FROM
						building
					LEFT JOIN
						building_images ON building.pk_building_id = building_images.fk_building_id 
					LEFT JOIN
						office ON building.pk_building_id = office.fk_building_id 
					WHERE
						(s_building_name
					LIKE
						 '%$keywords%')
					OR
						(s_location	LIKE '%$keywords%')
					OR
						(s_city	LIKE '%$keywords%')
					OR
						(s_kecamatan LIKE '%$keywords%')
					OR
						(s_kelurahan LIKE '%$keywords%')
					GROUP BY
						pk_building_id	
	
					ORDER BY
						distance;
					";

		$query = $this->db->query($madness);

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}


	function getmarkerinfo()
	{
		$bid = $this->uri->segment(4);
		$lat = $this->uri->segment(5);
		$lng = $this->uri->segment(6);

		mysql_real_escape_string($bid);
		mysql_real_escape_string($lat);
		mysql_real_escape_string($lng);

		$madness = "
				SELECT
					pk_building_id,s_building_name,s_location,s_city,s_kodepos,COALESCE(s_picture,0) AS s_picture, ( 6371 * acos( cos( radians($lat) ) * cos( radians( s_lat ) ) * cos( radians( s_lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( s_lat ) ) ) )
				AS
					distance
				FROM
					building
				LEFT JOIN
					building_images ON building.pk_building_id = building_images.fk_building_id 
				WHERE
					pk_building_id = $bid
				GROUP BY
					pk_building_id	
				HAVING
					distance < 25
				
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

	function getNearestBuilding()
	{
		$lat = $this->uri->segment(4);
		$lng = $this->uri->segment(5);
		$distance = $this->uri->segment(6);
		

		mysql_real_escape_string($lat);
		mysql_real_escape_string($lng);
		mysql_real_escape_string($distance);

		// 3959 = miles
		// 6371 = kilos

		$madness = "
				SELECT
					pk_building_id,s_building_name,s_location,s_city,s_kodepos,e_br_currency,f_br_typical,COALESCE(s_picture,0) AS s_picture,COALESCE(pk_office_id,0) AS pk_office_id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( s_lat ) ) * cos( radians( s_lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( s_lat ) ) ) )
				AS
					distance
				FROM
					building
				LEFT JOIN
					building_images ON building.pk_building_id = building_images.fk_building_id 
				LEFT JOIN
					office ON building.pk_building_id = office.fk_building_id 
				GROUP BY
					pk_building_id	
				HAVING
					distance < $distance
				
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

	function getNearestBuilding2()
	{
		$lat = $this->uri->segment(4);
		$lng = $this->uri->segment(5);
		$dsc = $this->uri->segment(6);

		mysql_real_escape_string($lat);
		mysql_real_escape_string($lng);
		mysql_real_escape_string($dsc);
		// 3959 = miles
		// 6371 = kilos

		$madness = "
				SELECT
					pk_building_id,s_building_name,COALESCE(pk_office_id,0) AS pk_office_id,s_lat,s_lng, ( 6371 * acos( cos( radians($lat) ) * cos( radians( s_lat ) ) * cos( radians( s_lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( s_lat ) ) ) )
				AS
					distance
				FROM
					building
				LEFT JOIN
					office ON building.pk_building_id = office.fk_building_id 
				GROUP BY
					pk_building_id	
				HAVING
					distance < $dsc
				
				ORDER BY
					distance
				;
				";

		$sparta = $this->db->query($madness);

		if($sparta->num_rows() > 0){
			return $sparta->result();
		}
		else{
			return array();
		}
	}

	function getBuildingList()
	{
		$this->db->select('
                        pk_building_id,
                        s_building_name,
                        s_location,s_city,s_kecamatan,s_kelurahan,
                        s_lng,
                        s_lat,
                        s_picture
                    ')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC')
				 ->where('building.b_status','1')
				 ->limit(30);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getBuildingListIOS()
	{
		$this->db->select('
                        pk_building_id,
                        s_building_name,
                        s_location,s_location,s_city,s_kecamatan,s_kelurahan,
                        s_lng,
                        s_lat,
                        COALESCE(s_picture,0) AS s_picture,
                        e_br_currency,
                        f_br_typical
                    ')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->group_by('pk_building_id')
				 ->where('building.b_status','1');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getBuildingInfo()
	{
		$bid = $this->uri->segment(4);

		$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->group_by('pk_building_id')
				 ->where('pk_building_id',$bid)
				 ->where('building.b_status','1');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getOfficeList()
	{
		$bid = $this->uri->segment(4);

		$this->db->select('*')
				 ->from('office')
				 ->join('office_images','office_images.fk_office_id = office.pk_office_id','LEFT')
				 //->join('office_facilities','office_facilities.fk_office_id = office.pk_office_id','LEFT')
				 ->group_by('pk_office_id')
				 ->where('pk_office_id',$bid)
				 ->where('office.b_status','1');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function officeImages()
	{
		$bid = $this->uri->segment(4);

		$this->db->select('*')
				 ->from('office_images')
				 //->join('office_images','office_images.fk_office_id = office.pk_office_id','LEFT')
				 //->join('office_facilities','office_facilities.fk_office_id = office.pk_office_id','LEFT')
				 ///->group_by('pk_office_id')
				 ->where('pk_office_id',$bid)
				 ->where('office.b_status','1');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getTotalOffice()
	{
		$this->db->select('
                        pk_building_id,
                        s_building_name,
                        s_lng,
                        s_lat,
                        COALESCE(s_picture,0) AS s_picture,
                        pk_office_id,
                    ')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('office','office.fk_building_id = building.pk_building_id','LEFT')
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC')
				 ->where('building.b_status','1');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function dummy()
	{
		$query = $this->db->query(

			"
			SELECT

			pk_building_id,
			s_building_name,
			s_lng,
			s_lat,
			coalesce(pk_office_id,0) AS pk_office_id

			FROM

			building

			LEFT JOIN

			office ON office.fk_building_id = building.pk_building_id

			WHERE

			building.b_status = '1'

			GROUP BY

			pk_building_id
			"

			);

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	// lorem ipsum
	function getBuildingDetail2()
	{
		$bid = $this->uri->segment(4);
		$lat = $this->uri->segment(5);
		$lng = $this->uri->segment(6);

		//mysql_real_escape_string($lat);
		//mysql_real_escape_string($lng);
		//mysql_real_escape_string($bid);

		$this->db->select('
					pk_building_id,
					COALESE(s_building_code,0) AS s_buiding_code
					COALESE(s_building_name,0) AS s_building_name
					COALESE(s_location,0) AS s_location
					COALESE(s_province,0) AS s_province
					COALESE(s_city,0) AS s_city
					COALESE(s_kelurahan,0) AS s_kelurahan
					COALESE(s_kodepos,0) AS s_kodepos 
					COALESE(e_br_currency,0) AS e_br_currency
					COALESE(f_br_typical,0) AS f_br_typical
					COALESE(e_sc_currency,0) AS e_sc_currency
					COALESE(f_sc_typical,0) AS f_sc_typical
					COALESE(s_sc_description,0) AS s_sc_description
					COALESE(s_term_of_payment,0) AS s_term_of_payment
					COALESE(s_security_deposit,0) AS s_security_deposit
					COALESE(s_minimum_lease_term,0) AS s_minimum_lease_term
					COALESE(s_lat,0) AS s_lat
					COALESE(s_lng,0) AS s_lng
					COALESE(s_elevator,0) AS s_elevator
					COALESE(s_overtime_currency,0) AS s_overtime_currency
					COALESE(s_overtime_charges,0) AS s_overtime_charges
					COALESE(s_overtime_description,0) AS s_overtime_description
					COALESE(s_parking,0) AS s_parking
					COALESE(s_description_en,0) AS s_description_en
					COALESE(pk_office_id,0) AS pk_office_id,
					( 6371 * acos( cos( radians($lat) ) * cos( radians( s_lat ) ) * cos( radians( s_lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( s_lat ) ) ) )
					AS
					distance
					')
				->from('building')
				->where('pk_building_id',$bid)
				->where('b_status','1');

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
		$lat = $this->uri->segment(5);
		$lng = $this->uri->segment(6);

		mysql_real_escape_string($bid);
		mysql_real_escape_string($lat);
		mysql_real_escape_string($lng);
		//$keywords = str_replace('@', ' ', $key);

		// nama gedung
		// available office
		// alamat 
		// kota
		// kode pos
		// jarak
		// base rent typical
		// gambar

		$madness = "
					SELECT	
						pk_building_id,
						COALESCE(s_building_code,0) AS s_buiding_code,
						COALESCE(s_building_name,0) AS s_building_name,
						COALESCE(s_location,0) AS s_location,
						COALESCE(s_province,0) AS s_province,
						COALESCE(s_city,0) AS s_city,
						COALESCE(s_kecamatan,0) AS s_kecamatan,
						COALESCE(s_kelurahan,0) AS s_kelurahan,
						COALESCE(s_kodepos,0) AS s_kodepos,
						COALESCE(e_br_currency,0) AS e_br_currency,
						COALESCE(f_br_typical,0) AS f_br_typical,
						COALESCE(e_sc_currency,0) AS e_sc_currency,
						COALESCE(f_sc_typical,0) AS f_sc_typical,
						COALESCE(s_sc_description,0) AS s_sc_description,
						COALESCE(s_term_of_payment,0) AS s_term_of_payment,
						COALESCE(s_security_deposit,0) AS s_security_deposit,
						COALESCE(s_minimum_lease_term,0) AS s_minimum_lease_term,
						COALESCE(s_lat,0) AS s_lat,
						COALESCE(s_lng,0) AS s_lng,
						COALESCE(s_elevator,0) AS s_elevator,
						COALESCE(e_overtime_currency,0) AS e_overtime_currency,						
						COALESCE(s_overtime_description,0) AS s_overtime_description,
						COALESCE(s_parking,0) AS s_parking,
						COALESCE(s_description_en,0) AS s_description_en,
						COALESCE(pk_office_id,0) AS pk_office_id,
COALESCE(s_br_info,0) AS s_br_info,
COALESCE(s_sc_info,0) AS s_sc_info,
COALESCE(s_overtime_info,0) AS s_overtime_info,
COALESCE(s_overtime_ac,0) AS s_overtime_ac,
COALESCE(s_overtime_lighting,0) AS s_overtime_lighting,
COALESCE(s_overtime_power_outlet,0) AS s_overtime_power_outlet,
					( 6371 * acos( cos( radians($lat) ) * cos( radians( s_lat ) ) * cos( radians( s_lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( s_lat ) ) ) )
					AS
						distance
					FROM
						building
					LEFT JOIN
						office ON building.pk_building_id = office.fk_building_id 
					WHERE
						pk_building_id = $bid
					;
					";

		$query = $this->db->query($madness);

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getBuildingImages()
	{
		$bid = $this->uri->segment(4);
		
		$this->db->select('*')
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

	function getBuildingOffices()
	{
		$bid = $this->uri->segment(4);
		
		$this->db->select('*')
				 ->from('office')
				 ->join('office_images','office_images.fk_office_id = office.pk_office_id')
				 ->where('fk_building_id',$bid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
}

