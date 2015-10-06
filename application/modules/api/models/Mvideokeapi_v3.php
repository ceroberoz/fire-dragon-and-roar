<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mvideokeapi_v3 extends CI_Model {

	function get_latest_feeds()
	{
		$this->db->select('
					users.username,
					users.id as users_id,
					artists.name as artists_name,
					artists.id as artists_id,
					video.title as video_title,
					video.id as video_id,
					video.cover as video_cover,
					user_video_pool.date_add
					')					)
				 ->from('user_video_pool')
				 ->join('users','users.id = user_video_pool.users_id','LEFT')
				 ->join('video','video.id = user_video_pool.video_id','LEFT')
				 ->join('artists','artists.id = video.artists_id','LEFT');

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

	function get_artist_info($artists_id)
	{
		$this->db->select('
					artists.cover_photo,
					artists.name as artist_name,
					video.title, video.is_karaoke,
					video.is_duet,
					favorites.is_favorite,
					video.id as video_id
					')
                 ->from('video')
                 ->join('artists','artists.id = video.artists_id','left')
                 ->join('favorites','favorites.video_id = video.id','left')
                 ->join('users','users.id = favorites.users_id','left')
                 ->where('artists.id',$artists_id)
		 		 ->where('video.is_karaoke','1')
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

	function get_artist_songs($artists_id)
	{
		$this->db->select('*')
				 ->from('video')
				 ->where('video.artists_id',$artists_id);

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

	function get_artist_songs_meta_total_songs($artists_id)
	{
		$this->db->where('video.artists_id',$artists_id)
				 ->from('video');

		$query = $this->db->count_all_results();

        if($query > 0)
        {
            return $query;
        }
        else
        {
            return array();
        }
	}

	function get_artist_songs_meta_total_genre($artists_id)
	{
		$this->db->select('genre.name as genre')
				 ->from('video')
				 ->join('genre','genre.id = video.genre_id','LEFT')
				 ->where('video.artists_id',$artists_id)
				 ->distinct();

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