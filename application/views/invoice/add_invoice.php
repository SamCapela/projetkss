<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="container-fluid">
	<form class="user" method="POST">
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input type="date" name="invoice_add['date']" class="form-control form-control-user" placeholder="Date de la facture">
			</div>
			<div class="col-sm-6">
				<input type="text" name="invoice_add['title']" class="form-control form-control-user" placeholder="Nom de la facture">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input type="text" name="invoice_add['firstname_to']" class="form-control form-control-user" placeholder="Prénom du destinataire">
			</div>
			<div class="col-sm-6">
				<input name="invoice_add['lastname_to']" type="text" class="form-control form-control-user" placeholder="Nom du destinataire">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input type="text" name="invoice_add['company_to']" class="form-control form-control-user" placeholder="Nom de l'entreprise">
			</div>
			<div class="col-sm-6">
				<input type="email" class="form-control form-control-user" placeholder="Email du destinataire">
			</div>
		</div>
		<div class="form-group">
			<input type="text" name="invoice_add['address_to']" class="form-control form-control-user" placeholder="Addresse du destinaire">
		</div>
		<div class="add_row clear clearfix">
			<a id="add_row" class="pull-right btn-success">Ajouter une ligne</a>
		</div>

		<div id="detail_form" class="form_detail">
			<div  class="form-group row detail-invoice clear clearfix">
				<div class="col-sm-2 mb-3 mb-sm-0">
					<input type="number" name="invoice_add_detail['quantity']" class="form-control form-control-user" placeholder="Quantité">
				</div>
				<div class="col-sm-4 mb-3 mb-sm-0">
					<input type="text" name="invoice_add_detail['title']" class="form-control form-control-user" placeholder="Titre de la ligne">
				</div>
				<div class="col-sm-4">
					<input type="email" name="invoice_add_detail['description']" class="form-control form-control-user" placeholder="Description de la ligne">
				</div>
				<div class="col-sm-2">
					<input type="number"  name="invoice_add_detail['price']" class="form-control form-control-user" placeholder="Prix">
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
