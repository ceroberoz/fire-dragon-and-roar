<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dummy extends CI_Model{

	function derp($bid="1"){
		$this->db->select('b_status, fk_facilities_id')
		 ->from('building_facilities')
		 ->where('b_status','1')
		 ->where('fk_building_id',$bid);

		 $query = $this->db->get();

		$melon = $query->row()->b_status;
		//$melon1 = $query->row()->fk_facilities_id;
		return $melon;
		//return $melon1;
	}




	function updateFacilities(){
	$bid = "1"; // POST
	$facilities = "10"; // POST

	// get selected values
		$this->db->select('fk_facilities_id')
				 ->from('building_facilities')
				 ->where('fk_building_id',$bid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$potato =  $query->result(); // duplicate~!
			//return $query->result();

			foreach($potato as $row){
				// get single row value
				$melon = $row->fk_facilities_id;

				// add validate 
				if($melon == $facilities){
					// if exist
					$data = array(
						'b_status' => "0"
					);

					$this->db->where('fk_building_id',$bid)
							 ->where('fk_facilities_id',$melon)
							 ->update('building_facilities',$data);
				}else{
					// if not exist
					$data = array(
						'fk_building_id' => $bid,
						'fk_facilities_id' => $facilities
					);

					$this->db->insert('building_facilities',$data);
				}
			}
		}
		else{
			return array();
		}	
	}

	function potato($bid=1){
		$this->db->select('fk_facilities_id')
				 ->from('building_facilities')
				 ->where('fk_building_id',$bid);

		$query = $this->db->get()->result();

		foreach ($query as $row){
			$fid  = $this->input->post('b_facilities');

			if($fids == $fid){
				$this->db->where('fk_facilities_id',$fid)
						 ->where('fk_building_id',$bid)
						 ->update('b_status',"0");
			}else{
				$data = array(
					'fk_building_id' => $bid,
					'fk_facilities_id' => $fid
					);
				$this->db->insert('building_facilities',$data);
			}
		}
	}
}