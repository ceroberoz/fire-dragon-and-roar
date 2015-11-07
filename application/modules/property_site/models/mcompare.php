<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcompare extends CI_Model{

	function simillarByPrice()
	{
		//$cart = $this->cart->contents();
		//$price = $cart['f_br_typical'];
		foreach($this->cart->contents() as $price)
		{	
				$this->db->select('*')
						 ->from('building')
						 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
						 ->where('e_br_currency',$price['e_br_currency'])
						 ->where('f_br_typical <=',$price['f_br_typical'])
						 ->where('pk_building_id !=',$price['id'])
						 ->group_by('pk_building_id')
						 ->order_by('pk_building_id','RANDOM')
						 ->limit(3,0);
				$query = $this->db->get();
		
				if($query->num_rows() > 0){
					return $query->result();
				}
				else{
					return array();
				}
		}
	}
	
	function simillarByLocation()
	{
		//$cart = $this->cart->contents();
		//$price = $cart['s_location'];
		foreach($this->cart->contents() as $location)
		{		
				$this->db->select('*')
						 ->from('building')
						 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
						 ->like('s_city',$location['s_city'])
						 ->where('pk_building_id !=',$location['id'])
						 ->group_by('pk_building_id')
						 ->order_by('pk_building_id','RANDOM')
						 ->limit(3,0);
				$query = $this->db->get();
		
				if($query->num_rows() > 0){
					return $query->result();
				}
				else{
					return array();
				}
		}
	}
	
	function numRowsSimillarByLocation()
	{
		foreach($this->cart->contents() as $location)
		{		
				$this->db->select('*')
						 ->from('building')
						 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
						 ->like('s_location',$location['s_location'])
						 ->group_by('pk_building_id')
						 ->order_by('pk_building_id','RANDOM')
						 ->limit(3,0);
				$query = $this->db->get();
				$rows	= $query->num_rows();
				return $rows;
		}
	}
	
	function getBuilding1($bname1){
		$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_favorites','building_favorites.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->group_by('pk_building_id')
				 ->where('s_building_name',$bname1);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function getBuilding2($bname2){
		$this->db->select('*')
				 ->from('building')
				 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_favorites','building_favorites.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
				 ->group_by('pk_building_id')
				 ->where('s_building_name',$bname2);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	//Added 5 Maret 2015
	function cart_validate(){
		$cart = $this->cart->contents();
		foreach ($cart as $items):
			$bid	  = $items['pk_building_id'];
			$name	  = $items['s_building_name'];
			$this->db->select('*')
					 ->from('building')
					 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
					 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
					 ->group_by('pk_building_id')
					 ->where('pk_building_id',$bid)
					 ->where('s_building_name',$name);
			$query = $this->db->get();
		endforeach;
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}	
	}
	function info_checkout(){
		$ionauth = $this->ion_auth->user()->row();
		$date	 = date('Y-m-d H:i:s');

		$cart = $this->cart->contents();
		foreach($cart as $items):
			$that = new stdClass();
			$that->id	 		  = $items['pk_building_id'];
			$that->building_name  = $items['s_building_name'];
			$that->user_id		  = $ionauth->id;
			$that->t_added		  = $date;
			$this->db->insert('building_compare', $that);
		endforeach;
	}
}