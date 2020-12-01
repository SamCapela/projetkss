<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
	
<div class="container-fluid">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Référence</th>
				<th scope="col">Intitulé</th>
				<th scope="col">Date</th>
				<th scope="col">Modifier</th>
				<th scope="col">Exporter PDF</th>
			</tr>
		</thead>	
		<tbody>
				
<?php
		foreach($invoices as $invoice)
		{
			
			echo('
				<tr>
					
					<td>'.$invoice['reference'].'</td>
					<td>'.$invoice['title'].'</td>
					<td>'.$invoice['invoice_date'].'</td>
					<td><a class="btn-success" href="#">Edit</a></td>
					<td><a class="btn-primary" href="#">PDF</a></td>
				</tr>');			
		}
		echo('
				</tbody>
			</table>
		');
	?>
		</tbody>
	</table>
</div>	
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('footer');
?>
