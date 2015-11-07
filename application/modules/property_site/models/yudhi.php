<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yudhi extends CI_Model{

	//INSERT IP ADDRESS
	function initCounter() 
	{	  
		 if($this->ion_auth->logged_in())
		 {
		 	$uid = $this->ion_auth->user()->row()->id;
			$ip = $this->input->ip_address();
			$location = uri_string();
			
			$data = array(
						'fk_users_id' => $uid,
						'ip' 		 => $ip,
						'location'	 => $location
					);
		 }else{
		 	$ip = $this->input->ip_address();
		 	$location = uri_string();
		 
		 	$data = array(
		 			'ip' 		 => $ip,
					'location'	 => $location
					);
		 }
		 
	$this->db->insert('counter',$data);
		
	}
	//COUNT ADMINISTRATOR
	function getDescADM()
	{
		$this->db->like('group_id','1');
		$this->db->from('users_groups');
		$query = $this->db->count_all_results();
		
		return $query;
	}
	
	//COUNT BUILD MANAGEMENT
	function getDescBM()
	{
		$this->db->like('group_id','2');
		$this->db->from('users_groups');
		$query = $this->db->count_all_results();
		
		return $query;
	}
	
	//COUNT GENERAL USERS
	function getDescFRU()
	{
		$this->db->like('group_id','3');
		$this->db->from('users_groups');
		$query = $this->db->count_all_results();
		
		return $query;
	}
	//COUNT TOTAL USERS
	function getTotalUser()
	{
		$query = $this->db->count_all('users_groups');
		
		return $query;
	}
	
	//COUNT TOTAL BUILDING
	function getTotalBuilding()
	{
		$query = $this->db->count_all('building');
		
		return $query;
	}
	
	//COUNT TOTAL OFFICE
	function getTotalOffice()
	{
		$query = $this->db->count_all('office');
		
		return $query;
	}
}
