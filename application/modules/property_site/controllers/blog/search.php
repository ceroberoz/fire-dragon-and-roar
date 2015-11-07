<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('mblog');
	}

	public function index(){
		$keyword = $this->input->post('keyword');
		//$a = str_replace("","+",$keyword);
		$this->db->select('*')
				 ->from('posting')
				 ->like('title',$keyword)
				 ->like('description',$keyword)
				 ->order_by('pk_posting_id','DESC');
		$rows = $this->db->get();
		//redirect('blog/search/'.$a);
		//$config['base_url'] = "site_url('blog/search/'".$a.")";
		$config['base_url'] = base_url().'blog/search';	
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
		
		$pid = $this->uri->segment(4);
		$data['posting'] 	= $this->mblog->get_detail($pid);
		$data['archives'] 	= $this->mblog->get_archives();
		$data['pagination'] = $this->pagination->create_links();
		$data['keyword'] 	= $this->mblog->tempKeywordSearch();
		$data['numRows']	= $this->mblog->numRowsQuerySearch();
		$data['resultime']	= $this->mblog->resultTimeQuerySearch();
		$data['result'] 	= $this->mblog->articleSearch($config['per_page'],$page);
		
		$this->load->view('ipapa/blog/frontpage/header',$data);
		$this->load->view('ipapa/blog/frontpage/search-result',$data);
		$this->load->view('ipapa/blog/frontpage/footer');
	}
	
}