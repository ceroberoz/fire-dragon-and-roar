<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model{

	function editBuilding()
	{
		// get input
		$bid = $this->input->post('b_id');
		$buildingCode = $this->input->post('b_code'); // need input
		$buildingName = $this->input->post('b_name');
		$buildingStatus = $this->input->post('b_status');
		$buildingType = $this->input->post('b_type');
		$location = $this->input->post('b_location');
		$province = $this->input->post('province');
		$city = $this->input->post('city');
		$kelurahan = $this->input->post('city_id');
		$kecamatan = $this->input->post('province_id');
		$kodepos = $this->input->post('kode_post');
		$brCurrency = $this->input->post('b_br_currency');
		$brTypical = $this->input->post('b_br_typical');
		$brGround = $this->input->post('b_br_ground_floor');
		$brMezanine = $this->input->post('b_br_mezanine');
		$scCurrency = $this->input->post('b_sc_currency');
		$scTypical = $this->input->post('b_sc_typical');
		$scGround = $this->input->post('b_sc_ground_floor');
		$scMezanine = $this->input->post('b_sc_mezanine');
		$scDescription = $this->input->post('b_sc_description');
		$termOfPayment = $this->input->post('b_term_of_payment');
		$securityDeposit = $this->input->post('b_security_deposit');
		$minimumLeaseTerm = $this->input->post('b_minimum_lease_term');
		$lat = $this->input->post('b_lat');
		$lng = $this->input->post('b_lng');
		$elevator = $this->input->post('b_elevator');
		$elevatorLow = $this->input->post('b_low_zone'); 
		$elevatorMezanine = $this->input->post('b_mezanine_zone');
		$elevatorHigh = $this->input->post('b_high_zone');
		$elevatorExecutive = $this->input->post('b_executive_zone');
		$overtimeCurrency = $this->input->post('e_overtime_currency');
		//$overtimeCharges = $this->input->post('b_overtime_charges');
		$overtimeDescription = $this->input->post('b_overtime_description');
		$parking = $this->input->post('b_parking');
		$descriptionEn = $this->input->post('b_description_en');
		$descriptionId = $this->input->post('b_description_id');
		$seoTitleEn = $this->input->post('b_seo_title_en');
		$seoTitleId = $this->input->post('b_seo_title_id');
		$seoMetaTagsEn = $this->input->post('b_seo_meta_tags_en');
		$seoMetaTagsId = $this->input->post('b_seo_meta_tags_id');
		$seoMetaDescriptionEn = $this->input->post('b_seo_meta_description_en');
		$seoMetaDescriptionId = $this->input->post('b_seo_meta_description_id');
		$userId = $this->ion_auth->user()->row()->id;// ion auth
		$updated = date('Y-m-d H:i:s');// timestamp
		$brInfo = $this->input->post('b_br_info'); // need input
		$scInfo = $this->input->post('b_sc_info'); // need input
		$overtimeInfo = $this->input->post('b_overtime_info'); // need input
		$overtimeAc = $this->input->post('b_overtime_ac');
		$overtimeLighting = $this->input->post('b_overtime_lighting');
		$overtimePower = $this->input->post('b_overtime_power_outlet');

		// indexing input
		$data = array(
			's_building_code' => $buildingCode,
			's_building_name' => $buildingName,
			'e_building_status' => $buildingStatus,
			'e_building_type' => $buildingType,
			's_location' => $location,
			's_province' => $province,
			's_city' => $city,
			's_kelurahan' => $kelurahan,
			's_kecamatan' => $kecamatan,
			's_kodepos' => $kodepos,
			'e_br_currency' => $brCurrency,
			'f_br_typical' => $brTypical,
			's_br_ground_floor' => $brGround,
			's_br_mezanine' => $brMezanine,
			'e_sc_currency' => $scCurrency,
			'f_sc_typical' => $scTypical,
			's_sc_ground_floor' => $scGround,
			's_sc_mezanine' => $scMezanine,
			's_sc_description' => $scDescription,
			's_term_of_payment' => $termOfPayment,
			's_security_deposit' => $securityDeposit,
			's_minimum_lease_term' => $minimumLeaseTerm,
			's_lat' => $lat,
			's_lng' => $lng,
			's_elevator' => $elevator,
			's_elevator_low_zone' => $elevatorLow,
			's_elevator_mezanine_zone' => $elevatorMezanine,
			's_elevator_high_zone' => $elevatorHigh,
			's_elevator_executive' => $elevatorExecutive,
			'e_overtime_currency' => $overtimeCurrency,
			//'s_overtime_charges' => $overtimeCharges,
			's_overtime_description' => $overtimeDescription,
			's_parking' => $parking,
			's_description_en' => $descriptionEn,
			's_description_id' => $descriptionId,
			's_seo_title_en' => $seoTitleEn,
			's_seo_title_id' => $seoTitleId,
			's_seo_meta_description_en' => $seoMetaDescriptionEn,
			's_seo_meta_description_id' => $seoMetaDescriptionId,
			'fk_users_id' => $userId,
			't_updated' => $updated,
			's_br_info' => $brInfo,
			's_sc_info' => $scInfo,
			's_overtime_info' => $overtimeInfo,
			's_overtime_ac' => $overtimeAc,
			's_overtime_lighting' => $overtimeLighting,
			's_overtime_power_outlet' => $overtimePower
			);


		// update
		$this->db->where('pk_building_id',$bid)
				 ->update('building',$data);
	}

}