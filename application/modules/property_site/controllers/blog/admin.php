<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->model('ipapa');
		$this->load->library('grocery_CRUD');
	}
	
	public function _example_output($output = null)
	{
		//if($this->ion_auth->logged_in()){ 
			$this->load->view('ipapa/blog/admin/head');
			$this->load->view('ipapa/blog/admin/header');
			$this->load->view('ipapa/blog/admin/nav');
			$this->load->view('ipapa/blog/admin/content');
		//}else{
			//$this->load->view('ipapa/blog/admin/login');
		//}
	} 
	
	public function _datatable_output($output = null)
	{	
		$this->load->view('ipapa/blog/admin/head');
		$this->load->view('ipapa/blog/admin/header');
		$this->load->view('ipapa/blog/admin/nav');
		$this->load->view('ipapa/blog/admin/index',$output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	
	public function home()
	{
		$this->_datatable_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	
	public function _datetime_t_added($post_array, $primary_key)
	{
		date_default_timezone_set('Asia/Jakarta');
		$post_array['t_added'] = date('Y-m-d H:i:s');
		return $post_array;
	}
	
	public function _datetime_t_updated($post_array, $primary_key)
	{
		date_default_timezone_set('Asia/Jakarta');
		$post_array['t_updated'] = date('Y-m-d H:i:s');
		return $post_array;
	}

	public function article()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('posting');
			$crud->set_subject('Article');
			$crud->columns('title','picture','alt_picture','description','meta_keywords','meta_description','fk_users_id','t_added','t_updated');
 			$crud->unset_columns('alt_picture','fk_users_id');
			
			$crud->set_field_upload('picture','assets/uploads/files');
			
			$crud->callback_add_field('title',array($this,'add_field_title'));
			$crud->callback_add_field('alt_picture',array($this,'add_field_alt_picture'));
			$crud->callback_add_field('meta_keywords',array($this,'add_field_meta_keywords'));
			$crud->callback_add_field('meta_description',array($this,'add_field_meta_description'));
			$crud->callback_add_field('fk_users_id',array($this,'add_field_users_id'));
			$crud->callback_add_field('t_added',array($this,'add_field_t_added'));
			$crud->callback_add_field('t_updated',array($this,'add_field_t_updated'));
			$crud->callback_edit_field('title',array($this,'edit_field_title'));
			$crud->callback_edit_field('alt_picture',array($this,'edit_field_alt_picture'));
			$crud->callback_edit_field('meta_keywords',array($this,'edit_field_meta_keywords'));
			$crud->callback_edit_field('meta_description',array($this,'edit_field_meta_description'));
			$crud->callback_edit_field('fk_users_id',array($this,'edit_field_users_id'));
			$crud->callback_edit_field('t_added',array($this,'edit_field_t_added'));
			$crud->callback_edit_field('t_updated',array($this,'edit_field_t_updated'));
			
			$crud->callback_before_insert(array($this,'_datetime_t_added'));
			$crud->callback_before_update(array($this,'_datetime_t_updated'));
			
			$crud->unset_export();
			$crud->unset_print();
			$output = $crud->render();

			$this->_datatable_output($output);
	}
	
	function add_field_title()
	{
    	return '<input id="field-title" class="form-control" style="height:30px;" name="title" type="text" value="" maxlength="150" placeholder="Article Title">';
	}
	
	function add_field_alt_picture()
	{
    	return '<input id="field-alt_picture" class="form-control" style="height:30px;" name="alt_picture" type="text" value="" maxlength="150" placeholder="Alt Picture">';
	}
	
	function add_field_meta_keywords()
	{
    	return '<input id="field-meta_keywords" class="form-control" style="height:30px;" name="meta_keywords" type="text" value="" maxlength="260" placeholder="Meta Keywords">';
	}
	
	function add_field_meta_description()
	{
    	return '<textarea id="field-meta_description" class="form-control"  name="meta_description" type="text" value="" maxlength="260" placeholder="Meta Description"></textarea>';
	}
	
	function add_field_users_id()
	{
    	return '<input type="hidden" name="fk_users_id" value="1">1';
	}
	
	function add_field_t_added()
	{
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		return '<input id="field-t_added" name="t_added" type="hidden" value="" maxlength="19" class="datetime-input form-control hasDatepicker">'.$date;
	}
	
	function add_field_t_updated()
	{
		return '<input id="field-t_updated" name="t_updated" type="hidden" value="" maxlength="19" class="datetime-input form-control hasDatepicker">0000-00-00 00:00:00';
	}
	
	function edit_field_title($value, $primary_key)
	{
		return '<input id="field-title" class="form-control" style="height:30px;" name="title" type="text" value="'.$value.'" maxlength="150">';
	}
	
	function edit_field_alt_picture($value, $primary_key)
	{
    	return '<input id="field-alt_picture" class="form-control" style="height:30px;" name="alt_picture" type="text" value="'.$value.'" maxlength="150">';
	}
	
	function edit_field_users_id($value, $primary_key)
	{
    	return '<input id="field-fk_users_id" name="fk_users_id" type="hidden" value="'.$value.'" class="numeric form-control" maxlength="11">'.$value;
	}
	
	function edit_field_meta_keywords($value, $primary_key)
	{
    	return '<input id="field-meta_keywords" class="form-control" style="height:30px;" name="meta_keywords" type="text" value="'.$value.'" maxlength="260">';
	}
	
	function edit_field_meta_description($value, $primary_key)
	{
    	return '<textarea id="field-meta_description" class="form-control" name="meta_description" type="text" value="'.$value.'" maxlength="260">'.$value.'</textarea>';
	}
	
	function edit_field_t_added($value, $primary_key)
	{
		return '<input id="field-t_added" name="t_added" type="hidden" value="'.$value.'" maxlength="19" class="datetime-input form-control hasDatepicker">'.$value;
	}
	
	function edit_field_t_updated($value, $primary_key)
	{
		return '<input id="field-t_updated" name="t_updated" type="hidden" value="'.$value.'" maxlength="19" class="datetime-input form-control hasDatepicker">'.$value;
	}
}