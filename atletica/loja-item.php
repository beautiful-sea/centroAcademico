<?php
session_start();


require_once('../admin/auto_load.php');
$p = new Produto;

if(isset($_GET['i'])){
	$id_produto = $_GET['i'];
	$produto = $p->buscarPorID($id_produto);
	if($produto){
		$todos_produtos = $p->buscarTodos();
	}else{
		header("Location: loja.php");
		
	}

}else{
	header("Location: loja.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#333">
	<title>Material Style</title>
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
			<a href="javascript:void(0)" id="btn_carrinho" class="ms-conf-btn ms-configurator-btn btn-circle btn-circle-raised btn-circle-primary animated rubberBand" style="right: 20px;"><i class="zmdi zmdi-shopping-cart"></i>
			</a>
			<div id="ms-configurator" class="ms-configurator" style="right: -310px;">
				<div class="ms-configurator-title">
					<h3><i class="zmdi zmdi-shopping-cart"></i> Carrinho de Compras</h3>
					<a href="javascript:void(0);" class="ms-conf-btn withripple"><i class="zmdi zmdi-close"></i><div class="ripple-container"></div></a>
				</div>
				<div class="panel-group" id="accordion_conf" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="ms-conf-header-color">
							<h4 class="panel-title">
								<a role="button" class="withripple" data-toggle="collapse" href="#ms-collapse-conf-1" aria-expanded="true" aria-controls="ms-collapse-conf-1">
									<i class=""></i> Produtos </a>
								</h4>
							</div>
							<div id="ms-collapse-conf-1" class="card-collapse collapse show" role="tabpanel" aria-labelledby="ms-conf-header-color" data-parent="#accordion_conf">
								<div class="panel-body" style="height: 400px;overflow: auto;">
									<div class=" row justify-content-end">
										<div class="col-lg-12">
											<select id="tipo_cliente" class="color-white form-control" onchange="setTipoCliente(this.value)" data-dropup-auto="true">
												<option class="color-black" disabled="" selected>SELECIONE UMA OPÇÃO</option>
												<option class="color-bordo" value="1">Sou sócio da Atlética </option>
												<option class="color-bordo" value="0">Não sou sócio da Atlética </option>
											</select>
										</div>
									</div>
									
									<div id="itens_carrinho">
										
									</div>
									
									<div id="grad-options" class="ms-color-shine total_compra">
										<h4>Você ainda não adicionou produtos no carrinho.</h4>
									</div>																	
								</div>
							</div>

						</div>
					</div>
					<div class="panel-group" id="accordion_conf" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="ms-conf-header-color">
								<h4 class="panel-title">
									<a role="button" class="withripple" data-toggle="collapse" href="#ms-collapse-conf-2" aria-expanded="true" aria-controls="ms-collapse-conf-1">
										<i class=""></i> Comprador </a>
									</h4>
								</div>
								<div id="ms-collapse-conf-2" class="card-collapse collapse" role="tabpanel" aria-labelledby="ms-conf-header-color" data-parent="#accordion_conf">
									<div class="panel-body">
										<div id="grad-options" class="ms-color-shine">
											<h4>Preencha com seus dados</h4>
										</div>										
										<div class="form-group">
											<label>Seu Nome: </label>
											<input  type="text" class="form-control color-white" id="input_nome_comprador" name="nome" >
										</div>
										<div class="form-group">
											<label>Seu Email: </label>
											<input type="text" class="form-control color-white" id="input_email_comprador" name="nome">
										</div>										
									</div>
									
								</div>
							</div>
						</div>
						<div class="panel-group" id="accordion_conf" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="ms-conf-header-color">
									<h4 class="panel-title">
										<a role="button" class="withripple" data-toggle="collapse" href="#ms-collapse-conf-3" aria-expanded="true" aria-controls="ms-collapse-conf-3">
											<i class=""></i> Resumo </a>
										</h4>
									</div>
									<div id="ms-collapse-conf-3" class="card-collapse collapse" role="tabpanel" aria-labelledby="ms-conf-header-color" data-parent="#accordion_conf">
										<div class="panel-body" style="height: 400px;overflow: auto;">
											<div id="body-resumo-comprador">
												<div class="card container ">
													<h4 class="color-bordo"><b>Seus Dados:</b></h4>
													<p class="color-bordo">Nome: <span id="resumo_nome_comprador"></span></p>
													<p class="color-bordo">Email: <span id="resumo_email_comprador"></span> </p>
												</div>
											</div>
											<hr>
											<div>
												<div class="card container ">
													<h4 class="color-bordo"><b>Produtos:</b></h4>
													<div id="body-resumo-produtos">
														<p class="color-bordo">Seu carrinho está vazio, que tal adicionar algumas coisas!?</p>
													</div>	
												</div>
											</div>
											<h4>Total do pedido: R$ <span id="resumo-total-pedido">00,00</span></h4>
											<button class="btn btn-raised btn-bordo" id="btn-finalizar-pedido">Finalizar Pedido</button>		
										</div>

									</div>
								</div>
							</div>
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
									<span class="ms-logo ms-logo-white ms-logo-sm mr-1">M</span>
									<h3 class="no-m ms-site-title">Material<span>Style</span></h3>
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
									<a href="#" class="nav-link  animated fadeIn animation-delay-7" >Home </a>
								</li>

								<li class="nav-item">
									<a href="loja.php" class="nav-link animated fadeIn animation-delay-9" role="button" >Produtos</a>
								</li>

								<li class="nav-item">
									<a href="produtos.html" class="nav-link animated fadeIn animation-delay-9" role="button" >Quem Somos</a>
								</li>
								<li class="nav-item">
									<a href="produtos.html" class="nav-link animated fadeIn animation-delay-9" role="button" >Contato</a>
								</li>                
							</ul>
						</div>
						<a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu"><i class="zmdi zmdi-menu"></i></a>
					</div> <!-- container -->
				</nav>
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div id="carousel-product"
							class="ms-carousel ms-carousel-thumb carousel slide animated zoomInUp animation-delay-5"
							data-ride="carousel" data-interval="0">
							<div class="card card-body">
								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<div class="carousel-item active">
										<img src='../admin/dist/img/loja/produtos/<?php echo $produto["foto"]?> ' alt="...">
									</div><!-- 
									<div class="carousel-item">
										<img src="../assets/img/demo/products/2.jpg" alt="...">
									</div>
									<div class="carousel-item">
										<img src="../assets/img/demo/products/3.jpg" alt="...">
									</div>
									<div class="carousel-item">
										<img src="../assets/img/demo/products/4.jpg" alt="...">
									</div>
									<div class="carousel-item">
										<img src="../assets/img/demo/products/5.jpg" alt="...">
									</div> -->
								</div>
							</div>
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-tumbs carousel-indicators-tumbs-outside">
								<li data-target="#carousel-product" data-slide-to="0" class="active">
									<img width="80px" src='../admin/dist/img/loja/produtos/<?php echo $produto["foto"]?> ' alt="...">
								</li><!-- 
								<li data-target="#carousel-product" data-slide-to="1">
									<img src="../assets/img/demo/products/m2.png" alt="">
								</li>
								<li data-target="#carousel-product" data-slide-to="2">
									<img src="../assets/img/demo/products/m3.png" alt="">
								</li>
								<li data-target="#carousel-product" data-slide-to="3">
									<img src="../assets/img/demo/products/m4.png" alt="">
								</li>
								<li data-target="#carousel-product" data-slide-to="4">
									<img src="../assets/img/demo/products/m5.png" alt="">
								</li> -->
							</ol>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card animated zoomInDown animation-delay-5">
							<div class="card-body">
								<h2><?php echo $produto['nome']; ?></h2>
								<div class="mb-2 mt-4">
									<div class="row">
										<div class="col-sm-6 offset-3 text-center">
											<h2 class="color-success no-m text-normal d-inline">R$ <?php echo $produto['valor_socios'];?>,00</h2>
											<h4 class="color-bordo-inverse d-inline" style="padding: 2px;border-radius: 10px;"><b>Sócio</b></h4>
										</div>
									</div>
								</div>
								<p class="lead">
									<?php echo $produto['descricao'];?>
								</p>
								<ul class="list-unstyled">
									<li><strong>Categoria: </strong>Roupas</li>
											<li class="mb-2"><strong>Disponibilidade: </strong> <span class="ms-tag ms-tag-success">Em estoque</span>
											</li>
											<li><strong>Valor para não Sócios: </strong> <span class="color-warning">R$ <?php echo $produto['valor'];?>,00</span></li>
										</ul>
										<a href="javascript:void(0)" class="btn btn-primary btn-block btn-raised mt-2 no-mb" onclick="add_carrinho(<?php echo $produto['id'];?>)"><i
											class="zmdi zmdi-shopping-cart-plus" ></i>Adicionar ao Carrinho</a>
										</div>
									</div>

								</div>
							</div>
							<h2 class="mt-4 mb-4 right-line">Outros Produtos</h2>
							<div class="row">
								<?php 
								for ($i=0; $i <3 ; $i++) { 

									echo '
									<div class="col-md-4">
									<div class="card ms-feature">
									<div class="card-body overflow-hidden text-center">
									<a href="loja-item.php?i='.$todos_produtos[$i]['id'].'"><img src="../admin/dist/img/loja/produtos/' . $todos_produtos[$i]['foto'] . '" alt=""
									class="img-fluid center-block"></a>
									<h4 class="text-normal text-center">' . $todos_produtos[$i]['nome'] . '</h4>
									<p>Quibusdam aperiam tempora ut blanditiis cumque ab pariatur.</p>
									<div>
									<h2 class="d-inline">
									<b>R$ ' . $todos_produtos[$i]['valor_socios'] . '</b>
									</h2>
									<div class="d-inline">
									<h4 class="color-bordo-inverse d-inline" style="padding: 2px;border-radius: 10px;"><b>Sócio</b></h4></div>
									</div>
									<p>
									R$ ' . $todos_produtos[$i]['valor'] . ' para não sócios
									</p>
									<a href="javascript:void(0)" onclick="add_carrinho('.$todos_produtos[$i]['id'].')" class="ms-conf-btn animated rubberBand btn btn-bordo btn-sm btn-block btn-raised"><i
									class="zmdi zmdi-shopping-cart-plus"></i> Adicionar ao Carrinho</a>
									</div>
									</div>
									</div>
									'; 
								}?>
							</div>	
						</div><!-- container -->
						<footer class="ms-footer">
							<div class="container">
								<p>Copyright &copy; Material Style 2017</p>
							</div>
						</footer>

						<script src="../assets/js/plugins.min.js"></script>
						<script src="../assets/js/app.min.js"></script>
						<script src="../assets/js/loja.js"></script>
					</body>

					</html>