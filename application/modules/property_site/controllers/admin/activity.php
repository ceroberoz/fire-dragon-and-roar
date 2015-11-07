<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model(array('ipapa','mactivity'));
	}

	function index(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['activity'] = $this->mactivity->getLogActivityToday();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/activity',$data);
	}
	
	function today(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['today'] = $this->mactivity->getLogActivityToday();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/activity',$data);
	}
	
	function yesterday(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['yesterday'] = $this->mactivity->getLogActivityYesterday();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/activity',$data);
	}
	
	function week(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['week'] = $this->mactivity->getLogActivityWeek();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/activity',$data);
	}
	
	function month(){
		$data['user'] = $this->ipapa->getUserAdmin();
		$data['month'] = $this->mactivity->getLogActivityMonth();

		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/activity',$data);
	}

	function edit(){
		$data['title'] = "Edit Log Activity";
		$data['user'] = $this->ipapa->getUserAdmin();
		
		$this->load->view('ipapa/admin/head');
		$this->load->view('ipapa/admin/header',$data);
		$this->load->view('ipapa/admin/nav');
		$this->load->view('ipapa/admin/edit_activity',$data);
	}

	function do_edit(){
		$this->ipapa->updateActivity();
		redirect('admin/activity','refresh');
	}

	function delete(){
		$this->ipapa->deleteActivity();
		redirect('admin/activity','refresh');
	}


}