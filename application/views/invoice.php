
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>Factures</title>
</head>
<body>

	<h1> Liste des Factures </h1>
	<?php 
		echo('
			<table class="table">
			<thead>
				<tr>
				<th scope="col">Référence</th>
				<th scope="col">Intitulé</th>
				<th scope="col">Date</th>
				</tr>
			</thead>	
			<tbody>
				
		');
		$i = 1;
		foreach($invoices as $invoice)
		{
			
			echo('
				<tr>
					
					<td>'.$invoice['reference'].'</td>
					<td>'.$invoice['title'].'</td>
					<td>'.$invoice['invoice_date'].'</td>
					<td><a href="#">Edit</a></td>
					<td><a href="#">PDF</a></td>
				</tr>');			
		}
		echo('
				</tbody>
			</table>
		');
	?>
<!--

<div id="container">
<h1>Welcome to CodeIgniter!</h1>
	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
	
		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>
	
		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>
	
		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>
	
	<p>test</p>
</body>
-->
</html>
