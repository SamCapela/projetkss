<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class AuthModel extends CI_Model

{
	public $id_customer;
	public $firstname;
	public $lastname;
	public $civility;
	public $email;
	public $role;


	function __construct()
	{
			// Call the Model constructor
			parent::__construct();
	}
	
	public static function getCustomerLogin($email, $password)
	{
		$ci =& get_instance();
		$ci->db->select('*');
		$ci->db->where('email', $email);
		$ci->db->where('password', $password);
		$ci->db->from('customers');
		$query = $ci->db->get();
		return $query->result_array();
	}
	
	
	public static function getConnexionCustomer($email, $password)
	{
		$ci =& get_instance();
		$ci->db->select('id_customer');
		$ci->db->where('email', $email);
		$ci->db->where('password', $password);
		$ci->db->from('customers');
		$query = $ci->db->get();
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
}
