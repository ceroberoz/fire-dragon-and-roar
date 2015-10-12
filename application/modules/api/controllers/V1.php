<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V1 extends CI_Controller {

	public function index()
	{
		redirect('/');
	}

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->getplay_video($video_id);

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
        $this->load->model('Mvideokeapi');
        $this->mvideokeapi->add_playcount($video_id);
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
            $this->load->model('mvideokeapi');          
            $this->mvideokeapi->add_playlist($users_id,$playlist_name);

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
            $this->load->model('mvideokeapi');          
            $this->mvideokeapi->add_to_playlist($video_id,$playlist_identifier);

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->get_playlist($users_id);

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->get_playlist_content($playlist_identifier);
      
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
            $this->load->model('mvideokeapi');          
            $this->mvideokeapi->delete_playlist($users_id,$playlist_identifier);

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
            $this->load->model('mvideokeapi');          
            $this->mvideokeapi->delete_playlist_content($video_id,$playlist_identifier);

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
 
        $username   = strtolower($first_name) . ' ' . strtolower($last_name);
        $email      = strtolower($this->input->post('email'));
        $password   = $this->input->post('password');
        $source		= $this->input->post('source'); // Facebook, iOS, Android, Website

        // if Facebook
        //if($source == "Facebook")
        //{
            $avatar     = $this->input->post('avatar');
        //}

        if($device_id == "" OR $date_access == "" OR $access_code == "" OR $first_name == "" OR $last_name == "" OR $password == "" OR $email == "" OR $source == "" OR $username == "")
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
        		$code    ="202";
	            $message = "Accepted";

	            // do magics
	        	$this->load->model('mvideokeapi');      	
	        	$this->mvideokeapi->do_register($first_name,$last_name,$password,$email,$source,$username,$avatar);

                // get return
                $this->db->select('id')
                         ->from('users')
                         ->where('email',$email);

                $uid = $this->db->get()->row()->id;

	        	$datas 	= array(
                    'users_id' => $uid,
                    'email'     => $email
                    );
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
                        $datas   = "Incorrect email or passsword";    
                    }

	           		// do magics
		        	//$this->load->model('mvideokeapi');      	
		        	
                    //$login_pls = $this->mvideokeapi->do_login($email,$password);

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
        	$this->load->model('mvideokeapi');      	
        	$this->mvideokeapi->do_logout();

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->get_topchart();

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->get_popular();

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->sortby_song();

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->sortby_artist();

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->get_artistvideo($artists_id);

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->sortby_favorite($users_id);

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->sortby_newrelease();

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->sortby_popular();

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->get_recommends($video_id);

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->get_userinfo($users_id);

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->count_total_playlist($users_id);

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
        //$b = md5($a);
        $b = "23aba95525e13c1d3c9ead8d62e56171";

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
            $this->load->model('mvideokeapi');          
            $datas = $this->mvideokeapi->count_total_favorites($users_id);

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
