<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
<div class="container text-center">
	<form method="POST">
		<label>Email : 
			<input class="form-control" type="email" placeholder="email@email.com" name="connexion[email]"/>
		</label>
		<label>Mot de passe : 
			<input class="form-control" type="password" placeholder="*****" name="connexion[password]"/>
		</label>
		<button class="btn-primary">Connexion</button>
	</form>	
</div>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('footer');
?>
