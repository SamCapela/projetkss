<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="container-fluid">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
								</div>
								<form class="user"  method="POST">
									<div class="form-group">
										<input type="email" name="connexion[email]" class="form-control form-control-user"
											id="exampleInputEmail" aria-describedby="emailHelp"
											placeholder="Enter Email Address...">
									</div>
									<div class="form-group">
										<input type="password" name="connexion[password]" class="form-control form-control-user"
											id="exampleInputPassword" placeholder="Password">
									</div>
									<button type="submit"  class="btn btn-primary btn-user btn-block">
										Login
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('footer');
?>
