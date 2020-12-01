<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class InvoiceModel extends CI_Model

{
	public $date;
    public $title;
    public $reference;
    public $company;
    public $sentemail;
    public $sentfirstname;
    public $sentlastname;
    public $sentadress;


	function __construct()
	{
			// Call the Model constructor
			parent::__construct();
	}
	
	public static function getInvoice($id)
	{
		$ci =& get_instance();
		$ci->db->select('*');
		$ci->db->where('id_invoice', $id);
		$ci->db->from('invoice');
		$query = $ci->db->get();
		return $query->result_array();
	}
	
}
