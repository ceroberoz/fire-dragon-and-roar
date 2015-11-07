<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmanagement extends CI_Model{

	function readMail()
	{
		//$uid = $this->ion_auth->user()->row()->id;
		$mid = $this->input->post('mid');

		$data = array(
			'b_status' => 0
			);

		$this->db->where('pk_message_id',$mid)
				 ->update('message',$data);
	}

	function getMessages()
	{
		$uid = $this->ion_auth->user()->row()->id;

		$this->db->select('*')
				 ->from('message')
				 ->join('users','users.id = message.fk_users_id','LEFT')
				 ->where('fk_users_id',$uid)
				 ->order_by('t_sent','DESC');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function getMessagesContent()
	{
		$uid = $this->ion_auth->user()->row()->id;
		$mid = $this->input->post('mid');

		$this->db->select('*')
				 ->from('message')
				 ->join('users','users.id = message.fk_receiver_id','LEFT')
				 ->where('message.fk_receiver_id',$uid)
				 ->where('message.pk_messages_id',$mid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	function replyMessages()
	{
		$uid 	 = $this->ion_auth->user()->row()->id;
		$message = $this->input->post('message');
		$subject = $this->input->post('subject'); // form_hidden
		$email 	 = $this->ion_auth->user()->row()->email; // ion auth
		$bid  	 = $this->input->post('bid'); // form_hidden

		$data = array(
			'b_category' 	=> 1,
			's_subject' 	=> $subject,
			's_message'		=> $message,
			's_email'		=> $email,
			'fk_building_id'=> $bid,
			'fk_users_id'	=> $uid
			);

		$this->db->insert('message',$data);
	}

	function getManagementBuildingList()
	{
		//$uid = $this->ion_auth->user()->row()->id;

		$uid = "1";
		
		$this->db->select('*')
				 ->from('building')
				 ->join('users','users.id = building.pk_building_id','LEFT')
				// ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
				// ->join('building_favorites','building_favorites.fk_building_id = building.pk_building_id','LEFT')
				 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')				
				// ->limit($limit,$start)
				 ->group_by('pk_building_id')
				 ->order_by('s_building_name','ASC')
				 ->where('fk_users_id', $uid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}

	}
	
	function getNewsletter(){
		$nid = $this->ion_auth->user()->row()->id;

		$this->db->select('*')
				 ->from('newsletter')
				 ->where('fk_users_id', $nid);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}

	}
	
	function updateNewsletter($nid)
	{
		//$id		= $this->input->post('news_id');
		//$email	= $this->input->post('email');
		$news	= $this->input->post('newsletter');
		
		$data	= array(
			//'s_email' => $email,
			'b_activate' => $news
		);
		
		$this->db->where('fk_users_id',$nid)
				 ->update('newsletter',$data);
	}
	
}