<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Map_cache extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

    function get_map_cache()
    {
        return $this->db->query("SELECT * FROM geocode_cache")->result();
    }
}