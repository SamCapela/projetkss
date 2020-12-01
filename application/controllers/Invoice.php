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
		if($value = $this->input->get('export_pdf'))
		$this->pdfGenerator($value);
		
		$this->load->view('invoice');
	}
	
	public static function pdfGenerator($id_invoice)
	{
		$ci = & get_instance();
		$ci->load->model('InvoiceModel');
		$data['invoices'] = $ci->InvoiceModel->getInvoice($id_invoice);
		$ci->load->view('pdf/pdf_generator', $data);
	}
	

	
}
