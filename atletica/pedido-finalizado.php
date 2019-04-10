<?php
session_start();

$_SESSION['carrinho'] = [];
require_once('../admin/auto_load.php');

$produto = new Produto;

$produtos = $produto->buscarTodos();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#333">
	<title>Loja Atlética</title>
	<meta name="description" content="Material Style Theme">
	<link rel="shortcut icon" href="../assets/img/favicon.png?v=3">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="../assets/css/preload.min.css">
	<link rel="stylesheet" href="../assets/css/plugins.min.css">
	<link rel="stylesheet" href="../assets/css/style.bordo.min.css">
	<!--[if lt IE 9]>
				<script src="../assets/js/html5shiv.min.js"></script>
				<script src="../assets/js/respond.min.js"></script>
			<![endif]-->
		</head>

		<body>
			<div id="ms-preload" class="ms-preload">
				<div id="status">
					<div class="spinner">
						<div class="dot1"></div>
						<div class="dot2"></div>
					</div>
				</div>
			</div>
			<div class="ms-site-container">
				<!-- Modal -->
				<div class="modal modal-primary" id="ms-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog animated zoomIn animated-3x" role="document">
						<div class="modal-content">
							<div class="modal-header d-block shadow-2dp no-pb">
								<button type="button" class="close d-inline pull-right mt-2" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
								</button>
								<div class="modal-title text-center">
									<span class="ms-logo ms-logo-white ms-logo-sm mr-1">L. A.</span>
									<h3 class="no-m ms-site-title">Loja <span>Atlética</span></h3>
								</div>
								<div class="modal-header-tabs">
									<ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-primary" role="tablist">
										<li class="nav-item" role="presentation"><a href="#ms-login-tab" aria-controls="ms-login-tab" role="tab" data-toggle="tab" class="nav-link active withoutripple"><i class="zmdi zmdi-account"></i> Login</a></li>
										<li class="nav-item" role="presentation"><a href="#ms-register-tab" aria-controls="ms-register-tab" role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-account-add"></i> Register</a></li>
										<li class="nav-item" role="presentation"><a href="#ms-recovery-tab" aria-controls="ms-recovery-tab" role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-key"></i> Recovery Pass</a></li>
									</ul>
								</div>
							</div>
							<div class="modal-body">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade active show" id="ms-login-tab">
										<form autocomplete="off">
											<fieldset>
												<div class="form-group label-floating">
													<div class="input-group">
														<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
														<label class="control-label" for="ms-form-user">Username</label>
														<input type="text" id="ms-form-user" class="form-control">
													</div>
												</div>
												<div class="form-group label-floating">
													<div class="input-group">
														<span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
														<label class="control-label" for="ms-form-pass">Password</label>
														<input type="password" id="ms-form-pass" class="form-control">
													</div>
												</div>
												<div class="row mt-2">
													<div class="col-md-6">
														<div class="form-group no-mt">
															<div class="checkbox">
																<label>
																	<input type="checkbox"> Remember Me 
																</label>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<button class="btn btn-raised btn-primary pull-right">Login</button>
													</div>
												</div>
											</fieldset>
										</form>
										<div class="text-center">
											<h3>Login with</h3>
											<a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-facebook">
												<i class="zmdi zmdi-facebook"></i> Facebook
											</a>
											<a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-twitter">
												<i class="zmdi zmdi-twitter"></i> Twitter
											</a>
											<a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-google">
												<i class="zmdi zmdi-google"></i> Google
											</a>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="ms-register-tab">
										<form>
											<fieldset>
												<div class="form-group label-floating">
													<div class="input-group">
														<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
														<label class="control-label" for="ms-form-user-r">Username</label>
														<input type="text" id="ms-form-user-r" class="form-control">
													</div>
												</div>
												<div class="form-group label-floating">
													<div class="input-group">
														<span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
														<label class="control-label" for="ms-form-email-r">Email</label>
														<input type="email" id="ms-form-email-r" class="form-control">
													</div>
												</div>
												<div class="form-group label-floating">
													<div class="input-group">
														<span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
														<label class="control-label" for="ms-form-pass-r">Password</label>
														<input type="password" id="ms-form-pass-r" class="form-control">
													</div>
												</div>
												<div class="form-group label-floating">
													<div class="input-group">
														<span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
														<label class="control-label" for="ms-form-pass-rn">Re-type Password</label>
														<input type="password" id="ms-form-pass-rn" class="form-control">
													</div>
												</div>
												<button class="btn btn-raised btn-block btn-primary">Register Now</button>
											</fieldset>
										</form>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="ms-recovery-tab">
										<fieldset>
											<div class="form-group label-floating">
												<div class="input-group">
													<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
													<label class="control-label" for="ms-form-user-re">Username</label>
													<input type="text" id="ms-form-user-re" class="form-control">
												</div>
											</div>
											<div class="form-group label-floating">
												<div class="input-group">
													<span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
													<label class="control-label" for="ms-form-email-re">Email</label>
													<input type="email" id="ms-form-email-re" class="form-control">
												</div>
											</div>
											<button class="btn btn-raised btn-block btn-primary">Send Password</button>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<header class="ms-header ms-header-dark">
				<!--ms-header-dark-->
				<div class="container container-full">
					<div class="ms-title">
						<a href="index.html">
							<!-- <img src="../assets/img/demo/logo-header.png" alt=""> -->
							<span class="ms-logo animated zoomInDown animation-delay-5">AV</span>
							<h1 class="animated fadeInRight animation-delay-6">Atlética <span>Vassouras</span></h1>
						</a>
					</div>
					<div class="header-right">
						<div class="share-menu">
							<ul class="share-menu-list">
								<li class="animated fadeInRight animation-delay-3"><a href="javascript:void(0)" class="btn-circle btn-google"><i class="zmdi zmdi-google"></i></a></li>
								<li class="animated fadeInRight animation-delay-2"><a href="javascript:void(0)" class="btn-circle btn-facebook"><i class="zmdi zmdi-facebook"></i></a></li>
								<li class="animated fadeInRight animation-delay-1"><a href="javascript:void(0)" class="btn-circle btn-twitter"><i class="zmdi zmdi-twitter"></i></a></li>
							</ul>
							<a href="javascript:void(0)" class="btn-circle btn-circle-primary animated zoomInDown animation-delay-7"><i class="zmdi zmdi-share"></i></a>
						</div>
						<a href="javascript:void(0)" class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8" data-toggle="modal" data-target="#ms-account-modal"><i class="zmdi zmdi-account"></i></a>
						<form class="search-form animated zoomInDown animation-delay-9">
							<input id="search-box" type="text" class="search-input" placeholder="Search..." name="q" />
							<label for="search-box"><i class="zmdi zmdi-search"></i></label>
						</form>
						<a href="javascript:void(0)" class="btn-ms-menu btn-circle btn-circle-primary ms-toggle-left animated zoomInDown animation-delay-10"><i class="zmdi zmdi-menu"></i></a>
					</div>
				</div>
			</header>
			<nav class="navbar navbar-expand-md  navbar-static ms-navbar ms-navbar-white">
				<div class="container container-full">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.html">
							<!-- <img src="../assets/img/demo/logo-navbar.png" alt=""> -->
							<span class="ms-logo ms-logo-sm">AV</span>
							<span class="ms-title">Atlética <strong>Vassouras</strong></span>
						</a>
					</div>
					<div class="collapse navbar-collapse" id="ms-navbar">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a href="index.html" class="nav-link  animated fadeIn animation-delay-7">Home </a>
							</li>

							<li class="nav-item active">
								<a href="loja.php" class="nav-link animated fadeIn animation-delay-9" role="button">Produtos</a>
							</li>

							<li class="nav-item">
								<a href="produtos.html" class="nav-link animated fadeIn animation-delay-9" role="button">Quem Somos</a>
							</li>
							<li class="nav-item">
								<a href="produtos.html" class="nav-link animated fadeIn animation-delay-9" role="button">Contato</a>
							</li>
						</ul>
					</div>
					<a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu"><i class="zmdi zmdi-menu"></i></a>
				</div> <!-- container -->
			</nav>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2">
						<h1 class="color-primary">Pedido realizado com sucesso!</h1>

						<div class="card animated fadeInUp animation-delay-7 color-primary withripple">
							<div class="card-body-big color-dark">
								<div class="text-center">
									<i class="fa fa-check-circle color-success" style="font-size: 80px"></i>
									<!-- <h2>Dados para retirada dos produtos:</h2> -->
									<p class="lead">Em breve você receberá um e-mail no endereço <b><?php echo $_SESSION['comprador']['email'] ?></b> com todos os detalhes do pedido.</p>
									<p class="lead"><u class="color-danger">Obs:</u>O prazo de retirada dos produtos é de até 15 dias úteis.</p>
									<a href="index.html" class="btn btn-primary btn-raised"><i class="zmdi zmdi-home"></i> Início</a>
								</div>
							</div>
							<div class="ripple-container"></div></div>
						</div>

					</div>
				</div> <!-- container -->

				<footer class="ms-footer">
					<div class="container">
						<p>Copyright &copy; Material Style 2017</p>
					</div>
				</footer>
				<div class="btn-back-top">
					<a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised "><i class="zmdi zmdi-long-arrow-up"></i></a>
				</div>
			</div> <!-- sb-site-container -->

			<script src="../assets/js/plugins.min.js"></script>
			<script src="../assets/js/app.min.js"></script>
			<script src="../assets/js/ecommerce.js"></script>
			<script src="../assets/js/loja.js"></script>
		</body>

		</html>