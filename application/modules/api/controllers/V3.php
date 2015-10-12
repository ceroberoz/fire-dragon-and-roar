<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V3 extends CI_Controller {

	public function index()
	{
		redirect('/');
	}

    function api_auth()
    {
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
            $datas   = "Invalid parameter";
        }
        elseif($b != $access_code)
        {
            $code    = "406";
            $message = "Not Acceptable";
            $datas   = "Access code missmatch";
        }
        else
        {
            $code    ="202";
            $message = "Accepted";
            $datas   = "";
        }

        // return
        $data = array(
            'code'    => $code,
            //'name'    => $name,
            'message' => $message,
            'data'    => $datas
            );

        return $data;
    }

    // base function, do not touch!

    function prototype()
    {
        $auth_check = $this->api_auth();
        $api_name   = "prototype";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            // do your stuff
            $data = "hello";
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    // API v3 starts here
    //
    // channel section

    function get_channel_list()
    {
        $auth_check = $this->api_auth();
        $api_name   = "get_channel_list";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->get_channel_list();

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function get_channel_content_prev()
    {
        $auth_check = $this->api_auth();
        $api_name   = "get_channel_content_prev";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // get vars
            $channels_id = $this->input->post('channels_id');

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->get_channel_content_prev($channels_id);

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function get_channel_content()
    {
        $auth_check = $this->api_auth();
        $api_name   = "get_channel_content";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // get vars
            $channels_id = $this->input->post('channels_id');

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->get_channel_content($channels_id);

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    // newsfeed section
    function get_latest_feeds()
    {
        $auth_check = $this->api_auth();
        $api_name   = "get_latest_feeds";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v3');
            $datas = $this->mvideokeapi_v3->get_channel_list();

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    // video / song section

    function sortby_song()
    {
        $auth_check = $this->api_auth();
        $api_name   = "sortby_song";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->sortby_song();

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function sortby_favorite()
    {
        $auth_check = $this->api_auth();
        $api_name   = "sortby_favorite";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->sortby_favorite();

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function sortby_newrelease()
    {
        $auth_check = $this->api_auth();
        $api_name   = "sortby_newrelease";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->sortby_newrelease();

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function sortby_popular()
    {
        $auth_check = $this->api_auth();
        $api_name   = "sortby_popular";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->sortby_popular();

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function sortby_artist()
    {
        $auth_check = $this->api_auth();
        $api_name   = "sortby_artist";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // do magics
            $this->load->model('mvideokeapi_v2');
            $datas = $this->mvideokeapi_v2->sortby_artist();

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function get_artist_info()
    {
        $auth_check = $this->api_auth();
        $api_name   = "get_artist_info";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // get vars
            $artists_id = $this->input->post('artists_id');

            // do magics
            $this->load->model('mvideokeapi_v3');
            $songs = $this->mvideokeapi_v3->get_artist_songs($artists_id);
            $songs_meta_total = $this->mvideokeapi_v3->get_artist_songs_meta_total_songs($artists_id);
            $songs_meta_genre = $this->mvideokeapi_v3->get_artist_songs_meta_total_genre($artists_id);

            // multidimension array

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    // deprecated, served as fallback function
    function get_artistvideo() // currently get_artist_songs
    {
        $data = $this->get_artist_songs();

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function get_artist_songs()
    {
        $auth_check = $this->api_auth();
        $api_name   = "get_artist_songs";

        // get the code
        $this->load->helper('array');
        $error_check = element('code', $auth_check);

        if($error_check == "202")
        {
            $code    ="202";
            $message = "Accepted";

            // get vars
            $artists_id = $this->input->post('artists_id');

            // do magics
            $this->load->model('mvideokeapi_v3');
            $datas = $this->mvideokeapi_v3->get_artist_songs($artists_id);

            // data
            $data = array(
                'code'    => $code,
                'name'    => $api_name,
                'message' => $message,
                'data'    => $datas
                );
        }
        else
        {
            // return errors
            $error_code     = element('code', $auth_check);
            $error_message  = element('message', $auth_check);
            $error_data     = element('data', $auth_check);

            $data = array(
                'code'    => $error_code,
                'name'    => $api_name,
                'message' => $error_message,
                'data'    => $error_data
                );
        }

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    //function malam minggu

}
