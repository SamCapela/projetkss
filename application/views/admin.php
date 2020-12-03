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
				<th scope="col">Action</th>
			</tr>
		</thead>	
		<tbody>
				
<?php
		foreach($users as $user)
		{
			if($user['civility'] == 1)
			$civility = 'Mr';
			else
			$civility = 'Mme';
			
			if($user['role'] == 1)
			$user_type = 'User';
			else
			$user_type = 'Admin';
			
			echo('
				<tr>
					
					<td>'.$user['firstname'].'</td>
					<td>'.$user['lastname'].'</td>
					<td>'.$civility.'</td>
					<td>'.$user['email'].'</td>
					<td>'.$user_type.'</td>
					<td><a class="remove-btn" href="'.$base_url.'admin?deleted='.$user['id_customer'].'"><i class="fas fa-trash"></i></a></td>
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
