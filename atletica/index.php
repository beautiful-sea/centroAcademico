<?php

require_once("../admin/auto_load.php");

$ultimas_fotos = new UltimasFotos;

$todas_ultimas_fotos = $ultimas_fotos->buscarTodas();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#333">
	<title>Atlética Vassouras</title>
	<meta name="description" content="Material Style Theme">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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

	<div class="modal" id="modal-ultimas-fotos" tabindex="-1" role="dialog" aria-labelledby="modal-ultimas-fotos-titulo">
		<div class="modal-dialog animated zoomIn animated-3x" role="document">
			<div class="modal-content">

				<h3 class="text-center" id="modal-ultimas-fotos-titulo"></h3>
				<div class="ms-thumbnail-container">
					<figure class="ms-thumbnail ms-thumbnail-horizontal">
						<img src="" id="modal-ultimas-fotos-imagem" alt="" class="img-fluid">
						<figcaption class="ms-thumbnail-caption text-center">
							<div class="ms-thumbnail-caption-content">
								<h3 class="ms-thumbnail-caption-title" id="modal-ultimas-fotos-descricao">...</h3>
								<span class="" id="modal-ultimas-fotos-data"></span>
							</div>
						</figcaption>
					</figure>
				</div>
			</div>
		</div>
	</div>

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
						<button type="button" class="close d-inline pull-right mt-2" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
						<div class="modal-title text-center">
							<span class="ms-logo ms-logo-white ms-logo-sm mr-1">AV</span>
							<h3 class="no-m ms-site-title">Atlética <span>Vassouras</span></h3>
						</div>
						<div class="modal-header-tabs">
							<ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-primary" role="tablist">
								<li class="nav-item" role="presentation"><a href="#ms-login-tab" aria-controls="ms-login-tab" role="tab" data-toggle="tab" class="nav-link active withoutripple"><i class="zmdi zmdi-account"></i>
										Login</a></li>
								<li class="nav-item" role="presentation"><a href="#ms-register-tab" aria-controls="ms-register-tab" role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-account-add"></i>
										Register</a></li>
								<li class="nav-item" role="presentation"><a href="#ms-recovery-tab" aria-controls="ms-recovery-tab" role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-key"></i> Recovery Pass</a>
								</li>
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
															<input type="checkbox"> Remember Me </label>
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
									<a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-facebook"><i class="zmdi zmdi-facebook"></i> Facebook</a>
									<a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-twitter"><i class="zmdi zmdi-twitter"></i> Twitter</a>
									<a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-google"><i class="zmdi zmdi-google"></i> Google</a>
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
												<label class="control-label" for="ms-form-pass-rn">Re-type
													Password</label>
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
						<li class="nav-item active">
							<a href="#" class="nav-link  animated fadeIn animation-delay-7">Home </a>
						</li>

						<li class="nav-item">
							<a href="loja.php" class="nav-link animated fadeIn animation-delay-9" role="button">Produtos</a>
						</li>

						<li class="nav-item">
							<a href="produtos.php" class="nav-link animated fadeIn animation-delay-9" role="button">Quem
								Somos</a>
						</li>
						<li class="nav-item">
							<a href="produtos.php" class="nav-link animated fadeIn animation-delay-9" role="button">Contato</a>
						</li>
					</ul>
				</div>
				<a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu"><i class="zmdi zmdi-menu"></i></a>
			</div> <!-- container -->
		</nav>
		<header class="ms-hero ms-hero-black mb-6">
			<div id="carousel-header" class="carousel carousel-header slide" data-ride="carousel" data-interval="5000">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-header" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-header" data-slide-to="1"></li>
					<li data-target="#carousel-header" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<div class="container">
							<div class="row">
								<div class="col-xl-6 col-lg-7">
									<div class="carousel-caption">
										<h1 class="color-white no-mt mb-4 animated zoomInDown animation-delay-7">Venha
											fazer parte da nossa Atlética!</h1>
										<ul class="list-unstyled list-hero">
											<li><i class="animated flipInX animation-delay-6 color-warning zmdi zmdi-cloud"></i>
												<span class="color-warning animated fadeInRightTiny animation-delay-7">Exclusivo
													para Alunos da Universidade</span></li>
											<li><i class="animated flipInX animation-delay-8 color-info zmdi zmdi-globe"></i>
												<span class="color-info animated fadeInRightTiny animation-delay-9">Participamos
													de Competições Globais</span></li>
											<li><i class="animated flipInX animation-delay-10 color-success zmdi zmdi-download"></i>
												<span class="color-success animated fadeInRightTiny animation-delay-11">Lorem
													ipsum dolor sit amet consectetur</span></li>
										</ul>
										<div class="text-center">
											<a href="#" class="btn btn-primary btn-xlg btn-raised animated flipInX animation-delay-16">Me
												Inscrever</a>

										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-5">
									<img src="../assets/img/logos/baroes.jpeg" alt="..." class="img-fluid mt-6 center-block text-center animated zoomInDown animation-delay-5">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="container">
							<div class="row">
								<div class="col-xl-6 col-lg-7">
									<div class="carousel-caption">
										<h1 class="color-white no-mt mb-4 animated zoomInDown animation-delay-7">At the
											Vanguard of Innovation</h1>
										<ul class="list-unstyled list-hero">
											<li><i class="animated flipInX animation-delay-6 color-success zmdi zmdi-spinner"></i>
												<span class="color-success animated fadeInRightTiny animation-delay-7">High-speed
													servers and performance</span></li>
											<li><i class="animated flipInX animation-delay-8 color-danger zmdi zmdi-cocktail"></i>
												<span class="color-danger animated fadeInRightTiny animation-delay-9">Global
													web solutions &amp; cloud computing</span></li>
											<li><i class="animated flipInX animation-delay-10 color-info zmdi zmdi-case"></i>
												<span class="color-info animated fadeInRightTiny animation-delay-11">Lorem
													ipsum dolor sit amet consectetur</span></li>
										</ul>
										<div class="text-center">
											<a href="#" class="btn btn-primary btn-xlg btn-raised animated flipInX animation-delay-16"><i class="zmdi zmdi-settings"></i> Personalize</a>
											<a href="#" class="btn btn-warning btn-xlg btn-raised animated flipInX animation-delay-18"><i class="zmdi zmdi-download"></i> Download</a>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-5">
									<img src="../assets/img/obrigado-baraozada.jpeg" alt="..." class="img-fluid mt-6 center-block text-center animated zoomInRight animation-delay-5">
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="container">
							<div class="row">
								<div class="col-xl-6 col-lg-7">
									<div class="carousel-caption">
										<h1 class="color-white no-mt mb-4 animated zoomInDown animation-delay-7">At the
											Vanguard of Innovation</h1>
										<ul class="list-unstyled list-hero">
											<li><i class="animated flipInX animation-delay-8 color-info zmdi zmdi-nature"></i>
												<span class="color-info animated fadeInRightTiny animation-delay-9">Global
													web solutions &amp; cloud computing</span></li>
											<li><i class="animated flipInX animation-delay-6 color-danger zmdi zmdi-city-alt"></i>
												<span class="color-danger animated fadeInRightTiny animation-delay-7">High-speed
													servers and performance</span></li>
											<li><i class="animated flipInX animation-delay-10 color-warning zmdi zmdi-graduation-cap"></i>
												<span class="color-warning animated fadeInRightTiny animation-delay-11">Lorem
													ipsum dolor sit amet consectetur</span></li>
										</ul>
										<div class="text-center">
											<a href="#" class="btn btn-primary btn-xlg btn-raised animated flipInX animation-delay-16"><i class="zmdi zmdi-settings"></i> Personalize</a>
											<a href="#" class="btn btn-warning btn-xlg btn-raised animated flipInX animation-delay-18"><i class="zmdi zmdi-download"></i> Download</a>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-5">
									<img src="../assets/img/logos/logo-baroes.jpeg" alt="..." class="img-fluid mt-6 center-block text-center animated zoomInDown animation-delay-5">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Controls -->
				<a href="#carousel-header" class="btn-circle btn-circle-xs btn-circle-raised btn-circle-primary left carousel-control" role="button" data-slide="prev"><i class="zmdi zmdi-chevron-left"></i></a>
				<a href="#carousel-header" class="btn-circle btn-circle-xs btn-circle-raised btn-circle-primary right carousel-control" role="button" data-slide="next"><i class="zmdi zmdi-chevron-right"></i></a>
			</div>
		</header>
		<div class="container">
			<section class="mb-4">
				<h2 class="text-center no-mt mb-6 wow fadeInUp">Nossos Times</h2>
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6 mb-2">
						<div class="ms-icon-feature wow flipInX animation-delay-4">
							<div class="ms-icon-feature-icon">
								<a href=""><span class="ms-icon ms-icon-lg ms-icon"><i class="fas fa-futbol"></i></span>
								</a></div>
							<div class="ms-icon-feature-content">
								<h4 class="color-bordo">Futebol</h4>
								<p>Futebol masculino.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 mb-2">
						<div class="ms-icon-feature wow flipInX animation-delay-4">
							<div class="ms-icon-feature-icon">
								<a href=""><span class="ms-icon ms-icon-lg ms-icon"><i class="far fa-futbol"></i></span>
								</a></div>
							<div class="ms-icon-feature-content">
								<h4 class="color-bordo">Futsal</h4>
								<p>Futsal feminino e masculino.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 mb-2">
						<div class="ms-icon-feature wow flipInX animation-delay-4">
							<div class="ms-icon-feature-icon">
								<a href=""><span class="ms-icon ms-icon-lg ms-icon"><i class="fas fa-basketball-ball"></i></span>
								</a></div>
							<div class="ms-icon-feature-content">
								<h4 class="color-bordo">Basquete</h4>
								<p>Basquete feminino e masculino.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 mb-2">
						<div class="ms-icon-feature wow flipInX animation-delay-4">
							<div class="ms-icon-feature-icon">
								<a href=""><span class="ms-icon ms-icon-lg ms-icon"><i class="fas fa-baseball-ball"></i></span>
								</a></div>
							<div class="ms-icon-feature-content">
								<h4 class="color-bordo">Handebol</h4>
								<p>Handebol feminino e masculino.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 mb-2">
						<div class="ms-icon-feature wow flipInX animation-delay-4">
							<div class="ms-icon-feature-icon">
								<a href="/esportes/volei.html"><span class="ms-icon ms-icon-lg ms-icon"><i class="fas fa-volleyball-ball"></i></span></a>
							</div>
							<div class="ms-icon-feature-content">
								<h4 class="color-bordo">Vôlei</h4>
								<p>Vôlei feminino e masculino.</p>
							</div>
						</div>
					</div>
					<!-- <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
						<div class="ms-icon-feature wow flipInX animation-delay-4">
							<div class="ms-icon-feature-icon">
								<span class="ms-icon ms-icon-lg ms-icon"><i class="fa fa-send"></i></span>
							</div>
							<div class="ms-icon-feature-content">
								<h4 class="color-bordo">Customer service</h4>
								<p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in
									similique, necessitatibus odit vero sunt.</p>
							</div>
						</div>
					</div>
				</div> -->
			</section>
		</div> <!-- container -->
		<div class="wrap bg-bordo color-dark">
			<div class="container">
				<h1 class="color-white text-center mb-4">Dados</h1>
				<div class="row">
					<div class="col-xl-3 col-md-6">
						<div class="card card-royal card-body overflow-hidden text-center wow zoomInUp animation-delay-2">
							<h2 class="counter">450</h2>
							<i class="fas fa-4x fa-award color-royal"></i>
							<p class="mt-2 no-mb lead small-caps">prêmios ganhos</p>
						</div>
					</div>
					<div class="col-xl-3 col-md-6">
						<div class="card card-success card-body overflow-hidden text-center wow zoomInUp animation-delay-5">
							<h2 class="counter">64</h2>
							<i class="fas fa-4x fa-chess-queen color-success"></i>
							<p class="mt-2 no-mb lead small-caps">troféus</p>
						</div>
					</div>
					<div class="col-xl-3 col-md-6">
						<div class="card card-danger card-body overflow-hidden text-center wow zoomInUp animation-delay-4">
							<h2 class="counter">600</h2>
							<i class="fas fa-4x fa-medal color-danger"></i>
							<p class="mt-2 no-mb lead small-caps">Jogos vencidos</p>
						</div>
					</div>
					<div class="col-xl-3 col-md-6">
						<div class="card card-info card-body overflow-hidden text-center wow zoomInUp animation-delay-3">
							<h2 class="counter">3500</h2>
							<i class="fa fa-4x fa-group color-info"></i>
							<p class="mt-2 no-mb lead small-caps">sócios</p>
						</div>
					</div>
				</div>
				<div class="text-center color-white mw-800 center-block mt-4">
					<p class="lead lead-lg">Discover our projects and the rigorous process of creation. Our principles
						are creativity, design, experience and knowledge. We are backed by 20 years of research.</p>
					<a href="javascript:void(0)" class="btn btn-raised btn-white color-bordo wow flipInX animation-delay-8"><i class=""></i>
						Tenho um Projeto</a>
				</div>
			</div>
		</div>
		<section class="mt-6">
			<div class="container">
				<h1 class="right-line">Últimas Fotos</h1>
				<div class="row">

					<?php
					foreach ($todas_ultimas_fotos as $value) {
						$encurta_descricao = substr($value['descricao'], 0, 50);
						//Se o tamanho da descricao original for menor do que ela encurtada
						if (strlen($value['descricao']) <= strlen($encurta_descricao)) {
							$descricao = $value['descricao'];
						} else {
							$descricao = $encurta_descricao . '...';
						}

						echo '
						<div class="col-xl-4 col-md-6 mb-4" >
						<div class="ms-thumbnail-container wow fadeInUp" style="height:200px">
						<figure class="ms-thumbnail">
						<img style="height:190px"  src="../admin/dist/img/atletica/ultimas_fotos/' . $value['foto'] . '" alt="" class="img-fluid">
						<figcaption class="ms-thumbnail-caption text-center">
						<div class="ms-thumbnail-caption-content">
						<h3 class="ms-thumbnail-caption-title">' . $value['titulo'] . '</h3>
						<p>' . $descricao . '</p>
						<a href="javascript:void(0)"" class="btn btn-white btn-raised color-bordo btn-modal-fotos" data-toggle="modal" id="' . $value['id'] . '" data-target="#modal-ultimas-fotos"><i
						class="zmdi zmdi-eye"></i> Ver Mais</a>
						</div>
						</figcaption>
						</figure>
						</div>
						</div>';
					}
					?>
				</div>
			</div>
		</section>
		<div class="wrap ms-hero-img-airplane ms-hero-bg-royal ms-bg-fixed">
			<div class="container">
				<div class="text-center mb-4">
					<h2 class="uppercase color-white">Seja sócio </h2>
					<p class="lead uppercase color-light">Venha fazer parte da atlética e aproveitar os benefícios</p>
				</div>
				<div class="row no-gutters">

					<div class="col-lg-4 offset-4">
						<div class="price-table price-table-danger wow zoomInUp">
							<header class="price-table-header">
								<span class="price-table-category">SÓCIO</span>
								<h3><sup>R$</sup>6,70<sub>/mês.</sub></h3>
							</header>
							<div class="price-table-body">
								<ul class="price-table-list">
									<li class="fas fa-dollar-sign">Clube de vantagens em todo Brasil</li>
									<li class="fas fa-store">-Estabelecimentos parceiros exclusivos</li>
									Descontos em todos os produtos da Atlética
      								Descontos em todas as festas da Atlética
									Descontos nos campeonatos esportivos da Atlética
									Vantagens dentro dos eventos da Atlética
								</ul>
								<div class="text-center">
									<a href="https://www.forsocios.com/engvassouras#main" class="btn btn-danger btn-raised"><i class="glyphicon glyphicon-euro"></i>Eu quero!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--container -->
		</div>
		<section class="mt-6">
			<div class="container">
				<h1 class="color-primary text-center" text-center>Nossa Equipe</h1>
				<div class="row d-flex justify-content-center">
					<div class="col-lg-4 col-md-6">
						<div class="card mt-4 card-danger wow zoomInUp">
							<div class="ms-hero-bg-danger ms-hero-img-city">
								<img src="../assets/img/demo/avatar1.jpg" alt="..." class="img-avatar-circle">
							</div>
							<div class="card-body pt-6 text-center">
								<h3 class="color-danger">Victoria Smith</h3>
								<p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse
									voluptates officia repudiandae beatae magni es magnam autem molestias.</p>
								<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
								<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
								<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="card mt-4 card-info wow zoomInUp">
							<div class="ms-hero-bg-info ms-hero-img-city">
								<img src="../assets/img/demo/avatar2.jpg" alt="..." class="img-avatar-circle">
							</div>
							<div class="card-body pt-6 text-center">
								<h3 class="color-info">Charlie Durant</h3>
								<p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse
									voluptates officia repudiandae beatae magni es magnam autem molestias.</p>
								<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
								<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
								<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="card mt-4 card-warning wow zoomInUp">
							<div class="ms-hero-bg-warning ms-hero-img-city">
								<img src="../assets/img/demo/avatar3.jpg" alt="..." class="img-avatar-circle">
							</div>
							<div class="card-body pt-6 text-center">
								<h3 class="color-warning">Joan Fawert</h3>
								<p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse
									voluptates officia repudiandae beatae magni es magnam autem molestias.</p>
								<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i class="zmdi zmdi-facebook"></i></a>
								<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i class="zmdi zmdi-twitter"></i></a>
								<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i class="zmdi zmdi-instagram"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer class="ms-footer">
			<div class="container">
				<p>Copyright &copy; Material Style 2017</p>
			</div>
		</footer>

		<script src="../assets/js/plugins.min.js"></script>
		<script src="../assets/js/app.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {

				$(".btn-modal-fotos").click(function() {
					id_foto = this.id;
					$.ajax({
						url: '../admin/controller/atletica/buscar_ultimas_fotos.php',
						method: "POST",
						data: {
							buscarPorID: id_foto
						},
						success: function(dados) {
							dados = JSON.parse(dados);
							//Formatar Data do Evento
							data_evento = dados.data_evento.split('-');
							data_evento = data_evento[2] + '/' + data_evento[1] + '/' + data_evento[0];

							//Exibir no modal os dados
							$("#modal-ultimas-fotos-titulo").html(dados.titulo);
							$("#modal-ultimas-fotos-descricao").html(dados.descricao);
							$("#modal-ultimas-fotos-data").html(data_evento);
							$("#modal-ultimas-fotos-imagem").attr('src', '../admin/dist/img/atletica/ultimas_fotos/' + dados.foto);
						}
					})
				})
			})
		</script>
</body>

</html>