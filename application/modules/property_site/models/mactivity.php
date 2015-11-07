<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mactivity extends CI_Model{

    function getLogActivityToday()
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
	
	function getLogActivityYesterday()
	{
		$date = mktime (0,0,0,date("Y"),date("m"),date("d")-1);
		$this->db->select('*')
				 ->from('activity')
				 ->like('t_added',date('Y-m-d', $date))
				 ->order_by('pk_activity_id','DESC');
		$query = $this->db->get();
				 
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}	
	}
	
	function getLogActivityWeek()
	{
		$date = mktime (0,0,0, date("m"), date("d")-7,date("Y"));
		$this->db->select('*')
				 ->from('activity')
				 ->like('t_added',$date)
				 ->order_by('pk_activity_id','DESC');
		$query = $this->db->get();
				 
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}	
	}
	
	function getLogActivityMonth()
	{
		$date = mktime (0,0,0, date("m")-1, date("d"),date("Y"));
		$this->db->select('*')
				 ->from('activity')
				 ->like('t_added',$date)
				 ->order_by('pk_activity_id','DESC');
		$query = $this->db->get();
				 
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}	
	}
 
}