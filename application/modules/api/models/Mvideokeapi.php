<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mvideokeapi extends CI_Model {
    // misc area
    function add_playcount($video_id)
    {
        $this->db->select('video.playcount')
                 ->from('video')
                 ->where('video.id',$video_id)
                 ->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            // kalau ada hasil
            $a = $query->row()->playcount;
            $b = $a + 1;

            $data = array('playcount' => $b);

            $this->db->where('id',$video_id)
                     ->update('video',$data);
        }
        else
        {
            return array();
        }        
    }

    function getplay_video($video_id)
    {
        $this->db->select('video.id as video_id,video.duration, video.is_karaoke, video.is_duet, artists.name as artist_name, video.title')
                 ->from('video')
                 ->join('artists','artists.id = video.id','left')
                 ->where('video.id',$video_id)
                 ->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    // blue area
    function do_register($first_name,$last_name,$password,$email,$source,$username,$avatar)
    {
        // ion auth magic
        // extra vars
        $additional_data = array(
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'source'     => $source,
            'avatar'     => $avatar,
            'username'   => $username
            );

        //$group = array('2');

        // do register
        // $this->ion_auth->register($username, $password, $email, $additional_data, $group);
        $this->ion_auth->register($username, $password, $email, $additional_data);
    }

    function do_logout()
    {
        // ion auth magic
        $this->ion_auth->logout();
    }

    function do_login($email,$password)
    {
        $remember = TRUE; // remember the user
        
        $this->ion_auth->login($email, $password, $remember);
    }
    

    // yellow area
    function get_topchart()
    {
        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.is_karaoke, video.is_duet, favorites.is_favorite, video.id as video_id')
                 ->from('video')
                 ->join('video_topten','video_topten.video_id = video.id','left')
                 ->join('artists','artists.id = video.artists_id','left')
                 ->join('favorites','favorites.video_id = video.id','left')
                 ->join('users','users.id = favorites.users_id','left')
                 //->group_by('video_topten.date_add')
                 ->order_by('video_topten.order_number','DESC')
                 ->limit(10);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    function get_popular()
    {
        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.is_karaoke, video.is_duet, favorites.is_favorite, video.id as video_id')
                 ->from('video')
                 ->join('artists','artists.id = video.artists_id','left')
                 ->join('favorites','favorites.video_id = video.id','left')
                 ->join('users','users.id = favorites.users_id','left')
                 ->order_by('video.playcount','DESC')
                 ->limit(10);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    // red area
    function sortby_song()
    {
        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.is_karaoke, video.is_duet, favorites.is_favorite, video.id as video_id')
                 ->from('video')
                 ->join('artists','artists.id = video.artists_id','left')
                 ->join('favorites','favorites.video_id = video.id','left')
                 ->join('users','users.id = favorites.users_id','left')
                 ->order_by('video.title','ASC');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    function sortby_artist()
    {
        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, artists.id as artists_id')
                 ->from('video')
                 ->join('artists','artists.id = video.artists_id','left')
                 ->group_by('artists.name')
                 ->order_by('artists.name','ASC');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    function get_artistvideo($artists_id)
    {
        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.is_karaoke, video.is_duet, favorites.is_favorite, video.id as video_id')
                 ->from('video')
                 ->join('artists','artists.id = video.artists_id','left')
                 ->join('favorites','favorites.video_id = video.id','left')
                 ->join('users','users.id = favorites.users_id','left')
                 ->where('artists.id',$artists_id)
                 ->order_by('video.title','ASC');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    function sortby_favorite($users_id)
    {
        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.is_karaoke, video.is_duet, favorites.is_favorite, video.id as video_id')
                 ->from('video')
                 ->join('artists','artists.id = video.artists_id','left')
                 ->join('favorites','favorites.video_id = video.id','left')
                 ->join('users','users.id = favorites.users_id','left')
                 ->where('favorites.users_id',$users_id)
                 ->where('favorites.is_favorite',"1")
                 ->order_by('favorites.is_favorite','ASC');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    function sortby_newrelease()
    {
        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.is_karaoke, video.is_duet, favorites.is_favorite, video.id as video_id')
                 ->from('video')
                 ->join('artists','artists.id = video.artists_id','left')
                 ->join('favorites','favorites.video_id = video.id','left')
                 ->join('users','users.id = favorites.users_id','left')
                 ->order_by('video.date_add','DESC');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    function sortby_popular()
    {
        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.is_karaoke, video.is_duet, favorites.is_favorite, video.id as video_id')
                 ->from('video')
                 ->join('artists','artists.id = video.artists_id','left')
                 ->join('favorites','favorites.video_id = video.id','left')
                 ->join('users','users.id = favorites.users_id','left')
                 ->order_by('video.playcount','ASC');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    // pink area
    function get_recommends($video_id)
    {
        if($video_id)
        {
            // get artist_name, genre & years
            $this->db->select('artists.name as artist_name, genre.name as genre, video.date_add as video_add')
                     ->from('video')
                     ->join('artists','artists.id = video.artists_id','left')
                     ->join('genre','genre.id = video.genre_id','left')
                     ->where('video.id',$video_id);

            $b = $this->db->get();

            $artist_name = $b->row()->artist_name;
            $genre       = $b->row()->genre;
            
            // split YYYY-MM-DD to YYYY
            $year_x      = $b->row()->video_add;
            $year_0      = new DateTime($year_x);
            $year        = $year_0->format("Y");


            // simple random AI based on artist (1) / genre (2) / year (3)
            $min = 1;
            $max = 3;

            $random_var = rand($min,$max);

            switch ($random_var) {
                case "1":
                    // random by artist
                    $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.id as video_id')
                             ->from('video')
                             ->join('artists','artists.id = video.artists_id','left')
                             ->like('artists.name',$artist_name)
                             ->order_by('artists.name',"random")
                             ->limit(2);

                     $query = $this->db->get();

                    if($query->num_rows() > 0)
                    {
                        return $query->result();
                    }
                    else
                    {
                        //return array();
                        // just randomize it.
                        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.id as video_id')
                                 ->from('video')
                                 ->join('artists','artists.id = video.artists_id','left')
                                 ->join('genre','genre.id = video.genre_id','left')
                                 ->order_by('artist.name',"random")
                                 ->limit(2);

                        $query = $this->db->get();

                        if($query->num_rows() > 0)
                        {
                            return $query->result();
                        }
                        else
                        {
                            return array();
                        }
                    }

                    break;
                case "2":
                    // random by genre
                    $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.id as video_id')
                             ->from('video')
                             ->join('artists','artists.id = video.artists_id','left')
                             ->join('genre','genre.id = video.genre_id','left')
                             ->like('genre.name',$genre)
                             ->order_by('artists.name',"random")
                             ->limit(2);

                     $query = $this->db->get();

                    if($query->num_rows() > 0)
                    {
                        return $query->result();
                    }
                    else
                    {
                        //return array();
                        // just randomize it.
                        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.id as video_id')
                                 ->from('video')
                                 ->join('artists','artists.id = video.artists_id','left')
                                 ->join('genre','genre.id = video.genre_id','left')
                                 ->order_by('artist.name',"random")
                                 ->limit(2);

                        $query = $this->db->get();

                        if($query->num_rows() > 0)
                        {
                            return $query->result();
                        }
                        else
                        {
                            return array();
                        }
                    }

                    break;
                case "3":
                    // random by year
                    $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.id as video_id')
                             ->from('video')
                             ->join('artists','artists.id = video.artists_id','left')
                             ->join('genre','genre.id = video.genre_id','left')
                             ->where('video.date_add',$year)
                             ->order_by('artist.name',"random")
                             ->limit(2);

                    $query = $this->db->get();

                    if($query->num_rows() > 0)
                    {
                        return $query->result();
                    }
                    else
                    {
                        //return array();
                        // just randomize it.
                        $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.id as video_id')
                                 ->from('video')
                                 ->join('artists','artists.id = video.artists_id','left')
                                 ->join('genre','genre.id = video.genre_id','left')
                                 ->order_by('artist.name',"random")
                                 ->limit(2);

                        $query = $this->db->get();

                        if($query->num_rows() > 0)
                        {
                            return $query->result();
                        }
                        else
                        {
                            return array();
                        }
                    }
                    break;
                default:
                    // just randomize it.
                    $this->db->select('artists.cover_photo, artists.name as artist_name, video.title, video.id as video_id')
                             ->from('video')
                             ->join('artists','artists.id = video.artists_id','left')
                             ->join('genre','genre.id = video.genre_id','left')
                             ->order_by('artist.name',"random")
                             ->limit(2);

                    $query = $this->db->get();

                    if($query->num_rows() > 0)
                    {
                        return $query->result();
                    }
                    else
                    {
                        return array();
                    }
            }
        }
        else{
            // if no input
            return array();
        }       
    }

    // playlist functions

    function add_playlist($users_id,$playlist_name)
    {
        $identifier = substr(str_shuffle(MD5(microtime())), 0, 10); 

        $data = array(
            'users_id'   => $users_id,
            'identifier' => $identifier,
            'name'       => $playlist_name
            );

        $this->db->insert('playlists',$data);
    }

    function add_to_playlist($video_id,$playlist_identifier)
    {
        $data = array(
            'video_id'   => $video_id,
            'playlists_identifier' => $playlist_identifier
            );

        $this->db->insert('playlist_video',$data);
    }

    function get_playlist($users_id)
    {
        $this->db->select('playlists.identifier, playlists.name')
                 ->from('playlists')
                 ->where('users_id',$users_id);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    function get_playlist_content($playlist_identifier)
    {
        $this->db->select('video.id as video_id, title, video.is_karaoke, video.is_duet, artists.name as artist_name')
                 ->from('video')
                 ->join('playlist_video','playlist_video.video_id = video.id','left')
                 ->join('artists','artists.id = video.artists_id','left')
                 ->where('playlist_video.playlists_identifier',$playlist_identifier);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    function delete_playlist($users_id,$playlist_identifier)
    {
        $this->db->where('identifier',$playlist_identifier)
                 ->where('users_id',$users_id)
                 ->delete('playlists');
    }

    function delete_playlist_content($video_id,$playlist_identifier)
    {
        $this->db->where('playlists_identifier',$playlist_identifier)
                 ->where('video_id',$video_id)
                 ->delete('playlist_video');
    }

    // grey area
    function get_userinfo($users_id)
    {
        $this->db->select('users.id as user_id,avatar,first_name,last_name,email')
                 ->from('users')
                 ->where('id',$users_id);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return array();
        }
    }

    function count_total_playlist($users_id)
    {
        $a = $this->db->where('users_id',$users_id)
                      ->from('playlists')
                      ->count_all_results();

        if($a > 0)
        {
            $b = $a;
        }
        else
        {
            $b = "0";
        }

        $data = array('total_playlist' => $b);

        return $data;
    }

    function count_total_favorites($users_id)
    {
        $a = $this->db->where('users_id',$users_id)
                      ->from('favorites')
                      ->count_all_results();

        if($a > 0)
        {
            $b = $a;
        }
        else
        {
            $b = "0";
        }

        $data = array('total_favorites' => $b);

        return $data;
    }
}
