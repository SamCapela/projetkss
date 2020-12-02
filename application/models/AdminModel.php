<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class AdminModel extends CI_Model

{
	function __construct()
	{
			// Call the Model constructor
			parent::__construct();
	}
	
	public static function getUsers()
	{
		$ci =& get_instance();
		$ci->db->select('*');
		$ci->db->from('customers');
		$query = $ci->db->get();
		return $query->result_array();
	}
	
	public static function addUser()
	{
		return true;
	}
	
}
