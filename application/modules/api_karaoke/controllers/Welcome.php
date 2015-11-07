<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

		function do_topup_users($uid,$topup_id)
    {
        $this->db->select('price')
                 ->from('topup')
                 ->where('topup.id',$topup_id);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            //return $query->result();
            // kalau ada hasil
            $a = $query->row()->price;

            $this->db->select('balance')
                 ->from('users')
                 ->where('users.id',$uid);

            $query2 = $this->db->get();

            if($query2->num_rows() > 0)
            {
                //return $query->result();
                // kalau ada hasil
                $b = $query2->row()->balance;

                $c = $b + $a;

                $data = array(
                    'balance'   => $c
                    );

                $this->db->where('users.id',$uid)
                         ->update('users',$data);
            }
            else
            {
            	// add new balance
                //return array();
            	$c = "10000";

                $data = array(
                    'balance'   => $c
                    );

                $this->db->where('users.id',$uid)
                         ->update('users',$data);
            }
        }
        else
        {
            return array();
        }
    }

    function snipplet_do_referral_users(){
    	        // get reffere's
    	$referral_c = "E8FD0B";
    	$topup_id 	= "2";
    	$source 	= "referral";

        $this->db->select('id,balance')
                 ->from('users')
                 ->where('users.referral',$referral_c);

        $query = $this->db->get();

        $uid2  = $query->row()->id;

//	$uid = $uid2;
        $transaction_code2 = substr(str_shuffle(MD5(microtime())), 0, 10);   
// tambah saldo user
        //$this->do_topup_users($uid,$topup_id);

        //$data = array(
        //    'topup_id'  => $topup_id,
        //    'users_id'  => $uid2,
        //    'transaction_code' => $transaction_code2,
        //    'source'    => $source
        //    );

        //$this->output->set_content_type('application/json')
        //             ->set_output(json_encode($data));

       // $this->db->insert('topup_transaction',$data);
// hotfix add referral
        //$this->do_topup_users2($uid2,$topup_id);  

        $this->load->model('mvideokeapi_v2');
        // tambah saldo user
        $uid = $uid2;

        $this->mvideokeapi_v2->do_topup_users($uid,$topup_id);
        

        $this->db->select('id,balance')
                 ->from('users')
                 ->where('users.referral',$referral_c);

        $query2 = $this->db->get();

        $balance = $query2->row()->balance;

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($balance));

    }
}
