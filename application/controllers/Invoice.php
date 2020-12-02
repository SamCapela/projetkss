<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		$ci = & get_instance();
		$ci->load->model('InvoiceModel');
		$data['invoices'] = $ci->InvoiceModel->getAllInvoices($_SESSION['id_customer']);
		
		
		if($value = $this->input->get('add_invoice'))
		$this->addInvoice();
		elseif($value = $this->input->get('export_pdf'))
		$this->pdfGenerator($value);
		else
		$this->load->view('invoice', $data);
	}
	
	public static function pdfGenerator($id_invoice)
	{
		$ci = & get_instance();
		$ci->load->model('InvoiceModel');
		$data['invoices'] = $ci->InvoiceModel->getInvoice($id_invoice);
		$ci->load->view('pdf/pdf_generator', $data);
	}
	
	
	public static function addInvoice()
	{
		$ci = & get_instance();
		if($ci->input->post('add') && $ci->input->post('detail'))
		{
			$value_invoice = $ci->input->post('add');
			$value_invoice_detail = $ci->input->post('detail');
			$ci->load->model('InvoiceModel');
			$id_invoice = $ci->InvoiceModel->addInvoice($value_invoice);
			foreach($value_invoice_detail as $val)
			{
				//print_r($val['stop']);
				if(isset($val['stop']))
				continue;
				$data_invoice_detail = array(
					'id_invoice' => $id_invoice,
					'title' => $val['title'],
					'description' => $val['description'],
					'quantity' => $val['quantity'],
					'price' => $val['price']
				);
				$ci->InvoiceModel->addInvoiceDetail($data_invoice_detail);
				$ci->load->view('errors/invoice_success');
				// push

			}
		}
		$ci->load->view('invoice/add_invoice');
	}

	
}
