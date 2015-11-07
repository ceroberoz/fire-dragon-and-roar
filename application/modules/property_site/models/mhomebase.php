<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mhomebase extends CI_Model{

	function getcity(){
		$cid = '13';

		$this->db->select('*')
				 ->from('default_cities')
				 ->where('province_id',$cid)
				 ->order_by('name','ASC');

		$query = $this->db->get();

		foreach($query->result() as $row){
			$result[0] = 'Select City';
			$result[$row->id] = $row->name;
			//$result[168] = 'Bekasi';
			//$result[172] = 'Depok';
			//$result[148] = 'Tangerang';
		}
		return $result;
	}

	function getkecamatan(){
		$country_id = $this->input->post('country_id');

		$this->db->select('*')
				 ->from('default_kecamatan')
				 ->where('city_id',$country_id)
				 ->order_by('name','ASC');

		$query = $this->db->get();

		foreach($query->result() as $row){
			$result[0] = 'Select Sub-District';
			$result[$row->id] = $row->name;
		}
		return $result;
	}

	function getkelurahan(){
		$province_id = $this->input->post('province_id');

		$this->db->select('*')
				 ->from('default_kelurahan')
				 ->where('kecamatan_id',$province_id)
				 ->order_by('name','ASC');

		$query = $this->db->get();

		foreach($query->result() as $row){
			$result[0] = 'Select District';
			$result[$row->id] = $row->name;
		}

		return $result;
	}
	
	//FUNCTION FOR ADMIN
	function getnamakota(){
		$cid = '13';

		$this->db->select('*')
				 ->from('default_cities')
				 ->where('province_id',$cid)
				 ->order_by('name','ASC');

		$query = $this->db->get();

		foreach($query->result() as $row){
			$result[''] = 'Select City';
			$result[$row->name] = $row->name;
			$result['Bekasi'] = 'Bekasi';
			$result['Depok'] = 'Depok';
			$result['Tangerang'] = 'Tangerang';
		}
		return $result;
	}
	
	function getkota($bid){
	
		$this->db->select('*')
				 ->from('building')
				 ->where('pk_building_id',$bid)
				 ->order_by('s_building_name','ASC');;
		$query1 = $this->db->get();
		$kota   = $query1->row()->s_city;
		
		$this->db->select('*')
				 ->from('default_cities')
		     	 ->where('name',$kota);		
		$query  = $this->db->get();
		
		foreach($query->result() as $row){
			$result[$row->id] = $row->name;
			$result[168] = 'Bekasi';
			$result[172] = 'Depok';
			$result[148] = 'Tangerang';
			$result[175] = 'Jakarta Barat';
			$result[176] = 'Jakarta Pusat';
			$result[177] = 'Jakarta Selatan';
			$result[178] = 'Jakarta Timur';
			$result[179] = 'Jakarta Utara';
			
		}
		return $result;
	}

	function getcamat($bid){
		
		$this->db->select('*')
				 ->from('building')
				 ->where('pk_building_id',$bid);
		$query1 = $this->db->get();
		$kota   = $query1->row()->s_city;
		
		//$this->db->select('*')
		//		 ->from('default_cities')
		 //    	 ->where('name',$kota);
		//$this->db->where('name',$kota);
		//$query2  = $this->db->get('default_cities');
		$this->db->select('*')
				 ->from('default_cities')
		     	 ->where('name',$kota);
		$query2  = $this->db->get();
		

		if($query2->num_rows() > 0){
			$idx = $query2->row()->id;
		}
		else{
			return array();
		}
		
		$this->db->select('*')
				 ->from('default_kecamatan')
		     	 ->where('city_id',$idx);		
		$query3  = $this->db->get();

		if($query3->num_rows() > 0){
			return $query3->result();
		}
		else{
			return array();
		}
	}

	function getlurah($bid){
		
		$this->db->select('*')
				 ->from('building')
				 ->where('pk_building_id',$bid);
		$query1 = $this->db->get();
		$camat   = $query1->row()->s_kecamatan;
	
		$this->db->select('*')
				 ->from('default_kecamatan')
		     	 ->where('name',$camat);		
		$query2  = $this->db->get();
		$idx = $query2->row()->id;
		
		$this->db->select('*')
				 ->from('default_kelurahan')
		     	 ->where('kecamatan_id',$idx);		
		$query3  = $this->db->get();
		
		if($query3->num_rows() > 0){
			return $query3->result();
		}
		else{
			return array();
		}
	}
	
	function getkecamatan2()
	{
		$country_id = $this->input->post('country_id');
		
		$this->db->select('*')
				 ->from('default_cities')
		     	 ->where('name',$country_id);		
		$query  = $this->db->get();
		$idx   = $query->row()->id;
		
		$this->db->select('*')
				 ->from('default_kecamatan')
		     	 ->where('city_id',$idx);		
		$query2  = $this->db->get();
		
		foreach($query2->result() as $row){
			$result[''] = 'Select Sub-District';
			$result[$row->name] = $row->name;
		}
		
		return $result;
	}

	function getkelurahan2(){
		$province_id = $this->input->post('province_id');
		
		$this->db->select('*')
				 ->from('default_kecamatan')
		     	 ->where('name',$province_id);		
		$query  = $this->db->get();
		$idp   = $query->row()->id;
		
		$this->db->select('*')
				 ->from('default_kelurahan')
				 ->where('kecamatan_id',$idp)
				 ->order_by('name','ASC');

		$query2 = $this->db->get();

		foreach($query2->result() as $row){
			$result[''] = 'Select District';
			$result[$row->name] = $row->name;
		}
		
		return $result;
	}
	//END FOR ADMIN
}