<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MChain extends CI_Model{

    function getcountry(){
        $result = array();
        $this->db->select('*')
                 ->from('default_countries')
                 ->order_by('name','ASC');

        $array_keys_values = $this->db->get();

        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Country-';
            $result[$row->name]= $row->name;
        }
 
        return $result;
    }

    function getprovince(){
        //$country_id = $this->input->post('country_id');
        $country_id = 100;
        $result = array();

        $this->db->select('*')
                 ->from('default_provinces')
                 ->where('country_id',$country_id)
                 ->order_by('name','ASC');

        $array_keys_values = $this->db->get();

        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Propinsi-';
            $result[$row->name]= $row->name;
        }
 
        return $result;
    }
		
    function getcity(){
        $province_id = $this->input->post('province_id');
        $result = array();
		
        $this->db->select('default_cities.name')
                 ->from('default_cities')
				 ->join('default_provinces','default_provinces.id=default_cities.province_id','LEFT')
				 ->like('default_provinces.name',$province_id)
                 ->order_by('default_cities.name','ASC');

        $array_keys_values = $this->db->get();

        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih City-';
            $result[$row->name]=$row->name;
        }
 
        return $result;
    }
 
}