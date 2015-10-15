<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V2 extends CI_Controller {

	public function index()
	{
		redirect('/');
	}

    function debug_post()
    {
        $data = $_POST;

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data)); 
    }

    // API update users
    function update_user_profile()
    {
        $name   = "update_user_profile";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        
        
        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // get vars
            $first_name = $this->input->post('first_name');
            $last_name  = $this->input->post('last_name');
            $gender     = $this->input->post('gender');
            $born_date  = $this->input->post('born_date');
            $uid        = $this->input->post('users_id');

            // do magics
            $this->load->model('mvideokeapi_v3');
            $this->mvideokeapi_v3->update_user_profile($first_name,$last_name,$gender,$born_date,$uid);

            $datas = "NULL";

        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data)); 
    }

    function update_user_avatar()
    {
        $name   = "update_user_avatar";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        
        
        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            //cek direktori user
            if (!file_exists('path/to/directory'))
            {
                // kalau ga ada
                mkdir('path/to/directory', 0777, true);
            }
            else
            {
                // kalau ada
            }


        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data)); 
    }

    // API V3 beta
    function get_channel_list()
    {
        $name   = "get_channel_list";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        
        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->get_channel_list();

        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data)); 
    }

    function get_channel_content_prev() // max 3
    {
        $name   = "get_channel_content_prev";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        $channels_id = $this->input->post('channels_id');
        
        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $channels_id == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->get_channel_content_prev($channels_id);

        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data)); 
    }

    function get_channel_content() // max 3
    {
        $name   = "get_channel_content";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        $channels_id = $this->input->post('channels_id');
        
        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $channels_id == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->get_channel_content($channels_id);

        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data)); 
    }

    // API V2 starts here
    function referral()
    {
        // lo nambah gw nambah  
        // api name
        $name   = "referral";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        $users_id    = $this->input->post('users_id');
        $referral_code  = $this->input->post('referral_code');

        // statics
        $source     = "referral";
        $topup_id   = "2"; // equals 10 pts, needs config in future

        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');

            // topup both users          
            $this->mvideokeapi_v2->do_referral_user($users_id,$source,$topup_id);
            $this->mvideokeapi_v2->do_topup_referral($referral_code,$source,$topup_id);
            
            // get users current balance (ion auth)
            $users_balance  = $this->ion_auth->user()->row()->balance;

            //$datas   = $referral_code; 
            //selamat balance kamu bertambah 10000,
            $paket_ceban = "10 pts";

            $datas  = array(
                'added_package' => $paket_ceban,
                'users_balance' => $users_balance
                );
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data)); 
    }


    function check_email()
    {
        // api name
        $name   = "check_email";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get video_id
        $email = $this->input->post('email');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $email == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {  
            //$datas   = "Success";   

            if (!$this->ion_auth->email_check($email))
            {
                // if not exist
                $code    ="202";
                $message = "Accepted";

                $datas   = "Success";
                //$group_name = 'users';
                //$this->ion_auth->register($username, $password, $email, $additional_data, $group_name)
            }
            else
            {
                // if exist
                // if not exist
                $code    ="406";
                $message = "Not Accepted";

                $datas   = "Exist";
            }
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function check_phone()
    {
        // api name
        $name   = "check_phone";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get video_id
        $phone = $this->input->post('phone');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $phone == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {  
            //$datas   = "Success";   
            $this->db->select('phone')
                     ->from('users')
                     ->where('phone',$phone);

            $query = $this->db->get();

            if($query->num_rows() > 0)
            {
                $aa = $query->row()->phone;

                if($aa == $phone)
                {

                    // if exist
                    // if not exist
                    $code    ="406";
                    $message = "Not Accepted";

                    $datas   = "Exist";
                
                }
                else
                {
                   // if unknown
                    $code    = "424";
                    $message = "Failed Dependency";
                    $datas   = "NULL";                    
                }
            }
            else
            {
                $code    ="202";
                $message = "Accepted";

                $datas   = "Success";
            }
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function get_topup_package()
    {
        // api name
        $name   = "get_topup_package";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        //$users_id    = $this->input->post('users_id');

        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->get_topup_package();

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function do_topup() //done
    {
        // api name
        $name   = "do_topup";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get video_id
        $uid = $this->input->post('users_id');
        $topup_id = $this->input->post('topup_id');
        $transaction_code = substr(str_shuffle(MD5(microtime())), 0, 10); 
        $source = $this->input->post('source'); // applepay, referral

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $uid == "" OR $topup_id == "" OR $transaction_code == "" OR $source == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');
                    
            $this->mvideokeapi_v2->do_topup($uid,$topup_id,$transaction_code,$source);
            $this->mvideokeapi_v2->do_topup_users($uid,$topup_id);  

            $users_id       = $this->ion_auth->user()->row()->id;
            $users_balance  = $this->ion_auth->user()->row()->balance;

            $datas = array(
                'users_id'  => $users_id,
                'balance'   => $users_balance
                );
            // return id & balance user

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function get_purchase_package()
    {
        // api name
        $name   = "get_purchase_package";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        //$users_id    = $this->input->post('users_id');

        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->get_purchase_package();

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function do_purchase() //done
    {
        // api name
        $name   = "do_purchase";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get video_id
        $uid = $this->input->post('users_id');
        $package_id = $this->input->post('package_id');
        $transaction_code = substr(str_shuffle(MD5(microtime())), 0, 10); 
        //$source = $this->input->post('source'); // applepay, referral
        $date_add   = date("Y-m-d");

        // add second date, plus by week or month by package_id $date_plus
        //$favcolor = "red";

        $this->db->select('id,duration,duration_period,include_duet,price')
                 ->from('package')
                 ->where('package.id',$package_id);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $aa = $query->row()->duration;
            $bb = $query->row()->duration_period;

            $include_duet = $query->row()->include_duet;
            $price        = $query->row()->price;

            // get users balance
            $users_balance  = $this->ion_auth->user()->row()->balance;

            // check balance
            if($users_balance >= $price)
            {
                $cc = "+".$aa." ".$bb;

                if($b != "none")
                {
                    $date_plus = date('Y-m-d', strtotime($cc));
                }
                else
                {
                    $date_plus = date('Y-m-d');
                }
                //return $query->result();
                // if true
                if($device_id == "" OR $date_access == "" OR $access_code == "" OR $uid == "" OR $package_id == "" OR $transaction_code == "" OR $date_add == "" OR $date_plus == "")
                {
                    $code    = "400";
                    $message = "Bad Request";
                    $datas   = "NULL";
                }
                elseif($b != $access_code)
                {
                    $code    = "406";
                    $message = "Not Acceptable";
                    $datas   = "NULL";
                }
                else
                {
                    $code    ="202";
                    $message = "Accepted";
                    
                    // do magics
                    $this->load->model('mvideokeapi_v2');          
                    $this->mvideokeapi_v2->do_purchase($uid,$package_id,$transaction_code,$date_add,$date_plus);

                    // update user balance
                    $current_balance  = $this->ion_auth->user()->row()->balance;
                    $new_balance      = $current_balance - $price;

                    $this->mvideokeapi_v2->do_update_user_balance($uid,$new_balance);

                    // return area
                    // get valid date
                    $this->db->select('date_valid')
                             ->from('package_transaction')
                             ->where('transaction_code',$transaction_code);

                    $query2 = $this->db->get();

                    $valid_date = $query2->row()->date_valid;    

                    // ion auth
                    $users_balance  = $this->ion_auth->user()->row()->balance;            

                    $datas = array(
                        'users_id'      => $uid,
                        'package_id'    => $package_id,
                        'valid_date'    => $valid_date,
                        'include_duet'  => $include_duet,
                        'users_balance' => $users_balance
                        ); 
                }
            }
            else
            {
                // saldo kurang bos
                $code    = "402";
                $message = "Payment Required";
                $datas   = "NULL";
            }
            // end check balance
        }
        else
        {
            // false
            //return array();
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }

        

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

   // referral

    // misc
    function play_video()
    {
        // api name
        $name   = "play_video";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get video_id
        $video_id = $this->input->post('video_id');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $video_id == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->getplay_video($video_id);

            // add playcount
            $this->add_playcount($video_id);

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function add_playcount($video_id)
    {
        $this->load->model('mvideokeapi_v2');
        $this->mvideokeapi_v2->add_playcount($video_id);
    }

    function add_playlist()
    {
        // api name
        $name   = "add_playlist";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        $users_id      = $this->input->post('users_id');
        $playlist_name = $this->input->post('playlist_name');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $users_id == "" OR $playlist_name == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $this->mvideokeapi_v2->add_playlist($users_id,$playlist_name);

            $datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function add_to_playlist()
    {
        // api name
        $name   = "add_to_playlist";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        $playlist_identifier    = $this->input->post('playlist_identifier');
        $video_id       = $this->input->post('video_id');
        //$index_number   = $this->input->post('index_number');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $video_id == "" OR $playlist_identifier == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $this->mvideokeapi_v2->add_to_playlist($video_id,$playlist_identifier);

            $datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function get_playlist()
    {
        // api name
        $name   = "get_playlist";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        $users_id    = $this->input->post('users_id');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $users_id == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->get_playlist($users_id);

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function get_playlist_content()
    {
        // api name
        $name   = "get_playlist_content";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
       

        // get vars
        $playlist_identifier    = $this->input->post('playlist_identifier');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $playlist_identifier == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->get_playlist_content($playlist_identifier);
      
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function delete_playlist()
    {
        // api name
        $name   = "delete_playlist";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        $users_id    = $this->input->post('users_id');
        $playlist_identifier = $this->input->post('playlist_identifier');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $users_id == "" OR $playlist_identifier == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $this->mvideokeapi_v2->delete_playlist($users_id,$playlist_identifier);

            $datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function delete_playlist_content()
    {
        // api name
        $name   = "delete_playlist_content";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
       

        // get vars
        $video_id    = $this->input->post('video_id');
        $playlist_identifier = $this->input->post('playlist_identifier');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $video_id == "" OR $playlist_identifier == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $this->mvideokeapi_v2->delete_playlist_content($video_id,$playlist_identifier);

            $datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }


    // debugging API
	// blue area
	function register()
	{
		// api name
		$name   = "register";

		// auth
        $device_id	= $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        //$b = "3dd06a32a93919a9859d5fe75f4925ec";

        // vars
        $first_name = $this->input->post('first_name');
        $last_name  = $this->input->post('last_name');
 
        $username   = strtolower($first_name).strtolower($last_name);
        $email      = strtolower($this->input->post('email'));
        $password   = $this->input->post('password'); // id facebook / sosmed
        $source		= $this->input->post('source'); // Facebook, iOS, Android, Website
        $phone      = $this->input->post('phone');

        // identifier
        $aa = substr(str_shuffle(MD5(microtime())), 0, 6);
        $identifier = strtoupper($aa);

        // if Facebook
        //if($source == "Facebook")
        //{
            $avatar     = $this->input->post('avatar');
        //}

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $first_name == "" OR $last_name == "" OR $password == "" OR $email == "" OR $source == "" OR $username == "" OR $phone == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas 	 = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas 	 = "NULL";
        }
        else
        {

        	// check if email already in use with system
        	$this->db->select('source')
        			 ->from('users')
        			 ->where('email',$email)
        			 ->limit(1);

        	$query = $this->db->get();

        	if($query->num_rows() > 0)
        	{
        		$account_source = $query->row()->source;
        		// display error message
        		$code 	 = "409";
        		$message = "Conflict";
        		$datas 	 = "This e-mail ".$email." is already associated with ".$account_source." account";
        	}
        	else
        	{
                // check if phone already in use with system
                $this->db->select('phone')
                         ->from('users')
                         ->where('phone',$phone)
                         ->limit(1);

                $query = $this->db->get();

                if($query->num_rows() > 0)
                {
                    // display error message
                    $code    = "409";
                    $message = "Conflict";
                    $datas   = "This phone ".$phone." is already associated with system";
                }
                else
                {
                    $code    = "202";
                    $message = "Accepted";

                    // do magics
                    $this->load->model('mvideokeapi_v2');          
                    $this->mvideokeapi_v2->do_register($first_name,$last_name,$password,$email,$source,$username,$avatar,$phone,$identifier);

                    // get return
                    $this->db->select('id,referral,username')
                             ->from('users')
                             ->where('email',$email);
			
			$q3 = $this->db->get();

                    $uid      = $q3->row()->id;
                    $referral = $q3->row()->referral;
		$username_2 = $q3->row()->username;

                    $datas  = array(
                        'users_id'  => $uid,
                        'email'     => $email,
                        'referral'  => $referral,
			'username'  => $username_2
                        );
                }        		
        	}
        }          
        
        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));	
	}

	function login()
	{
		// api name
		$name   = "login";

		// auth
        $device_id	= $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        
        //$b = "23aba95525e13c1d3c9ead8d62e56171";

        // vars
        $password = $this->input->post('password');
        $email    = $this->input->post('email');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $email == "" OR $password =="")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas 	 = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas 	 = "NULL";
        }
        else
        {
            // check if email already in use with system
        	$this->db->select('source')
        			 ->from('users')
        			 ->where('email',$email)
        			 ->limit(1);

        	$query = $this->db->get();

        	if($query->num_rows() > 0)
        	{
        		$account_source = $query->row()->source;
        		// display error message
        		if($account_source == "Facebook")
        		{
        			$code = "200";
	        		$message = "OK";
	        		$datas = "Facebook";
        		}
        		else
        		{
                    $remember = TRUE;
                    //
                    if ($this->ion_auth->login($email, $password, $remember))
                    {
                        //
                        $this->db->select('id,phone,username,first_name,last_name,avatar,referral')
                             ->from('users')
                             ->where('email',$email)
                             ->limit(1);

                        $query2 = $this->db->get();

                        if($query2->num_rows() > 0)
                        {
                            $uid        = $query2->row()->id;
                            $first_name = $query2->row()->first_name;
                            $last_name  = $query2->row()->last_name;
                            $avatar     = $query2->row()->avatar;
                            $referral   = $query2->row()->referral;
            				$phone = $query2->row()->phone;
                            $username      = $query2->row()->username;
                            $balance      = $query2->row()->balance;

                             //if the login is successful
                            $code    ="202";
                            $message = "Accepted";
                            //$datas   = "Success";

                            $datas   = array(
                                'uid'       => $uid,
                                'email'     => $email,
                                'first_name'=> $first_name,
                                'last_name' => $last_name,
                                'avatar'    => $avatar,
                                'referral'  => $referral,
                				'phone' => $phone,
                                'username'  => $username,
                                'balance'  => $balance
                                );
                        }   
                        else
                        {
                            // if the login was un-successful
                            $code    ="401";
                            $message = "Unauthorized";
                            $datas   = "Incorrect email or passsword"; 
                        }
                        
                    }
                    else
                    {
                        // if the login was un-successful
                        $code    ="401";
                        $message = "Unauthorized";
                        $datas   = "Incorrect email or passsword";    
                    }

	           		// do magics
		        	//$this->load->model('mvideokeapi_v2');      	
		        	
                    //$login_pls = $this->mvideokeapi_v2->do_login($email,$password);

        		}
        	}
        	else
        	{
        		$code    = "400";
	            $message = "Bad Request";
	            $datas 	 = "NULL";
        	}
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));	
	}

    function debug_login()
    {
        $name       = "debug_login";
        $email      = "admin@admin.com";
        $password   = "password";
        $remember   = TRUE;
                    //
        if ($this->ion_auth->login($email, $password, $remember))
        {
            //if the login is successful
            $code    ="202";
            $message = "Accepted";
            $datas   = "Success";
        }
        else
        {
            // if the login was un-successful
            $code    ="401";
            $message = "Unauthorized";
            $datas   = "Incorrect email or password";    
        }

        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));  

    }

	function logout()
	{
		// api name
		$name   = "logout";

		// auth
        $device_id	= $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas 	 = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas 	 = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
        	$this->load->model('mvideokeapi_v2');      	
        	$this->mvideokeapi_v2->do_logout();

        	$datas 	 = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));	
	}

    // debugging API
    // yellow area
    function topchart()
    {
        // api name
        $name   = "topchart";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
         

        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->get_topchart();

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function popular()
    {
        // api name
        $name   = "popular";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->get_popular();

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    // debugging API (night)
    // red area

    function sortby_song()
    {
        // api name
        $name   = "sortby_song";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->sortby_song();

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function sortby_artist()
    {
        // api name
        $name   = "sortby_artist";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->sortby_artist();

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function get_artistvideo()
    {
        // api name
        $name   = "get_artistvideo";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);

        // vars
        $artists_id = $this->input->post('artists_id');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $artists_id =="")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->get_artistvideo($artists_id);

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function sortby_favorite()
    {
        // api name
        $name   = "sortby_favorite";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        
        

        // vars
        $users_id = $this->input->post('users_id');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $users_id == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->sortby_favorite($users_id);

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function sortby_newrelease()
    {
        // api name
        $name   = "sortby_newrelease";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->sortby_newrelease();

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function sortby_popular()
    {
        // api name
        $name   = "sortby_popular";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        if($device_id == "" OR $date_access == "" OR $access_code == "")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->sortby_popular();

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    // debugging malam minggu
    // pink area
    function get_recommends() // needs moar with genre & year
    {
        // api name
        $name   = "get_recommends";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get video_id
        $video_id = $this->input->post('video_id');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $video_id =="")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->get_recommends($video_id);

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    // grey area
    function get_userinfo()
    {
        // api name
        $name   = "get_userinfo";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        //$b = "23aba95525e13c1d3c9ead8d62e56171";

        // get users
        $users_id = $this->input->post('users_id');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $users_id =="")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->get_userinfo($users_id);

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function count_total_playlist()
    {
        // api name
        $name   = "count_total_playlist";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get users
        $users_id = $this->input->post('users_id');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $users_id =="")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->count_total_playlist($users_id);

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function count_total_favorites()
    {
        // api name
        $name   = "count_total_favorites";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        //$b = "23aba95525e13c1d3c9ead8d62e56171";

        // get users
        $users_id = $this->input->post('users_id');

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $users_id =="")
        {
            $code    = "400";
            $message = "Bad Request";
            $datas   = "NULL";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "NULL";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');          
            $datas = $this->mvideokeapi_v2->count_total_favorites($users_id);

            //$datas   = "Success";   
        }

        // data
        $data = array(
            'code'    => $code,
            'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );
        
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }
}
