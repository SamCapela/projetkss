<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

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
		$ci = &get_instance();
		$ci->load->model('InvoiceModel');
		$data['invoices'] = $ci->InvoiceModel->getAllInvoices($_SESSION['id_customer']);


		if ($value = $this->input->get('add_invoice'))
			$this->addInvoice();
		elseif ($value = $this->input->get('export_pdf'))
			$this->pdfGenerator($value);
		elseif ($value = $this->input->get('export_csv'))
			$this->exportCsv();
		else
			$this->load->view('invoice', $data);
	}

	public static function pdfGenerator($id_invoice)
	{
		$ci = &get_instance();
		$ci->load->model('InvoiceModel');
		$data['invoices'] = $ci->InvoiceModel->getInvoice($id_invoice);
		$ci->load->view('pdf/pdf_generator', $data);
	}


	public static function addInvoice()
	{
		$ci = &get_instance();
		if ($ci->input->post('add') && $ci->input->post('detail')) {
			$value_invoice = $ci->input->post('add');
			$value_invoice_detail = $ci->input->post('detail');
			$ci->load->model('InvoiceModel');
			$id_invoice = $ci->InvoiceModel->addInvoice($value_invoice);
			foreach ($value_invoice_detail as $val) {
				//print_r($val['stop']);
				// if($val['stop'] == "deleted")
				// continue;
				$data_invoice_detail = array(
					'id_invoice' => $id_invoice,
					'title' => $val['title'],
					'description' => $val['description'],
					'quantity' => $val['quantity'],
					'price' => $val['price']
				);
				$ci->InvoiceModel->addInvoiceDetail($data_invoice_detail);
				$ci->load->helper('url');
				$base_url = base_url();
				$redirect = $base_url . 'Invoice';
				header('Location: ' . $redirect);
				// push

			}
		}
		$ci->load->view('invoice/add_invoice');
	}

	public function exportCsv()
	{ 
		   $ci = &get_instance();
		   $ci->load->model('InvoiceModel');
		   // file name 
		   $filename = 'facture_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   
		   // get data 

		   $usersData = $ci->InvoiceModel->exportInvoiceCsv();
		   // file creation 
		   $file = fopen('php://output', 'w');
		 
		   $header = array("id_invoice","id_customer","invoice_date","title", "reference", "company", "sent_email", "sent_firstname", "sent_lastname", "sent_address", "Title_détail", "description_detail", "quantity", "price"); 
		   fputcsv($file, $header);
		   foreach ($usersData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
    }
}
