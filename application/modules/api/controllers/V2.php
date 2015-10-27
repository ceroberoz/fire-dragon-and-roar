<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V2 extends CI_Controller {

	public function index()
	{
		redirect('/');
	}

    function debug_post()
    {
        $referral_code = $this->input->post('referral_code');

        $a = $this->db->where('referral_code',$referral_code)
                          ->from('referral')
                          ->count_all_results();

        if($a <= 10)
        {
            $data = array('msg' => 'ok');
        }
        else
        {
            $data = array('msg' => 'not ok');
        }

        //$data = $_POST;

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data)); 
    }

    // API newsfeeds
    function add_newsfeeds()
    {
        // api name
        $name   = "add_newsfeeds";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        
        // var
        $uid        = $this->input->post('users_id');
        $vid        = $this->input->post('video_id');
        $post_type  = $this->input->post('post_type'); // karaoke / duet / feed
        $comment    = $this->input->post('comment');
        $duet_image = $this->input->post('duet_image');

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

            $this->load->model('mvideokeapi_v2');
            $this->add_newsfeeds($uid,$vid,$post_type,$comment,$duet_image);

            $datas = "Success";
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

    function get_newsfeeds()
    {
        // api name
        $name   = "get_newsfeeds";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get users

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
            $datas = $this->mvideokeapi_v2->get_newsfeeds();

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

    // API favorite

    //
    function users_favorites_check($uid,$vid)
    {
        $this->db->select('*')
                 ->from('favorites')
                 ->where('users_id',$uid)
                 ->where('video_id',$vid);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $is_valid = "1";
            return $is_valid;
        }
        else
        {
            $is_valid = "0";
            return $is_valid;
        }
    }

    function add_favorite()
    {
        // api name
        $name   = "add_favorite";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        
        // var
        $uid = $this->input->post('users_id');
        $vid = $this->input->post('video_id');

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
            $favorite_check = $this->users_favorites_check($uid,$vid);
            // validate me
            if($favorite_check == "1")
            {
                // kalau ada
                $code    = "409";
                $message = "Conflict";
                $datas   = "You already favorite this video";
            }
            else
            {
                // kalau ga ada
                $code    ="202";
                $message = "Accepted";

                // do magics
                $this->load->model('mvideokeapi_v2');          
                $this->mvideokeapi_v2->add_favorite($uid,$vid);

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

    function delete_favorite()
    {
        // api name
        $name   = "delete_favorite";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);
        

        // get vars
        $uid    = $this->input->post('users_id');
        $vid = $this->input->post('video_id');

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
            $this->mvideokeapi_v2->delete_favorite($uid,$vid);

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
        
        // vars
        $uid    = $this->input->post('users_id');
        $avatar = $this->input->post('avatar');

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
            if (file_exists('./users/'.$uid.'/'))
            {
                // user dir ada, upload aja kaks               

                //cek direktori avatar
                if (!file_exists('./users/'.$uid.'/avatar/'))
                {
                    // kalau ga ada
                    mkdir('./users/'.$uid.'/avatar/', 0777, TRUE);

                    // do upload
                    $this->do_upload_avatar($uid,$avatar);
                    
                    // update user info
                    $this->load->model('mvideokeapi_v3');
                    $this->mvideokeapi_v3->update_user_avatar($avatar,$uid);

                    // getreturn
                    $user = $this->ion_auth->user()->row();

                    $userinfo = array(
                        'users_id' => $user->id,
                        'avatar' => $user->avatar,
                        );


                    $code    ="202";
                    $message = "Accepted";
                    $datas   = $userinfo; 

                    }
                else
                {
                    // kalau ada
                    // do upload
                    $this->do_upload_avatar($uid,$avatar);

                    // update user info
                    $this->load->model('mvideokeapi_v3');
                    $this->mvideokeapi_v3->update_user_avatar($avatar,$uid);

                    // getreturn
                    $user = $this->ion_auth->user()->row();

                    $userinfo = array(
                        'users_id' => $user->id,
                        'avatar' => $user->avatar,
                        );


                    $code    ="202";
                    $message = "Accepted";
                    $datas   = $userinfo; 

                }
            }
            else
            {
                // user dir ga ada, bikin dulu bray
                mkdir('./users/'.$uid.'/', 0777, TRUE);

                //cek direktori avatar
                if (!file_exists('./users/'.$uid.'/avatar/'))
                {
                    // kalau ga ada
                    mkdir('./users/'.$uid.'/avatar/', 0777, TRUE);

                    // do upload
                    $this->do_upload_avatar($uid,$avatar);
                    
                    // update user info
                    $this->load->model('mvideokeapi_v3');
                    $this->mvideokeapi_v3->update_user_avatar($avatar,$uid);

                    // getreturn
                    $user = $this->ion_auth->user()->row();

                    $userinfo = array(
                        'users_id' => $user->id,
                        'avatar' => $user->avatar,
                        );


                    $code    ="202";
                    $message = "Accepted";
                    $datas   = $userinfo; 

                    }
                else
                {
                    // kalau ada
                    // do upload
                    $this->do_upload_avatar($uid,$avatar);

                    // update user info
                    $this->load->model('mvideokeapi_v3');
                    $this->mvideokeapi_v3->update_user_avatar($avatar,$uid);

                    // getreturn
                    $user = $this->ion_auth->user()->row();

                    $userinfo = array(
                        'users_id' => $user->id,
                        'avatar' => $user->avatar,
                        );


                    $code    ="202";
                    $message = "Accepted";
                    $datas   = $userinfo; 

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

    // upload
    function do_upload_avatar($uid,$avatar)
    //function do_upload_avatar()
    {
        //$uid = "1";
        //$avatar = $this->input->post('avatar');

        $config['upload_path']          = './users/'.$uid.'/avatar/';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->do_upload('avatar');
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
            // cek kode sendiri apa bukan
            $this->db->select('*')
                     ->from('users')
                     ->where('id',$users_id)
                     ->where('referral',$referral_code);

            $query = $this->db->get();

            if($query->num_rows() > 0) 
            //if($this->mvideokeapi_v2->check_referral_code($users_id,$referral_code) == 1)
            {
                $code    = "401";
                $message = "Unauthorized";
                $datas   = "You cannot use your own referral code";
            }
            else
            {
                // kalau bukan
                // cek udah 10 apa belum

                $aa = $this->db->where('referral_code',$referral_code)
                          ->from('referral')
                          ->count_all_results();

                if($aa <= 10)
                {
                    // ok
                    // cek kode udah pernah dipakai apa belum
                    $this->db->select('*')
                             ->from('referral')
                             ->where('users_id',$users_id)
                             ->where('referral_code',$referral_code);

                    $query2 = $this->db->get();

                    if($query2->num_rows() > 0)
                    //if($this->mvideokeapi_v2->check_linked_referral($users_id,$referral_code) == 1)
                    {
                        // udah kepake masgan
                        $code    = "403";
                        $message = "Forbidden";
                        $datas   = "Code Expired";
                    }
                    else
                    {
                        // kode valid 
                        $code    ="202";
                        $message = "Accepted";
                        
                        // do magics
                        $this->load->model('mvideokeapi_v2');   

                        // topup both users          
                        $this->mvideokeapi_v2->do_referral_user($users_id,$source,$topup_id);
                        $this->mvideokeapi_v2->do_topup_referral($referral_code,$source,$topup_id);

                        // record referral
                        $this->mvideokeapi_v2->log_referral($users_id,$referral_code);
                        
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
                }
                else
                {
                    // not ok
                    $code    = "403";
                    $message = "Forbidden";
                    $datas   = "Code Expired";
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

        //$key = "playstation4joss";
        //$swift = $this->input->post('password');//"DybvIybHAUaQBvZ6JzfTwHNBE8we8rR4sdFEth4QTSQ=";
        //$identity = $this->input->post('username'); //"azisseno@icloud.com"; 

        //if ( $swift && $identity )
        //{
        //    $password = $this->stripPadding($this->decrypt($swift, $key));
        //}
        //else
        //{
        //    $password = "";
       // }


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
                        $this->db->select('id,balance,phone,username,first_name,last_name,avatar,referral')
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

                            // get latest package
                            $this->db->select('package_transaction.date_valid, package.name as package_name,package.include_duet')
                                     ->from('package_transaction')
                                     ->join('package','package.id = package_transaction.package_id','LEFT')
                                     ->where('users_id',$uid)
                                     ->order_by('date_valid','ASC')
                                     ->limit(1);

                            $query3 = $this->db->get();

                            if($query3->num_rows() > 0)
                            {
                                // define fun                                
                                $check_date     = $query3->row()->date_valid;
                                $current_date   = date('Y-m-d');
                                if($check_date <= $current_date)
                                {
                                    // invalid
                                    $package_name   = "";
                                    $include_duet   = "";
                                    $date_valid     = "";
                                }
                                else
                                {
                                    // masih ada paket gan
                                    $package_name   = $query3->row()->package_name;
                                    $include_duet   = $query3->row()->include_duet;
                                    $date_valid     = $check_date;
                                    
                                }
                            }
                            else
                            {
                                // invalid
                                $package_name   = "";
                                $include_duet   = "";
                                $date_valid     = "";
                            }
                            


                            $datas   = array(
                                'uid'       => $uid,
                                'email'     => $email,
                                'first_name'=> $first_name,
                                'last_name' => $last_name,
                                'avatar'    => $avatar,
                                'referral'  => $referral,
                				'phone' => $phone,
                                'username'  => $username,
                                'balance'  => $balance,
                                'package_name' => $package_name,
                                'include_duet' => $include_duet,
                                'date_valid'    => $date_valid
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

    function get_users_favorites()
    {
        // api name
        $name   = "get_users_favorites";

        // auth
        $device_id  = $this->input->post('device_id');
        $date_access = $this->input->post('date_access');
        $access_code  = $this->input->post('access_code');

        $a = $device_id.$date_access;
        $b = md5($a);

        //vars

        $uid = $this->input->post('users_id');
        

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
            $datas = $this->mvideokeapi_v2->get_users_favorites($uid);
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

        //vars

        $uid = $this->input->post('users_id');
        

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
            $datas = $this->mvideokeapi_v2->sortby_song($uid);
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
        $uid = $this->input->post('users_id');

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

    // Password encypt
      function decrypt($ciphertext_base64, $key)
      {
      //$this->load->model('webapi');
      $ciphertext = base64_decode($ciphertext_base64);

      $ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
      if (strlen($ciphertext) < $ivSize) {
      throw new Exception('Missing initialization vector');
      }

      $iv = substr($ciphertext, 0, $ivSize);
      $ciphertext = substr($ciphertext, $ivSize);

      $plaintext = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext, MCRYPT_MODE_CBC, $iv);
      //return $plaintext;
     //echo "decrypy berhasil dipanggil";

      return rtrim($plaintext, "\0");
      }
          
          
      function stripPadding($value)
      {
      //$this->load->model('webapi');
        $pad = ord($value[($len = strlen($value)) - 1]);
               // echo "stripPadding berhasil dipanggil";

         return $this->paddingIsValid($pad, $value) ? substr($value, 0, $len - $pad) : $value;
      }

      function paddingIsValid($pad, $value)
      {
      $this->load->model('webapi');
          $beforePad = strlen($value) - $pad;
              //  echo "paddingIsValid berhasil dipanggil";

          return substr($value, $beforePad) == str_repeat(substr($value, -1), $pad);
      }
}
