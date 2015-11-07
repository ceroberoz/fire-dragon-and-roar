<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archive extends CI_Controller{

  	function __construct()
    {
        parent::__construct();
        $this->load->model('mblog');
    }
	
	public function index()
	{
		$tgl = $this->uri->segment(3);

		$this->db->select('*')
				 ->from('posting')
				 ->like('t_added',$tgl)
				 ->order_by('t_added','DESC');
		$rows = $this->db->get();
		
		$config['base_url'] = base_url().'blog/archive/'.$tgl;
		$config['total_rows'] = $rows->num_rows();
	    $config['per_page'] = 3;
		$config['uri_segment'] = 4;

	    $config['full_tag_open'] = '<div class="pagination clearfix">
                                  <ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div>';
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;
	     
	    $this->pagination->initialize($config); 

	    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['posting'] 	= $this->mblog->get_archive($config['per_page'],$page);
	    $data['pagination'] = $this->pagination->create_links();
		
		$tgl  = $this->uri->segment(3);

		$data['archives'] 	= $this->mblog->get_archives();
		$data['archive']	= $this->mblog->archive_post($tgl);
		$data['tglarchive']	= $this->mblog->tgl_archive($tgl);
		$data['title2']		= $this->mblog->getTitle2($tgl);
		
		$this->load->view('ipapa/blog/frontpage/header',$data);
		$this->load->view('ipapa/blog/frontpage/archive-detail',$data);
		$this->load->view('ipapa/blog/frontpage/footer');
	}

	function detail()
	{
		if($this->uri->segment(3) == "detail")
		{
			// get last segment & replace
			$bname = $this->uri->segment(4);
			$replace = str_replace('-', ' ', $bname);

			// get only ID
			$string = $replace;
			$pieces = explode(' ', $string);
			$pid = array_pop($pieces);
			
			$data['archives'] 	= $this->mblog->get_archives();
			$data['posting'] 	= $this->mblog->get_detail($pid);
			$data['related']	= $this->mblog->related_post($pid);
			$data['recent']		= $this->mblog->recent_post();
			
			$this->load->view('ipapa/blog/frontpage/header',$data);
			$this->load->view('ipapa/blog/frontpage/detail',$data);
			$this->load->view('ipapa/blog/frontpage/footer');
		}
	}
}