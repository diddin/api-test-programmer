<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model
{
	function get_status()
	{
		return $this->db->get('Status');
	}
}