<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="container-fluid">
    <h1 style="text-align: center;"> Liste des utilisateurs </h1>
    <br>
	<form class="user" method="POST">
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input required="required" type="email" name="user_add[email]" class="form-control form-control-user" placeholder="Email">
			</div>
			<div class="col-sm-6">
				<input required="required" type="password" name="user_add[password]" class="form-control form-control-user" placeholder="Mot de passe">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input required="required" type="text" name="user_add[firstname]" class="form-control form-control-user" placeholder="Prénom">
			</div>
			<div class="col-sm-6">
				<input required="required" name="user_add[lastname]" type="text" class="form-control form-control-user" placeholder="Nom">
			</div>
        </div>
        <div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0 form-check">
				<select class="form-control" name="user_add[civility]">
					<option value="1">Mr</option>
					<option value="0">Mme</option>
				</select>

            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
				<select class="form-control" name="user_add[role]">
					<option value="1">User</option>
					<option value="0">Admin</option>
				</select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 mb-3 mb-sm-0"></div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                        Valider
                </button>            
            </div>
            
            
        </div>
        
		
	</form>
</div>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('footer');
?>
