<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comparison extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mcompare'));
		//$this->load->library('cart');
	}

	public function index()
	{
		$data['simillarprice'] = $this->mcompare->simillarByPrice();
		$data['simillarlocation'] = $this->mcompare->simillarByLocation();
		$data['numrows'] = $this->mcompare->numRowsSimillarByLocation();
		
		$this->load->view('ipapa/frontpage/head');
		$this->load->view('ipapa/frontpage/header');
		$this->load->view('ipapa/frontpage/comparison',$data);
		$this->load->view('ipapa/frontpage/footer');
	}

	// added 18 Feb 2015
	function add_compare()
	{
		if($this->cart->total_items() < 2){
			$bid = $this->uri->segment(3);

			$this->db->select('*')
					 ->from('building')
					 ->join('building_facilities','building_facilities.fk_building_id = building.pk_building_id','LEFT')
					 ->join('building_images','building_images.fk_building_id = building.pk_building_id','LEFT')
					 ->group_by('pk_building_id')
					 ->where('pk_building_id',$bid);

			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				//return $query->row()();

				$s_picture = $query->row()->s_picture;
				$s_building_name = $query->row()->s_building_name;
				$s_location = $query->row()->s_location;
				$br_currency = $query->row()->e_br_currency;
				$br_typical = $query->row()->f_br_typical;
				$sc_currency = $query->row()->e_sc_currency;
				$sc_typical = $query->row()->f_sc_typical;
				$sc_description = $query->row()->s_sc_description;
				$oc_ac = $query->row()->s_overtime_ac;
				$oc_currency = $query->row()->e_overtime_currency;
				$oc_term = $query->row()->s_term_of_payment;
				$oc_deposit = $query->row()->s_security_deposit;
				$oc_description = $query->row()->s_overtime_description;
				$f_bank = $query->row()->b_bank;
				$f_canteen = $query->row()->b_canteen;
				$f_musholla = $query->row()->b_musholla;
				$f_function_hall = $query->row()->b_function_hall;
				$f_food_court = $query->row()->b_food_court;
				$f_mini_market = $query->row()->b_mini_market;
				$f_health_clinic = $query->row()->b_health_clinic;
				$f_coffee_shop = $query->row()->b_coffee_shop;
				$f_business_center = $query->row()->b_business_center;
				$f_meeting_room = $query->row()->b_meeting_room;
				$f_apartement = $query->row()->b_apartement;
				$f_post_office = $query->row()->b_post_office;
				$f_money_changer = $query->row()->b_money_changer;

				$s_br_info = $query->row()->s_br_info;
				$s_sc_info = $query->row()->s_sc_info;
				$s_overtime_info = $query->row()->s_overtime_info;

				$s_overtime_ac = $query->row()->s_overtime_ac;
				$s_overtime_lighting = $query->row()->s_overtime_lighting;
				$s_overtime_power_outlet = $query->row()->s_overtime_power_outlet;

				$s_minimum_lease_term = $query->row()->s_minimum_lease_term;

				$s_city = $query->row()->s_city;
				
				$data = array(
					   'id'      => $bid,
					   'qty'     => 1,
					   'price'   => 1,
					   'name'    => $s_building_name,
					   //'options' => array(
							's_picture'				=>  $s_picture,
							's_location'   		  	=>  $s_location,
							'e_br_currency'       	=>  $br_currency,
							'f_br_typical'		  	=>  $br_typical,
							'e_sc_currency'			=>  $sc_currency,
							'f_sc_typical'			=>	$sc_typical,
							's_sc_description'		=>  $sc_description,
							's_overtime_ac'			=>	$oc_ac,
							'e_overtime_currency'	=>	$oc_currency,
							's_term_of_payment'		=>	$oc_term,
							's_security_deposit'	=>	$oc_deposit,
							's_overtime_description'=>	$oc_description,
							'b_bank'				=>	$f_bank,
							'b_canteen'				=>	$f_canteen,
							'b_musholla'			=>	$f_musholla,
							'b_function_hall'		=>	$f_function_hall,
							'b_food_court'			=>	$f_food_court,
							'b_mini_market'			=>	$f_mini_market,
							'b_health_clinic'		=>	$f_health_clinic,
							'b_coffee_shop'			=>	$f_coffee_shop,
							'b_business_center'		=>	$f_business_center,
							'b_meeting_room'		=>	$f_meeting_room,
							'b_apartement'			=>	$f_apartement,
							'b_post_office'			=>	$f_post_office,
							'b_money_changer'		=>	$f_money_changer,
							's_br_info'				=>	$s_br_info,
							's_sc_info'				=>	$s_sc_info,
							's_overtime_info'		=>	$s_overtime_info,
	
							's_overtime_ac'			=>	$s_overtime_ac,
							's_overtime_lighting'	=>	$s_overtime_lighting,
							's_overtime_power_outlet'=>	$s_overtime_power_outlet,
							's_minimum_lease_term' => $s_minimum_lease_term,
	
							's_city' => $s_city
						//)
					);
				//$this->load->library('cart');
				$this->cart->insert($data);

				redirect('building');
			}
			else{
				return array();
				redirect('building');
			}
		}else{
			redirect('building');
		}
	}
	//

	// added 27 Feb 2015
	function remove_compare2()
	{
			//$rowid = "";
			$bid = $this->uri->segment(3);
			$total = $this->cart->total_items();
			// Cycle true all items and update them
			for($i=0;$i < $total;$i++)
			{
				// Create an array with the products rowid's and quantities. 
				$data = array(
				   'rowid' => $item[$i],
				   'id'	   => $bid,
				   'qty'   => $qty[$i]
				);
				 
				// Update the cart with the new information
				$this->cart->update($data);
			}
			redirect('building');
	}
	//

	// added 2 Mar 2015 //

	function remove_compare()
	{
		$rowid = $this->uri->segment(3);

		$data = array(
			'rowid' => $rowid,
			'qty' => 0
			);

		$this->cart->update($data);

		redirect('building');
	}

	//

	// debug cart //

	function cart_total()
	{
		echo $this->cart->total();
	}

	function cart_total_items()
	{
		echo $this->cart->total_items();
	}

	function cart_contents()
	{
		//echo $this->cart->contents();

		$data = $this->cart->contents();

		echo "<pre>";
		die(print_r($data, TRUE));
	}

	function cart_destroy()
	{
		$this->cart->destroy();
		redirect('building');
	}
	
	//Added 5 Maret 2015
	function checkout(){ 
		if (!$this->ion_auth->logged_in()){
		
			redirect('auth/login');
		}
		else{
			if($this->mcompare->cart_validate()){
				$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']); 
			}
			else{
				$data = $this->mcompare->info_checkout();
				$this->cart->destroy(); // destroy?
			}
		}
	}
}