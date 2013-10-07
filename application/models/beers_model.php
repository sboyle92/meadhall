<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/************************************
*	Admin_model for Audit Software	*
*	Author: Shawn Boyle				*
*	Email: sboyle92@gmail.com		*
*	Copyright © 2012 Shawn Boyle	*
************************************/ 

class Beers_model extends CI_Model {

	// grab beer info from database
	function get_beers()
	{
		$this->db->select('*');
		$this->db->from('beers');
		$this->db->join('brewery', 'brewery.br_id = beers.brewery');
		$this->db->join('categories', 'categories.cat_id = beers.category', 'right');
		$this->db->order_by('categories.parent_id'); 

		$query = $this->db->get();
		return $query->result();
	}
	
	function get_beers_by_cat()
	{


		$query = $this->db->query('SELECT * 
			FROM (

			SELECT c . * , COALESCE( NULLIF( c.parent_id, 0 ) , c.cat_id ) AS groupID, 
			CASE WHEN c.parent_id =0
			THEN 1 
			ELSE 0 
			END AS isparent, 
			CASE WHEN p.parent_id =0
			THEN c.cat_id
			END AS orderbyint
			FROM categories c
			LEFT JOIN categories p ON p.cat_id = c.parent_id
			)c
			LEFT JOIN beers b ON b.category = c.cat_id
			LEFT JOIN brewery br ON br_id = b.brewery
			ORDER BY groupID, isparent DESC , orderbyint, cat_name, b.name DESC');
		return $query->result();
	}
/*
	function validate()
	{
		$this->db->where('uUserName', $this->input->post('userName'));
		$this->db->where('uPassWord', sha1($this->input->post('passWord')));
		$query = $this->db->get('aUsers');
		
		if($query->num_rows == 1)
		{
			//return true;
			return $query->result();
		}
	}
	
	// change login/logout time in database
	function set_loginout($key, $value)
	{
		$this->db->where($key, $value);
		$this->db->update('aUsers', array('uLastActive' => time()));
	}
	
	// check if user is logged in
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
	// TO DO create a styled page for this
			echo 'You don\'t have permission to access this page. <a href="'.base_url().'admin">Login</a>';	
			die();		
		}		
	}
	
	// get info of selected item - audit, clause, or staff member 
	function item($table, $key, $value)
	{
		$this->db->where($key, $value);
		$query = $this->db->get($table);
		return $query->result();	
	}
	
	// get question(s) based on audit/clause 
	function Xitem($table, $key, $value)
	{
		$this->db->where($key, $value);
		$query = $this->db->get($table);
		return $query->result();	
	}
	
	// get user info
	function edit_user($id)
	{
		$this->db->select('*');
		$this->db->where('uID', $id);
		$query = $this->db->get('aUsers');
		return $query->result();	
	}
	
	function update_user($id)
	{
		$data = array(
			'uFirstName' => $this->input->post('firstName'),
			'uLastName' => $this->input->post('lastName'),
			'uUserName' => $this->input->post('userName'),
			'uEmail' => $this->input->post('email'),
			'uUserLevel' => $this->input->post('userLevel'),
			'uActive' => $this->input->post('active')			
		);
		$this->db->where('uID', $id);
		$update = $this->db->update('aUsers', $data);
		
		if($this->input->post('uPassWord') != '')
		{
			$pass = array(
				'uPassWord' => sha1($this->input->post('passWord'))
			);
			$this->db->where('uID', $id);
			$update = $this->db->update('aUsers', $pass);	
		}
		return $update;
	}
	
	// create new admin user
	function create_member()
	{
		$new_member = array(
			'uFirstName' => $this->input->post('firstName'),
			'uLastName' => $this->input->post('lastName'),
			'uEmail' => $this->input->post('email'),			
			'uUserName' => $this->input->post('userName'),
			'uPassWord' => sha1($this->input->post('passWord')),
			'uCreatedOn' => time(),
			'uActive' => $this->input->post('access')						
		);
		$insert = $this->db->insert('aUsers', $new_member);
		return $insert;
	}

	// get audit status
	function get_status()
	{
		$this->db->select('*');
		$this->db->from('aAuditStatus');
		//$this->db->where('aName', '');
		$query = $this->db->get();
		return $query->result();
	}
	
	// list items
	function list_items($select, $table, $value, $sort)
	{	
		$this->db->select($select);
		$this->db->from($table);
		$this->db->order_by($value, $sort);
		$query = $this->db->get();
		return $query->result();
	}	
	
	// list audits
	function list_audits($select, $table, $value, $sort)
	{	
		$this->db->select($select);
		$this->db->from($table);
		$this->db->order_by($value, $sort);
		$query = $this->db->get();
		return $query->result();
	}
	
	// delete an item from database
	function delete($table, $item, $value)
	{
		$this->db->where($item, $value);
		$query = $this->db->delete($table);
		return $query;
	}
	*/	
}