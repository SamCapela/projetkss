<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
	
<div class="container-fluid">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Nom</th>
				<th scope="col">Prénom</th>
				<th scope="col">Civilité</th>
				<th scope="col">Email</th>
				<th scope="col">Role</th>
			</tr>
		</thead>	
		<tbody>
				
<?php
		foreach($users as $user)
		{
			
			echo('
				<tr>
					
					<td>'.$user['firstname'].'</td>
					<td>'.$user['lastname'].'</td>
					<td>'.$user['civility'].'</td>
					<td>'.$user['email'].'</td>
					<td>'.$user['role'].'</td>
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
