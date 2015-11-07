<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogging extends CI_Model{
	// logme
	function logsearch($keywords,$city,$district,$area)
	{
		if($this->ion_auth->logged_in()){
			$username 	= $this->ion_auth->user()->row()->email;
		}else{
			$username 	= "guest";
		}
		$ip 		= $this->input->ip_address();
		$client 	= "website";
		//$activity 	= "searchBuilding";

		if($city != "0"){
			$activity 	= "searchCity";
			// get city name
			$cid = $this->input->post('country_id');

			$this->db->select('name')
					 ->from('default_cities')
					 ->where('id',$cid);

			$query = $this->db->get();
			$melon = $query->row()->name;

			$data = array(
				's_username' => $username,
				's_activity' => $activity,
				's_log' 	 => $melon,
				's_client' 	 => $client,
				's_ip_address' => $ip
			);

			$this->db->insert('activity',$data);
		}
		
		if($district != "0"){
			$activity 	= "searchDistrict";
			// get city name
			$cid = $this->input->post('province_id');

			$this->db->select('name')
					 ->from('default_kecamatan')
					 ->where('id',$cid);

			$query = $this->db->get();
			$melon = $query->row()->name;

			$data = array(
				's_username' => $username,
				's_activity' => $activity,
				's_log' 	 => $melon,
				's_client' 	 => $client,
				's_ip_address' => $ip
			);

			$this->db->insert('activity',$data);
		}
		
		if($area != "0"){
			$activity 	= "searchArea";
			// get city name
			$cid = $this->input->post('city_id');

			$this->db->select('name')
					 ->from('default_kelurahan')
					 ->where('id',$cid);

			$query = $this->db->get();
			$melon = $query->row()->name;

			$data = array(
				's_username' => $username,
				's_activity' => $activity,
				's_log' 	 => $melon,
				's_client' 	 => $client,
				's_ip_address' => $ip
			);

			$this->db->insert('activity',$data);
		}

		// keywords
		if($keywords){
			$activity 	= "searchKeywords";

			$data = array(
				's_username' => $username,
				's_activity' => $activity,
				's_log' 	 => $keywords,
				's_client' 	 => $client,
				's_ip_address' => $ip
			);

			$this->db->insert('activity',$data);
		}
	}

	function logbuilding($bid)
	{
		if($this->ion_auth->logged_in()){
			$username 	= $this->ion_auth->user()->row()->email;
		}else{
			$username 	= "guest";
		}
		$ip 		= $this->input->ip_address();
		$client 	= "website";
		$activity 	= "ViewBuilding";

		// getbuilding name
		$this->db->select('s_building_name')
				 ->from('building')
				 ->where('pk_building_id',$bid)
				 ->group_by('pk_building_id');

		$query = $this->db->get();		
		$log = $query->row()->s_building_name;


		$data = array(
			's_username' => $username,
			's_activity' => $activity,
			's_log' 	 => $log,
			's_client' 	 => $client,
			's_ip_address' => $ip
			);

		$this->db->insert('activity',$data);
	}
}