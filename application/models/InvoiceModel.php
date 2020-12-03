<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


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
		$ci = &get_instance();
		$ci->db->select('*');
		$ci->db->where('id_invoice', $id);
		$ci->db->from('invoice');
		$query = $ci->db->get();
		return $query->result_array();
	}

	public static function getAllInvoices($id_customer)
	{
		$ci = &get_instance();
		$ci->db->select('*');
		$ci->db->where('id_customer', $id_customer);
		$ci->db->from('invoice');
		$query = $ci->db->get();
		return $query->result_array();
	}

	public static function addInvoice($value_invoice)
	{
		$ci = &get_instance();
		$rand_reference = rand(100, 999);
		$reference = '#F' . $_SESSION['id_customer'] . $rand_reference;
		$data_invoice = array(
			'id_customer' => $_SESSION['id_customer'],
			'invoice_date' => $value_invoice['invoice_date'],
			'title' => $value_invoice['title'],
			'reference' => $reference,
			'company' => $value_invoice['company'],
			'sent_email' => $value_invoice['sent_email'],
			'sent_firstname' => $value_invoice['sent_firstname'],
			'sent_lastname' => $value_invoice['sent_lastname'],
			'sent_address' => $value_invoice['sent_address']
		);

		$ci->db->insert('invoice', $data_invoice);
		$id_invoice = $ci->db->insert_id();
		return $id_invoice;
	}

	public static function addInvoiceDetail($value_invoice_detail)
	{
		$ci = &get_instance();
		$ci->db->insert('invoice_detail', $value_invoice_detail);
	}
	
	public static function exportInvoiceCsv()
	{
	 
		$response = array();
	    $ci = &get_instance();
		$ci->db->select('*');
		$ci->db->from('invoice');
		$ci->db->join('invoice_detail', 'invoice_detail.id_invoice = invoice.id_invoice', 'left');
		$ci->db->where('id_customer', $_SESSION['id_customer']);
		$q = $ci->db->get();
		$response = $q->result_array();
	 
		return $response;
	}
	
	public static function getDetails($id)
	{
		$ci = &get_instance();
		$ci->db->select('*');
		$ci->db->where('id_invoice', $id);
		$ci->db->from('invoice_detail');
		$query = $ci->db->get();
		return $query->result_array();
	}

	// push

}
