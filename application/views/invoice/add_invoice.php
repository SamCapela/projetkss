<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="container-fluid">
	<form method="POST" class="user" >
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input type="date" name="add[invoice_date]" class="form-control form-control-user" placeholder="Date de la facture">
			</div>
			<div class="col-sm-6">
				<input type="text" name="add[title]" class="form-control form-control-user" placeholder="Nom de la facture">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input type="text" name="add[sent_firstname]" class="form-control form-control-user" placeholder="Prénom du destinataire">
			</div>
			<div class="col-sm-6">
				<input name="add[sent_lastname]" type="text" class="form-control form-control-user" placeholder="Nom du destinataire">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input type="text" name="add[company]" class="form-control form-control-user" placeholder="Nom de l'entreprise">
			</div>
			<div class="col-sm-6">
				<input type="email" name="add[sent_email]" class="form-control form-control-user" placeholder="Email du destinataire">
			</div>
		</div>
		<div class="form-group">
			<input type="text" name="add[sent_address]" class="form-control form-control-user" placeholder="Addresse du destinaire"/>
		</div>
		<br>
		<div class="add_row clear clearfix">
			<a id="add_row" class="pull-right btn-success">Ajouter une ligne</a>
		</div>
		<div id="detail_form" class="form_detail">
			<div  class="form-group row detail-invoice clear clearfix">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="number" name="detail[0][quantity]" class="form-control form-control-user" placeholder="Quantité">
				</div>
				<div class="col-sm-6">
					<input type="number"  name="detail[0][price]" class="form-control form-control-user" placeholder="Prix">
				</div>
				<hr>
				<div class="margin-spacing"></div>
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input data-position="0" type="text" name="detail[0][title]" class="form-control form-control-user data_position" placeholder="Titre de la ligne">
				</div>
				<div class="col-sm-6">
					<input type="text" name="detail[0][description]" class="form-control form-control-user" placeholder="Description de la ligne">
				</div>
			</div>
		</div>	
		<button type="submit" class="btn btn-primary btn-user btn-block">
			Valider
		</button>
	</form>
</div>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('footer');
?>
