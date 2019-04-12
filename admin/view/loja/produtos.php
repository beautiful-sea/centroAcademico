<?php

session_start();
require_once('../../auto_load.php');

if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}else{
	$sessao_usuario = $_SESSION['usuario'];
	$usuario = new Usuario;
	$qntd_usuarios = count($usuario->getTodos());

	$mensagem = '';//Mensagem de retorno ao enviar formulario de cadastro
	$alert = ''; //Define a cor do do alert gerado para mensagem
	if(isset($_GET['r'])){//Verifica se existe alguma mensagem ao 'r'egistrar produto
	switch ($_GET['r']) {
		case 1:
		$mensagem = "Produto cadastrado com Sucesso.";
		$alert = 'alert alert-success';
		break;
		case 2:
		$mensagem = "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.";
		$alert = 'alert alert-warning';
		break;
		case 3:
		$mensagem = 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png", com tamanho maximo de 5Mb';
		$alert = 'alert alert-danger';
		break;
		case 4:
		$mensagem = 'Você não enviou nenhum arquivo!';
		$alert = 'alert alert-danger';
		break;
	}
}
	if(isset($_GET['e'])){//Verifica se existe alguma mensagem ao 'e'ditar produto
	switch ($_GET['e']) {
		case 1:
		$mensagem = "Dados Editados com sucesso.";
		$alert = 'alert alert-success';
		break;
	}
}

	if(isset($_GET['d'])){//Verifica se existe alguma mensagem ao 'd'eletar produto
	switch ($_GET['d']) {
		case 1:
		$mensagem = "Produto removido com sucesso.";
		$alert = 'alert alert-danger';
		break;
	}
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Painel de Controle</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../bower_components/font-awesome/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../dist/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../../dist/css/skins/skin-bordo.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
	.example-modal .modal {
		position: relative;
		top: auto;
		bottom: auto;
		right: auto;
		left: auto;
		display: block;
		z-index: 1;
	}

	.example-modal .modal {
		background: transparent !important;
	}
</style>
</head>
<body class="hold-transition skin-bordo sidebar-mini fixed">
	
	<!-- Modal Editar -->
	<div class="modal fade" id="modal-editar">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Editar dados</h4>
					</div>
					<div class="modal-body">
						<div class="box-body" >
							<div class="box-body">
								<form role="form" action="../../controller/loja/editar_produtos.php" method="POST" enctype="multipart/form-data">
									<div class="box-body">
										<input type="hidden" name="id" class="form-control" id="editar_id" >
										<div class="form-group">
											<label for="editar_nome">Nome</label>
											<input type="text" name="nome" class="form-control" id="editar_nome" placeholder="Digite o nome do produto">
										</div>
										<div class="form-group">
											<label for="editar_valor">Valor</label>
											<div class="input-group">
												<span class="input-group-addon"><b style="font-size: 15px">R</b><i class="fa fa-dollar-sign"></i></span>
												<input type="number" step="0.01" class="form-control" id="editar_valor" name="valor" placeholder="Digite o preço do produto">
											</div>
										</div>
										<div class="form-group">
											<label for="editar_valor_socios">Valor para Sócios</label>
											<div class="input-group">
												<span class="input-group-addon"><b style="font-size: 15px">R</b><i class="fa fa-dollar-sign"></i></span>
												<input type="number" step="0.01" name="valor_socios" id="editar_valor_socios" class="form-control" placeholder="Digite o preço do produto">
											</div>
										</div>
										<div class="form-group">
											<label for="editar_descricao">Descrição</label>
											<textarea  name="descricao" class="form-control" id="editar_descricao" placeholder="Digite a Descrição do Produto"></textarea>
										</div>
										<div class="form-group">
											<label for="editar_foto">Foto</label>
											<input type="file" name="foto" class="form-control" id="editar_foto">
											<p class="help-block">Tamanho maximo: 5mb</p>
										</div>
									</div>
									<!-- /.box-body -->
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-success">Salvar Dados</button>
						</div>
					</div>
				</form>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<!-- Modal Detalhes -->
		<div class="modal fade" id="modal-detalhes">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detalhes</h4>
						</div>
						<div class="modal-body">
							<div class="box-body" >
								<dl id="body-modal-detalhes">
								</dl>
							</div>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- Modal Remover -->
			<div class="modal fade" id="modal-remover">
				<div class="modal-dialog modal-danger">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Deletar Produto</h4>
							</div>
							<form action="../../controller/loja/deletar_produtos.php" method="POST">
								<div class="modal-body">
									<p><b style="font-size: 20px">Tem certeza que deseja remover o produto?</b></p>
									<input type="hidden" name="id" id="remover_id">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn ">Confirmar</button>
								</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<div class="wrapper">

					<header class="main-header">

						<!-- Logo -->
						<a href="index2.html" class="logo">
							<!-- mini logo for sidebar mini 50x50 pixels -->
							<span class="logo-mini"><b>A</b>CA</span>
							<!-- logo for regular state and mobile devices -->
							<span class="logo-lg"><b>Admin</b>CA</span>
						</a>

						<!-- Header Navbar: style can be found in header.less -->
						<nav class="navbar navbar-static-top">
							<!-- Sidebar toggle button-->
							<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
								<span class="sr-only">Toggle navigation</span>
							</a>
							<!-- Navbar Right Menu -->
							<div class="navbar-custom-menu">
								<ul class="nav navbar-nav">
									<!-- Messages: style can be found in dropdown.less-->
									<li class="dropdown messages-menu">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="fa fa-envelope"></i>
											<span class="label label-success">4</span>
										</a>
										<ul class="dropdown-menu">
											<li class="header">You have 4 messages</li>
											<li>
												<!-- inner menu: contains the actual data -->
												<ul class="menu">
													<li><!-- start message -->
														<a href="#">
															<div class="pull-left">
																<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
															</div>
															<h4>
																Support Team
																<small><i class="fa fa-clock"></i> 5 mins</small>
															</h4>
															<p>Why not buy a new awesome theme?</p>
														</a>
													</li>
													<!-- end message -->
													<li>
														<a href="#">
															<div class="pull-left">
																<img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
															</div>
															<h4>
																AdminLTE Design Team
																<small><i class="fa fa-clock"></i> 2 hours</small>
															</h4>
															<p>Why not buy a new awesome theme?</p>
														</a>
													</li>
													<li>
														<a href="#">
															<div class="pull-left">
																<img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
															</div>
															<h4>
																Developers
																<small><i class="fa fa-clock-o"></i> Today</small>
															</h4>
															<p>Why not buy a new awesome theme?</p>
														</a>
													</li>
													<li>
														<a href="#">
															<div class="pull-left">
																<img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
															</div>
															<h4>
																Sales Department
																<small><i class="fa fa-clock-o"></i> Yesterday</small>
															</h4>
															<p>Why not buy a new awesome theme?</p>
														</a>
													</li>
													<li>
														<a href="#">
															<div class="pull-left">
																<img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
															</div>
															<h4>
																Reviewers
																<small><i class="fa fa-clock-o"></i> 2 days</small>
															</h4>
															<p>Why not buy a new awesome theme?</p>
														</a>
													</li>
												</ul>
											</li>
											<li class="footer"><a href="#">See All Messages</a></li>
										</ul>
									</li>
									<!-- Notifications: style can be found in dropdown.less -->
									<li class="dropdown notifications-menu">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="fa fa-bell"></i>
											<span class="label label-warning">10</span>
										</a>
										<ul class="dropdown-menu">
											<li class="header">You have 10 notifications</li>
											<li>
												<!-- inner menu: contains the actual data -->
												<ul class="menu">
													<li>
														<a href="#">
															<i class="fa fa-users text-aqua"></i> 5 new members joined today
														</a>
													</li>
													<li>
														<a href="#">
															<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
															page and may cause design problems
														</a>
													</li>
													<li>
														<a href="#">
															<i class="fa fa-users text-red"></i> 5 new members joined
														</a>
													</li>
													<li>
														<a href="#">
															<i class="fa fa-shopping-cart text-green"></i> 25 sales made
														</a>
													</li>
													<li>
														<a href="#">
															<i class="fa fa-user text-red"></i> You changed your username
														</a>
													</li>
												</ul>
											</li>
											<li class="footer"><a href="#">View all</a></li>
										</ul>
									</li>
									<!-- Tasks: style can be found in dropdown.less -->
									<li class="dropdown tasks-menu">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="fa fa-flag"></i>
											<span class="label label-danger">9</span>
										</a>
										<ul class="dropdown-menu">
											<li class="header">You have 9 tasks</li>
											<li>
												<!-- inner menu: contains the actual data -->
												<ul class="menu">
													<li><!-- Task item -->
														<a href="#">
															<h3>
																Design some buttons
																<small class="pull-right">20%</small>
															</h3>
															<div class="progress xs">
																<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
																aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
																<span class="sr-only">20% Complete</span>
															</div>
														</div>
													</a>
												</li>
												<!-- end task item -->
												<li><!-- Task item -->
													<a href="#">
														<h3>
															Create a nice theme
															<small class="pull-right">40%</small>
														</h3>
														<div class="progress xs">
															<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
															aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
															<span class="sr-only">40% Complete</span>
														</div>
													</div>
												</a>
											</li>
											<!-- end task item -->
											<li><!-- Task item -->
												<a href="#">
													<h3>
														Some task I need to do
														<small class="pull-right">60%</small>
													</h3>
													<div class="progress xs">
														<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
														aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
														<span class="sr-only">60% Complete</span>
													</div>
												</div>
											</a>
										</li>
										<!-- end task item -->
										<li><!-- Task item -->
											<a href="#">
												<h3>
													Make beautiful transitions
													<small class="pull-right">80%</small>
												</h3>
												<div class="progress xs">
													<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
													aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">80% Complete</span>
												</div>
											</div>
										</a>
									</li>
									<!-- end task item -->
								</ul>
							</li>
							<li class="footer">
								<a href="#">View all tasks</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="#" data-toggle="control-sidebar"><i class="fa fa-cog"></i></a>
					</li>
				</ul>
			</div>

		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?php echo($sessao_usuario['nome']);  ?></p>
					<a href="../../controller/logout.php"><i class="fa fa-power-off"></i> Sair</a>
				</div>
			</div>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu" data-widget="tree">

				<li>
					<a href="../../index.php">
						<i class="fa fa-tachometer-alt"></i> <span>Painel</span>
					</a>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i> <span>Usuários</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="../../view/usuarios/gerenciar.php"><i class="far fa-circle"></i> Gerenciar</a></li>

					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-store"></i> <span>Vitrine Online</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="../loja/produtos.php"><i class="fa fa-circle"></i> Produtos</a></li>

					</ul>
				</li>
				<li class="treeview">
					<a href="#">
					<i class="fa fa-pager"></i> <span>Gerenciar Conteúdo</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="treeview">
						<a href="#"><i class="far fa-circle"></i> Atlética
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu" style="display: none;">
							<li><a href="view/conteudo/atletica/ultimas-fotos.php"><i class="far fa-images"></i> Últimas Fotos</a></li>
							<li><a href="#"><i class="fa fa-columns"></i> Notícias</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#"><i class="far fa-circle"></i> Centro Acadêmico
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu" style="display: none;">
							<li><a href="#"><i class="far fa-circle-o"></i> Últimas Fotos</a></li>
							<li><a href="#"><i class="far fa-circle-o"></i> Notícias</a></li>
							
						</ul>
					</li>
				</ul>
				</li>

			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Gerenciamento da Vitrine Online
			</h1>

			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-tachometer-alt"></i> Home</a></li>
				<li class="active">Gerenciamento da vitrine</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div <?php if($alert != '' && isset($_GET['e'])) echo "class='$alert'"; ?>><?php if($mensagem != '' && isset($_GET['e'])) echo $mensagem; ?></div>
			<div <?php if($alert != '' && isset($_GET['d'])) echo "class='$alert'"; ?>><?php if($mensagem != '' && isset($_GET['d'])) echo $mensagem; ?></div>
			<div class="row">
				<!-- fix for small devices only -->
				<div class="clearfix visible-sm-block"></div>
			</div>
			<div class="row">

				<!-- fix for small devices only -->
				<div class="clearfix visible-sm-block"></div>
				<div class="col-md-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Buscar produtos</h3>
							<button class=" btn btn-default btn-raised" id="todos_produtos">Todos</button>
							<div class="box-tools">
								<form role="form" action="#" method="POST" id="form_buscar_produto">
									<div class="input-group input-group-sm" style="width: 150px;">
										<input type="text" name="buscar_produto" class="form-control pull-right" placeholder="Nome do Produto" id="consulta">

										<div class="input-group-btn">
											<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover">
								<tbody id="resultado_consulta">

								</tbody></table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<div class="col-md-6 ">
						<!-- general form elements -->
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Cadastro de Produtos</h3>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<form role="form" action="../../controller/loja/cadastrar_produtos.php" method="POST" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label for="cadastro_nome">Nome</label>
										<input type="text" name="nome" class="form-control" id="cadastro_nome" placeholder="Digite o nome do produto">
									</div>
									<div class="form-group">
										<label for="cadastro_valor">Valor</label>
										<div class="input-group">
											<span class="input-group-addon"><b style="font-size: 15px">R</b><i class="fa fa-dollar-sign"></i></span>
											<input type="number" step="0.01" class="form-control" id="cadastro_valor" name="valor" placeholder="Digite o preço do produto">
										</div>
									</div>
									<div class="form-group">
										<label for="cadastro_valor_socios">Valor para Sócios</label>
										<div class="input-group">
											<span class="input-group-addon"><b style="font-size: 15px">R</b><i class="fa fa-dollar-sign"></i></span>
											<input type="number" step="0.01" name="valor_socios" id="cadastro_valor_socios" class="form-control" placeholder="Digite o preço do produto">
										</div>
									</div>
									<div class="form-group">
										<label for="cadastro_descricao">Descrição</label>
										<textarea  name="descricao" class="form-control" id="cadastro_descricao" placeholder="Digite a Descrição do Produto"></textarea>
									</div>
									<div class="form-group">
										<label for="cadastro_foto">Foto</label>
										<input type="file" name="foto" class="form-control" id="cadastro_foto">
										<p class="help-block">Tamanho maximo: 5mb</p>
									</div>
								</div>
								<!-- /.box-body -->

								<div class="box-footer">

									<div <?php if($alert != '' && isset($_GET['r'])) echo "class='$alert'"; ?>>
										<p><?php if($mensagem != '' && isset($_GET['r'])) echo $mensagem;?></p>
									</div>
									<button type="submit" class="btn btn-primary">Cadastrar</button>
								</div>
							</form>
						</div>
						<!-- /.box -->
					</div>
				</div>
			</div><!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->


	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Versão</b> 1.0.0
		</div>
		<strong>Copyright &copy; 2019 <a href="https://adminlte.io">xxx</a>.</strong> Todos direitos reservados.
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Create the tabs -->
		<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
			<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
			<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Home tab content -->
			<div class="tab-pane" id="control-sidebar-home-tab">
				<h3 class="control-sidebar-heading">Recent Activity</h3>
				<ul class="control-sidebar-menu">
					<li>
						<a href="javascript:void(0)">
							<i class="menu-icon fa fa-birthday-cake bg-red"></i>

							<div class="menu-info">
								<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

								<p>Will be 23 on April 24th</p>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<i class="menu-icon fa fa-user bg-yellow"></i>

							<div class="menu-info">
								<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

								<p>New phone +1(800)555-1234</p>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

							<div class="menu-info">
								<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

								<p>nora@example.com</p>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<i class="menu-icon fa fa-file-code-o bg-green"></i>

							<div class="menu-info">
								<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

								<p>Execution time 5 seconds</p>
							</div>
						</a>
					</li>
				</ul>
				<!-- /.control-sidebar-menu -->

				<h3 class="control-sidebar-heading">Tasks Progress</h3>
				<ul class="control-sidebar-menu">
					<li>
						<a href="javascript:void(0)">
							<h4 class="control-sidebar-subheading">
								Custom Template Design
								<span class="label label-danger pull-right">70%</span>
							</h4>

							<div class="progress progress-xxs">
								<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<h4 class="control-sidebar-subheading">
								Update Resume
								<span class="label label-success pull-right">95%</span>
							</h4>

							<div class="progress progress-xxs">
								<div class="progress-bar progress-bar-success" style="width: 95%"></div>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<h4 class="control-sidebar-subheading">
								Laravel Integration
								<span class="label label-warning pull-right">50%</span>
							</h4>

							<div class="progress progress-xxs">
								<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
							</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<h4 class="control-sidebar-subheading">
								Back End Framework
								<span class="label label-primary pull-right">68%</span>
							</h4>

							<div class="progress progress-xxs">
								<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
							</div>
						</a>
					</li>
				</ul>
				<!-- /.control-sidebar-menu -->

			</div>
			<!-- /.tab-pane -->

			<!-- Settings tab content -->
			<div class="tab-pane" id="control-sidebar-settings-tab">
				<form method="post">
					<h3 class="control-sidebar-heading">General Settings</h3>

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Report panel usage
							<input type="checkbox" class="pull-right" checked>
						</label>

						<p>
							Some information about this general settings option
						</p>
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Allow mail redirect
							<input type="checkbox" class="pull-right" checked>
						</label>

						<p>
							Other sets of options are available
						</p>
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Expose author name in posts
							<input type="checkbox" class="pull-right" checked>
						</label>

						<p>
							Allow the user to show his name in blog posts
						</p>
					</div>
					<!-- /.form-group -->

					<h3 class="control-sidebar-heading">Chat Settings</h3>

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Show me as online
							<input type="checkbox" class="pull-right" checked>
						</label>
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Turn off notifications
							<input type="checkbox" class="pull-right">
						</label>
					</div>
					<!-- /.form-group -->

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Delete chat history
							<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
						</label>
					</div>
					<!-- /.form-group -->
				</form>
			</div>
			<!-- /.tab-pane -->
		</div>
	</aside>
	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
		immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>

	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/adminlte.min.js"></script>
	<!-- Sparkline -->
	<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- SlimScroll -->
	<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- ChartJS -->
	<script src="../../bower_components/chart.js/Chart.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="../../dist/js/pages/dashboard2.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../../dist/js/demo.js"></script>
	<script src="../../dist/js/buscar_produto.js"></script>
</body>
</html>
