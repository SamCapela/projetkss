<?php
$this->load->helper('url');
?>


<!DOCTYPE html>
<html>

<head>
	<title>Projetkss</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">PROJETKSS</a>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<?php if (isset($_SESSION['id_customer'])) {
				?>
					<div class="user-active pull-right">
						<li class="nav-item text-right">
							<span class="nav-link" href="#"><?php echo $_SESSION['lastname']; ?></span>
						</li>
						<li class="nav-item text-right">
							<span class="nav-link" href="#"><?php echo $_SESSION['firstname']; ?></span>
						</li>
						<li class="nav-item text-right">
							<a href="<?php echo base_url(); ?>Auth?destroy_connexion=1"><span class="nav-link" href="#">Déconnexion</span>
						</li>
					</div>

				<?php
				} else {

				?>
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url(); ?>Auth">Connexion <span class="sr-only">(current)</span></a>
					</li>
				<?php
				}
				?>
			</ul>
		</div>
	</nav>

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"  >
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Projetkss</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
		<?php if (isset($_SESSION['id_customer']))
		{?>
			<li class="nav-item active">
				<a class="nav-link">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Salut <?php echo $_SESSION['firstname'];?></span></a>
			</li>
		<?php
		}
		else
		{?>
			<li class="nav-item active">
				<a class="nav-link"  >
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Veuillez vous connecter</span></a>
			</li>
		<?php
		}
		?>
			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Pages
			</div>
			<?php if (isset($_SESSION['id_customer']))
			{?>
			<!-- Nav Item - Connexion -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-folder"></i>
					<span>Facture</span>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo base_url(); ?>invoice">Liste des factures</a>
						<a class="collapse-item" href="<?php echo base_url(); ?>invoice?add_invoice=1">Créer une facture</a>
					</div>
				</div>
			</li>
			<?php if ($_SESSION['role'] == 0)
			{?>
				<div class="sidebar-heading">
					Administration
				</div>
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
						<i class="fas fa-fw fa-folder"></i>
						<span>Utilisateurs</span>
					</a>
					<div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?php echo base_url(); ?>admin">Liste des utilisateurs</a>
							<a class="collapse-item" href="<?php echo base_url(); ?>admin?add_user=1">Ajouter des utilisateurs</a>
						</div>
					</div>
				</li>
				<?php
				}
			}
			else
			{
				
			?>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>Auth">
					<i class="fas fa-fw fa-chart-area"></i>
					<span>Connexion</span>
				</a>
			</li>
			<?php
			}
			?>
			<hr class="sidebar-divider">
			<div class="sidebar-heading">
				Déconnexion
			</div>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>Auth?destroy_connexion=1">
						<i class="fas fa-sign-out-alt"></i>
						<span>Déconnexion</span>
					</a>
				</li>
				<hr class="sidebar-divider">
		</ul>


