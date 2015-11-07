<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller{

	function doSend()
	{
		$this->load->model('mmessage');

		$this->mmessage->sendPM();
		redirect('/');
	}

	function send()
	{
		// vars
		$from = $this->input->post('m_email');

		$building = $this->input->post('m_building');

		$name = "Info ".$building;

		$subject = $this->input->post('m_subject');
		$message = $this->input->post('m_content');

		// email
		$this->load->library('email');
		
		$this->email->from($from, $name);
		$this->email->to('info@ipapa.co.id');
		
		$this->email->subject($subject);
		$this->email->message($message);
		
		$this->email->send();
		
		//echo $this->email->print_debugger();
		echo "message sent";
		$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);
		redirect('message/redirects');
	}

	function redirects(){
		redirect($this->session->userdata('refered_from'));
	}

}