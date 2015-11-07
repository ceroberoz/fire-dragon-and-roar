<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mblog extends CI_Model{

	function get_archives()
	{	
		$this->db->select('*')
				 ->from('posting')
				 ->order_by('t_added','DESC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function get_posting($limit,$start)
	{	
		$this->db->select('*')
				 ->from('posting')
				 ->limit($limit,$start)
				 ->order_by('t_added','DESC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}	 
	}
	
	function get_detail($pid)
	{
		$this->db->select('*')
				 ->from('posting')
				 ->where('pk_posting_id',$pid)
				 ->order_by('t_added','DESC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}	 
	}
	
	function related_post($pid)
	{
		$this->db->select('*')
				 ->from('posting')
				 ->where('pk_posting_id !=',$pid)
				 ->limit(3,0)
				 ->order_by('pk_posting_id','DESC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function recent_post()
	{
		$this->db->select('*')
				 ->from('posting')
				 ->limit(3)
				 ->order_by('pk_posting_id','DESC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function archive_post($tgl)
	{
		$this->db->select('*')
				 ->from('posting')
				 ->like('t_added',$tgl)
				 ->order_by('t_added','DESC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function get_archive($limit,$start)
	{	
		$tgl = $this->uri->segment(3);
		$date = str_replace('/','-',$tgl);
		$this->db->select('*')
				 ->from('posting')
				 ->like('t_added',$tgl)
				 ->limit($limit,$start)
				 ->order_by('t_added','DESC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function tgl_archive($tgl)
	{	
		$this->db->select('*')
				 ->from('posting')
				 ->like('t_added',$tgl)
				 ->order_by('t_added','DESC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	// SEARCH
	function articleSearch($limit,$start){
		$keywords = $this->input->post('keyword');
		mysql_real_escape_string($keywords);
		$this->db->select('pk_posting_id,title,picture,alt_picture,description,meta_keywords,meta_description,fk_users_id,t_added,t_updated')
				 ->from('posting')
				 ->like('title',$keywords)
				 ->like('description',$keywords)
				 ->limit($limit,$start)
				 ->order_by('pk_posting_id','DESC');
				 
		$query = $this->db->get();
	
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function tempKeywordSearch()
	{
		$keywords = $this->input->post('keyword');
		return $keywords;
	}
	
	function numRowsQuerySearch()
	{
		$keywords = $this->input->post('keyword');
		mysql_real_escape_string($keywords);
		$this->db->select('*')
				 ->from('posting')
				 ->like('title',$keywords)
				 ->like('description',$keywords)
				 ->order_by('pk_posting_id','DESC');		 
		$query	= $this->db->get();
		$rows	= $query->num_rows();
		return $rows;
	}
	
	function resultTimeQuerySearch()
	{
		$keywords = $this->input->post('keyword');
		mysql_real_escape_string($keywords);
		$this->db->select('*')
				 ->from('posting')
				 ->like('title',$keywords)
				 ->like('description',$keywords)
				 ->order_by('pk_posting_id','DESC');
		$msc	= microtime(true);		 
		$query	= $this->db->get();
		$msc	= microtime(true)-$msc;
		return $msc;
	}
	
			
	function getTitle($pid)
	{
		$this->db->select('*')
				 ->from('posting')
				 ->where('pk_posting_id',$pid)
				 ->order_by('t_added','DESC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function getTitle2($tgl)
	{
		$this->db->select('*')
				 ->from('posting')
				 ->like('t_added',$tgl)
				 ->order_by('t_added','DESC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
}