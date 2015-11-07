<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mseo extends CI_Model{

	function getBuilding()
	{
		$this->db->select('*')
				 ->from('building')
				 ->order_by('s_building_name','ASC')
				 ->group_by('pk_building_id');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function getMyBuilding($bid)
	{
		$this->db->select('*')
				 ->from('building')
				 ->where('pk_building_id',$bid)
				 ->order_by('s_building_name','ASC')
				 ->group_by('pk_building_id');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
}