<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller{

  	function __construct()
    {
        parent::__construct();
        $this->load->model('mblog');
    }

	public function index(){
		if($this->uri->segment(2) == "detail")
		{
			// get last segment & replace
			$bname = $this->uri->segment(3);
			$replace = str_replace('-', ' ', $bname);

			// get only ID
			$string = $replace;
			$pieces = explode(' ', $string);
			$pid = array_pop($pieces);
			
			$data['archives'] 	= $this->mblog->get_archives();
			$data['posting'] 	= $this->mblog->get_detail($pid);
			$data['related']	= $this->mblog->related_post($pid);
			$data['recent']		= $this->mblog->recent_post();
			$data['title']		= $this->mblog->getTitle($pid);
			
			$this->load->view('ipapa/blog/frontpage/header',$data);
			$this->load->view('ipapa/blog/frontpage/detail',$data);
			$this->load->view('ipapa/blog/frontpage/footer');
		}
	}
}