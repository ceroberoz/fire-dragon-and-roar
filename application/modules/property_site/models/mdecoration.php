<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdecoration extends CI_Model{

	// manage
	function getAllDecoration(){
		$this->db->select('*')
				 ->from('decoration')
				 ->join('decoration_category','decoration_category.pk_decoration_category_id = decoration.fk_decoration_category_id','LEFT')
				 ->where('decoration.b_status','1')
				 ->order_by('t_added','DESC');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getDecoration(){
		$fid = $this->uri->segment(4);

		$this->db->select('*')
				 ->from('decoration')
				 ->join('decoration_category','decoration_category.pk_decoration_category_id = decoration.fk_decoration_category_id','LEFT')
				 ->where('decoration.b_status','1')
				 ->where('pk_decoration_id',$fid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function addDecoration()
	{
		$f_users_id 	= $this->ion_auth->user()->row()->id;
		$f_name 		= $this->input->post('f_name');
		$f_category 	= $this->input->post('f_category');

		$img 			= $this->upload->data();	
		$picture 		= $img['file_name'];

		$f_description 	= $this->input->post('f_description');

		$data = array(
			'fk_users_id' 	  			=> $f_users_id,
			's_decoration_name'  		=> $f_name,
			'fk_decoration_category_id'	=> $f_category,
			's_picture' 				=> $picture,
			's_description' 			=> $f_description
		);
		$this->db->insert('decoration', $data);
	}

	function editDecoration()
	{
		$f_users_id 	= $this->ion_auth->user()->row()->id;
		$f_name 		= $this->input->post('f_name');
		$f_category 	= $this->input->post('f_category');

		$img 			= $this->upload->data();	
		$picture 		= $img['file_name'];

		$f_description 	= $this->input->post('f_description');

		$fid 			= $this->input->post('fid');

		$data = array(
			'fk_users_id' 	  			=> $f_users_id,
			's_decoration_name'  		=> $f_name,
			'fk_decoration_category_id'	 	=> $f_category,
			's_picture' 				=> $picture,
			's_description' 			=> $f_description
		);
		$this->db->where('pk_decoration_id',$fid)
				 ->where('fk_users_id',$f_users_id)
				 ->update('decoration', $data);
	}

	// magic
	function addCategory(){
		$cat_name = $this->input->post('f_category_name');

		$data = array(
			's_decoration_category_name' => $cat_name
			);

		$this->db->insert('decoration_category',$data);
	}

	function getCategory(){
		$this->db->select('*')
				 ->from('decoration_category');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function removeCategory(){
		$fcid = $this->input->post('f_category_id');

		$tables = array(
			'decoration_category'
			);

		$this->db->where('decoration_category.pk_decoration_category_id',$fcid)
				 ->delete($tables);
	}

	function deleteDecoration(){
		$fcsid = $this->uri->segment(4);
		
		$this->db->where('pk_decoration_id',$fcsid)
				 ->delete('decoration');
	}

	//CATEGORY OFFICE
	function getOfficeCategory($did){
		$this->db->select('*')
				 ->from('decoration')
				 ->where('fk_decoration_category_id',$did);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	//CATEGORY STORE
	function getStoreCategory($did){
		$this->db->select('*')
				 ->from('decoration')
				 ->where('fk_decoration_category_id',$did);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	//CATEGORY DISPLAY
	function getDisplayCategory($did){
		$this->db->select('*')
				 ->from('decoration')
				 ->where('fk_decoration_category_id',$did);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	//CATEGORY BANK
	function getBankCategory($did){
		$this->db->select('*')
				 ->from('decoration')
				 ->where('fk_decoration_category_id',$did);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	//CATEGORY CLINIC
	function getClinicCategory($did){
		$this->db->select('*')
				 ->from('decoration')
				 ->where('fk_decoration_category_id',$did);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	//CATEGORY HOSPITAL
	function getHospitalCategory($did){
		$this->db->select('*')
				 ->from('decoration')
				 ->where('fk_decoration_category_id',$did);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	//CATEGORY SCHOOL
	function getSchoolCategory($did){
		$this->db->select('*')
				 ->from('decoration')
				 ->where('fk_decoration_category_id',$did);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
}
