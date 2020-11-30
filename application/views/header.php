<?php 
	$this->load->helper('url');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">projetkss</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
		  <?php if(isset($_SESSION['id_customer'])) 
		    {
		  ?>
		  	<div class="user-active pull-right">
				  <li class="nav-item text-right">
					  <span class="nav-link" href="#"><?php echo $_SESSION['lastname'];?></span>
				  </li>
				  <li class="nav-item text-right">
						<span class="nav-link" href="#"><?php echo $_SESSION['firstname'];?></span>
				 </li>
				 <li class="nav-item text-right">
					<a href="<?php echo base_url();?>Auth?destroy_connexion=1"><span class="nav-link" href="#">Déconnexion</span>
			  	 </li>
			 </div>	 
			  
		<?php
			}
			else
			{
				
		?>
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url();?>Auth">Connexion <span class="sr-only">(current)</span></a>
		 	</li>
		<?php
			}
		?>
		</ul>
	  </div>
	</nav>
