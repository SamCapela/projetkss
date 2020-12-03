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
			$this->exportcsv($value);
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

	public static function exportcsv($value_invoice)
	{
		//Our MySQL connection details.
		$host = 'localhost';
		$user = 'root';
		$password = 'mysql';
		$database = 'projetkss';
		
		//Connect to MySQL using PDO.
		$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
		
		//Create our SQL query.
		$sql = "SELECT * FROM invoice";
		
		//Prepare our SQL query.
		$statement = $pdo->prepare($sql);
		
		//Executre our SQL query.
		$statement->execute();
		
		//Fetch all of the rows from our MySQL table.
		$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		//Get the column names.
		$columnNames = array();
		if(!empty($rows)){
			//We only need to loop through the first row of our result
			//in order to collate the column names.
			$firstRow = $rows[0];
			foreach($firstRow as $colName => $val){
				$columnNames[] = $colName;
			}
		}
		
		//Setup the filename that our CSV will have when it is downloaded.
		$fileName = 'invoices.csv';
		
		//Set the Content-Type and Content-Disposition headers to force the download.
		header('Content-Type: application/excel');
		header('Content-Disposition: attachment; filename="' . $fileName . '"');
		
		//Open up a file pointer
		$fp = fopen('php://output', 'w');
		
		//Start off by writing the column names to the file.
		fputcsv($fp, $columnNames);
		
		//Then, loop through the rows and write them to the CSV file.
		foreach ($rows as $row) {
			fputcsv($fp, $row);
		}
		
		//Close the file pointer.
		fclose($fp);
	}
}
