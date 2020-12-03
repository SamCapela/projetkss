<?php
require_once '././vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;


// $date = $invoices[0]['invoice_date'];
// $title = $invoices[0]['title'];
// $reference = $invoices[0]['reference'];
// $company = $invoices[0]['company'];
// $sentemail = $invoices[0]['sent_email'];
// $sentfirstname = $invoices[0]['sent_firstname'];
// $sentlastname = $invoices[0]['sent_lastname'];
// $sentadress = $invoices[0]['sent_address'];
$invoice = $invoices[0];
$subTotal = 0;
$taxe = 20;

$pdf = '
<body>
  <div id="details" class="clearfix">
	<div id="client">
	  <div class="to">Facture destinée à:</div>
	  <h2 class="name">' . $invoice['sent_firstname'] . ' ' . $invoice['sent_lastname'] . '</h2>
	  <div class="address">' . $invoice['sent_address'] . '</div>
	  <div class="email"><a href="mailto:' . $invoice['sent_email'] . '">' . $invoice['sent_email'] . '</a></div>
	</div>
	<div id="invoice">
	  <h1>Projet KSS</h1>
	</div>
  </div>
  <div class="date">Date de facturation: ' . $invoice['invoice_date'] . '</div>
  <table cellspacing="0" cellpadding="0" border="0">
	<thead>
	  <tr>
		<th class="no">#</th>
		<th class="desc">Produit</th>
		<th class="unit">Prix à l\'unité</th>
		<th class="qty">Quantité</th>
		<th class="total">Total </th>
	  </tr>
	</thead>
	<tbody>';

	$invoice_details = '';

	foreach($details as $detail)
	{
		$total = (int)$detail['quantity'] * (int)$detail['price'];
		$invoice_details = $invoice_details.'<tr>
		<td class="no">01</td>
		<td class="desc">
			<h3>'.$detail['title'].'</h3> 
			'.$detail['description'].'
		</td>
		<td class="unit">€'.$detail['price'].'</td>
		<td class="qty">'.$detail['quantity'].'</td>
		<td class="total">'.$total.'</td>
	  </tr>';

	  $subTotal += $total;
	}

	$end = '
	</tbody>
	<tfoot>
	  <tr>
		<td colspan="2"></td>
		<td colspan="2">Montant hors taxe</td>
		<td>€'.$subTotal.'</td>
	  </tr>
	  <tr>
		<td colspan="2"></td>
		<td colspan="2">Montant de TVA ('.$taxe.'%)</td>
		<td>€'.$subTotal*($taxe/100).'</td>
	  </tr>
	  <tr>
		<td colspan="2"></td>
		<td colspan="2">Montant TTC</td>
		<td>€'.(int)($subTotal+($subTotal*($taxe/100))).'</td>
	  </tr>
	</tfoot>
  </table>
  <div id="thanks"></div>
  <div id="notices">
	<div>NOTICE:</div>
	<div class="notice"></div>
  </div>
</body>
<style>
@font-face {
	  font-family: SourceSansPro;
	  src: url(SourceSansPro-Regular.ttf);
	}
	
	.clearfix:after {
	  content: "";
	  display: table;
	  clear: both;
	}
	
	a {
	  color: #0087C3;
	  text-decoration: none;
	}
	
	body {
	  position: relative;
	  width: auto;  
	  height: auto; 
	  margin: 0 auto; 
	  color: #555555;
	  background: #FFFFFF; 
	  font-family: Arial, sans-serif; 
	  font-size: 14px; 
	  font-family: SourceSansPro;
	}
	
	header {
	  padding: 10px 0;
	  margin-bottom: 20px;
	  border-bottom: 1px solid #AAAAAA;
	}
	
	#company {
	  float: right;
	  text-align: right;
	}
	
	
	#details {
	  margin-bottom: 50px;
	}
	
	#client {
	  padding-left: 6px;
	  border-left: 6px solid #0087C3;
	  float: right;
	}
	
	#client .to {
	  color: #777777;
	  float: left
	}
	
	h2.name {
	  font-size: 1.4em;
	  font-weight: normal;
	  margin: 0;
	}
	
	#invoice {
	  float: right;
	  text-align: right;
	}
	
	#invoice h1 {
	  color: #0087C3;
	  font-size: 2.4em;
	  line-height: 1em;
	  font-weight: normal;
	  margin: 0  0 10px 0;
	}
	
	#invoice .date {
	  font-size: 1.1em;
	  color: #777777;
	}
	
	table {
	  width: 10px;
	  border-collapse: collapse;
	  border-spacing: 0;
	  margin-bottom: 20px;
	}
	
	table th,
	table td {
	  max-width : 100%;
	  width:10%;
	  padding: 10px;
	  background: #EEEEEE;
	  text-align: center;
	  border-bottom: 1px solid #FFFFFF;
	}
	
	table th {
	  white-space: nowrap;        
	  font-weight: normal;
	}
	
	table td {
	  text-align: right;
	}
	
	table td h3{
	  color: #57B223;
	  font-size: 1.2em;
	  font-weight: normal;
	  margin: 0 0 0.2em 0;
	}
	
	table .no {
	  color: #FFFFFF;
	  font-size: 1.6em;
	  background: #57B223;
	}
	
	table .desc {
	  text-align: left;
	  width: 400px;
	}
	
	table .unit {
	  background: #DDDDDD;
	}
	
	table .qty {
	}
	
	table .total {
	  background: #57B223;
	  color: #FFFFFF;
	}
	
	table td.unit,
	table td.qty,
	table td.total {
	  font-size: 1.2em;
	}
	
	table tbody tr:last-child td {
	  border: none;
	}
	
	table tfoot td {
	  padding: 10px 20px;
	  background: #FFFFFF;
	  border-bottom: none;
	  font-size: 1.2em;
	  white-space: nowrap; 
	  border-top: 1px solid #AAAAAA; 
	}
	
	table tfoot tr:first-child td {
	  border-top: none; 
	}
	
	table tfoot tr:last-child td {
	  color: #57B223;
	  font-size: 1.4em;
	  border-top: 1px solid #57B223; 
	
	}
	
	table tfoot tr td:first-child {
	  border: none;
	}
	
	#thanks{
	  font-size: 2em;
	  margin-bottom: 50px;
	}
	
	#notices{
	  padding-left: 6px;
	  border-left: 6px solid #0087C3;  
	}
	
	#notices .notice {
	  font-size: 1.2em;
	}
	
	
</style>';
$pdf = $pdf.$invoice_details.$end;
$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($pdf);
$html2pdf->output('facture.pdf'); // Generate and load the PDF in the browser.


//$html2pdf->output('myPdf.pdf, 'D'); // Generate the PDF execution and force download immediately.
