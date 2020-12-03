<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="container-fluid">
	<form method="POST" class="user" >
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input required="required" type="date" name="add[invoice_date]" class="form-control form-control-user" placeholder="Date de la facture">
			</div>
			<div class="col-sm-6">
				<input required="required" type="text" name="add[title]" class="form-control form-control-user" placeholder="Nom de la facture">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input required="required" type="text" name="add[sent_firstname]" class="form-control form-control-user" placeholder="Prénom du destinataire">
			</div>
			<div class="col-sm-6">
				<input required="required" name="add[sent_lastname]" type="text" class="form-control form-control-user" placeholder="Nom du destinataire">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input required="required" type="text" name="add[company]" class="form-control form-control-user" placeholder="Nom de l'entreprise">
			</div>
			<div class="col-sm-6">
				<input required="required" type="email" name="add[sent_email]" class="form-control form-control-user" placeholder="Email du destinataire">
			</div>
		</div>
		<div class="form-group">
			<input required="required" type="text" name="add[sent_address]" class="form-control form-control-user" placeholder="Addresse du destinaire"/>
		</div>
		<br>
		<div class="add_row clear clearfix">
			<a id="add_row" class="pull-right btn-success">Ajouter une ligne</a>
		</div>
		<div id="detail_form" class="form_detail">
			<div  class="form-group row detail-invoice clear clearfix">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input required="required" type="number" name="detail[0][quantity]" value="1" class="quantity_detail form-control form-control-user" placeholder="Quantité">
				</div>
				<div class="col-sm-6">
					<input required="required" type="number"  name="detail[0][price]" class=" price_detail form-control form-control-user" placeholder="Prix">
				</div>
				<hr>
				<!-- push -->
				<div class="margin-spacing"></div>
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input required="required" data-position="0" type="text" name="detail[0][title]" class="form-control form-control-user data_position" placeholder="Titre de la ligne">
				</div>
				<div class="col-sm-6">
					<input required="required" type="text" name="detail[0][description]" class="form-control form-control-user" placeholder="Description de la ligne">
				</div>
				<input required="required" type="hidden" value="0" class="this_price"/>
			</div>
			<div class="margin-spacing"></div>
		</div>	
		<div class="col-sm-12 total-price-show">
			<input required="required" type="hidden" value="" id="total_price"/>
			<span id="total_price">Total:  	<a class="display_price"> 0 </a>   <a>€</a></span>
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
