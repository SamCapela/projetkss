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
	
	public static function addUser($value)
	{
		$encrypt_password = hash('sha256', $value['password']);
		$ci =& get_instance();
		$data = array(
			'firstname' => $value['firstname'],
			'lastname' => $value['lastname'],
			'password' => $encrypt_password,
			'civility' => $value['civility'],
			'email' => $value['email'],
			'role' => $value['role']
		); 
		
		
		$ci->db->insert('customers', $data);
		return true;
	}
	
	public static function deletedCustomer($id_customer)
	{
		//var_dump($id_customer);die();
		$ci =& get_instance();
		$ci->db->where('id_customer', $id_customer);
		$ci->db->delete('customers');
		
		return true;
	}
	
}
