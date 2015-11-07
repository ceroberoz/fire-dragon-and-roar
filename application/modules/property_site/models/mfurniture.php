<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mfurniture extends CI_Model{

	// manage
	function getAllFurniture($limit,$start){
		$this->db->select('*')
				 ->from('furniture')
				 ->join('furniture_category','furniture_category.pk_furniture_category_id = furniture.fk_furniture_category_id','LEFT')
				 ->join('furniture_sub_category','furniture_sub_category.pk_furniture_sub_category_id = furniture.fk_furniture_sub_category_id','LEFT')
				 ->where('furniture.b_status','1')
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
	
	function getAllFurniture2(){
		$this->db->select('*')
				 ->from('furniture')
				 ->join('furniture_category','furniture_category.pk_furniture_category_id = furniture.fk_furniture_category_id','LEFT')
				 ->join('furniture_sub_category','furniture_sub_category.pk_furniture_sub_category_id = furniture.fk_furniture_sub_category_id','LEFT')
				 ->where('furniture.b_status','1')
				 ->order_by('t_added','DESC');
		
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function getFurniture(){
		$fid = $this->uri->segment(4);

		$this->db->select('*')
				 ->from('furniture')
				 ->join('furniture_category','furniture_category.pk_furniture_category_id = furniture.fk_furniture_category_id','LEFT')
				 ->join('furniture_sub_category','furniture_sub_category.pk_furniture_sub_category_id = furniture.fk_furniture_sub_category_id','LEFT')
				 ->where('furniture.b_status','1')
				 ->where('pk_furniture_id',$fid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function addFurniture ()
	{
		$f_users_id 	= $this->ion_auth->user()->row()->id;
		$f_name 		= $this->input->post('f_name');
		$f_category 	= $this->input->post('province_id');
		$f_sub_category = $this->input->post('city_id');

		$img 			= $this->upload->data();	
		$picture 		= $img['file_name'];

		$f_description 	= $this->input->post('f_description');

		$data = array(
			'fk_users_id' 	  			=> $f_users_id,
			's_furniture_name'  		=> $f_name,
			'fk_furniture_category_id'	 	=> $f_category,
			'fk_furniture_sub_category_id' => $f_sub_category,
			's_picture' 				=> $picture,
			's_description' 			=> $f_description
		);
		$this->db->insert('furniture', $data);
	}

	function editFurniture ()
	{
		$f_users_id 	= $this->ion_auth->user()->row()->id;
		$f_name 		= $this->input->post('f_name');
		$f_category 	= $this->input->post('province_id');
		$f_sub_category = $this->input->post('city_id');

		$img 			= $this->upload->data();	
		$picture 		= $img['file_name'];

		$f_description 	= $this->input->post('f_description');

		$fid 			= $this->input->post('fid');

		$data = array(
			'fk_users_id' 	  			=> $f_users_id,
			's_furniture_name'  		=> $f_name,
			'fk_furniture_category_id'	 	=> $f_category,
			'fk_furniture_sub_category_id' => $f_sub_category,
			's_picture' 				=> $picture,
			's_description' 			=> $f_description
		);
		$this->db->where('pk_furniture_id',$fid)
				 ->where('fk_users_id',$f_users_id)
				 ->update('furniture', $data);
	}

	function getSubCategories(){
		$this->db->select('*')
				 ->from('furniture_sub_category')
				 ->join('furniture_category','furniture_category.pk_furniture_category_id = furniture_sub_category.fk_furniture_category_id','LEFT')
				;

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	// magic
	function addCategory(){
		$cat_name = $this->input->post('f_category_name');

		$data = array(
			's_furniture_category_name' => $cat_name
			);

		$this->db->insert('furniture_category',$data);
	}

	function getCategory(){
		$this->db->select('*')
				 ->from('furniture_category');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getCategory2(){
		$this->db->select('*')
				 ->from('furniture_category');

		$array_keys_values = $this->db->get();

        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Select Category-';
            $result[$row->pk_furniture_category_id]= $row->s_furniture_category_name;
        }
 
        return $result;
	}

	function getSubcategory2(){
		$fcid = $this->input->post('province_id');
		$result = array();

		$this->db->select('*')
				 ->from('furniture_sub_category')
				 ->where('fk_furniture_category_id',$fcid);

		 $array_keys_values = $this->db->get();

        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Select Sub Category-';
            $result[$row->pk_furniture_sub_category_id]= $row->s_furniture_sub_category_name;
        }
 
        return $result;
	}

	function removeCategory(){
		$fcid = $this->input->post('f_category_id');

		$tables = array(
			'furniture_category',
			'furniture_sub_category'
			);

		$this->db->where('furniture_category.pk_furniture_category_id',$fcid)
				 ->where('furniture_sub_category.fk_furniture_category_id',$fcid)
				 ->delete($tables);
	}

	function addSubCategory(){
		$cid 	= $this->input->post('f_category_id');
		$sub_cat= $this->input->post('f_sub_category_name');

		$data = array(
			's_furniture_sub_category_name' => $sub_cat,
			'fk_furniture_category_id'  => $cid
			);

		$this->db->insert('furniture_sub_category',$data);
	}

	function removeSubCategory(){
		$fcsid = $this->input->post('f_sub_category_id');
		$fcid = $this->input->post('f_category_id');
		
		$this->db->where('pk_furniture_sub_category_id',$fcsid)
				 ->where('fk_furniture_category_id',$fcid)
				 ->delete('furniture_sub_category');
	}

	function deleteFurniture(){
		$fcsid = $this->uri->segment(4);
		
		$this->db->where('pk_furniture_id',$fcsid)
				 //->where('fk_furniture_category_id',$fcid)
				 ->delete('furniture');
	}

	//CATEGORY DOOR
	function subCategoryDYJA(){
		$subcat = array(
			'5',
			'8','9','10','11','12','13','14','15','16','17','18',
			);

		$this->db->select('*')
				 ->from('furniture')
				 //->join('furniture_category','furniture_category.pk_furniture_category_id = furniture.fk_furniture_category_id')
				 //->join('furniture_sub_category','furniture_sub_category.fk_furniture_category_id = furniture_category.pk_furniture_category_id')				
				 ->where('furniture.fk_furniture_category_id','1')
				 ->where('furniture.fk_furniture_sub_category_id','5')
				 ->or_where('furniture.fk_furniture_sub_category_id','8')
				 ->or_where('furniture.fk_furniture_sub_category_id','9')
				 ->or_where('furniture.fk_furniture_sub_category_id','10')
				 ->or_where('furniture.fk_furniture_sub_category_id','11')
				 ->or_where('furniture.fk_furniture_sub_category_id','12')
				 ->or_where('furniture.fk_furniture_sub_category_id','13')
				 ->or_where('furniture.fk_furniture_sub_category_id','14')
				 ->or_where('furniture.fk_furniture_sub_category_id','15')
				 ->or_where('furniture.fk_furniture_sub_category_id','16')
				 ->or_where('furniture.fk_furniture_sub_category_id','17')
				 ->or_where('furniture.fk_furniture_sub_category_id','18')
				 ->order_by('furniture.s_furniture_name','ASC');
				 
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function subCategoryYJ(){

		$this->db->select('*')
				 ->from('furniture')
				 //->join('furniture_category','furniture_category.pk_furniture_category_id = furniture.fk_furniture_category_id')
				 //->join('furniture_sub_category','furniture_sub_category.fk_furniture_category_id = furniture_category.pk_furniture_category_id')				
				 ->where('furniture.fk_furniture_category_id','1')
				 ->where('furniture.fk_furniture_sub_category_id','6')
				 ->order_by('furniture.s_furniture_name','ASC');
				 
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function subCategoryNon(){

		$this->db->select('*')
				 ->from('furniture')
				//->join('furniture_category','furniture_category.pk_furniture_category_id = furniture.fk_furniture_category_id')
				// ->join('furniture_sub_category','furniture_sub_category.fk_furniture_category_id = furniture_category.pk_furniture_category_id')				
				 ->where('furniture.fk_furniture_category_id','1')
				 ->where('furniture.fk_furniture_sub_category_id','7')
				// ->group_by('furniture.fk_furniture_sub_category_id','7')
				 ->order_by('furniture.s_furniture_name','ASC');
				 
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	//CATEGORY FLOORING
	function subCategory3Ply(){

		$this->db->select('*')
				 ->from('furniture')
				 //->join('furniture_category','furniture_category.pk_furniture_category_id = furniture.fk_furniture_category_id')
				 //->join('furniture_sub_category','furniture_sub_category.fk_furniture_category_id = furniture_category.pk_furniture_category_id')				
				 ->where('furniture.fk_furniture_category_id','2')
				 ->where('furniture.fk_furniture_sub_category_id','1');
				 //->order_by('furniture.s_furniture_name','ASC')
		
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function subCategoryArt(){

		$this->db->select('*')
				 ->from('furniture')
				// ->join('furniture_category','furniture_category.pk_furniture_category_id = furniture.fk_furniture_category_id')
				// ->join('furniture_sub_category','furniture_sub_category.fk_furniture_category_id = furniture_category.pk_furniture_category_id')				
				 ->where('furniture.fk_furniture_category_id','2')
				 ->where('furniture.fk_furniture_sub_category_id','2')
				 ->order_by('furniture.s_furniture_name','ASC');
				
		
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function subCategoryMulti(){

		$this->db->select('*')
				 ->from('furniture')
				// ->join('furniture_category','furniture_category.pk_furniture_category_id = furniture.fk_furniture_category_id')
				// ->join('furniture_sub_category','furniture_sub_category.fk_furniture_category_id = furniture_category.pk_furniture_category_id') 
				 ->where('furniture.fk_furniture_category_id','2')
				 ->where('furniture.fk_furniture_sub_category_id','3')
				 ->order_by('furniture.s_furniture_name','ASC');
		
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function subCategorySolid(){

		$this->db->select('*')
				 ->from('furniture')
				// ->join('furniture_category','furniture_category.pk_furniture_category_id = furniture.fk_furniture_category_id')
				// ->join('furniture_sub_category','furniture_sub_category.fk_furniture_category_id = furniture_category.pk_furniture_category_id')				
				 ->where('furniture.fk_furniture_category_id','2')
				 ->where('furniture.fk_furniture_sub_category_id','4')
				 ->order_by('furniture.s_furniture_name','ASC');
				 
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
}