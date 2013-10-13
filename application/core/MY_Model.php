<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model
{
	
	function get_all()
	{
		//$this->db->select('*');
		//$this->db->from($this->table_name);

		//$query = $this->db->get($this->table_name);
		//return $query->result();
		return $this->db->get($this->table_name)->result();
	}

}