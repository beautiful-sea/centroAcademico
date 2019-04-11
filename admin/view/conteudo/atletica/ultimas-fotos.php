<?php

session_start();
require_once('../../../auto_load.php');

if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}else{
	$sessao_usuario = $_SESSION['usuario'];
	$ultimas_fotos = new UltimasFotos();
	$todas = $ultimas_fotos->buscarTodas();

	$mensagem = '';//Mensagem de retorno ao enviar formulario de cadastro
	$alert = ''; //Define a cordo do alert gerado para mensagem
	if(isset($_GET['r'])){//Verifica se existe alguma mensagem ao 'r'egistrar usuario
	switch ($_GET['r']) {
		case 1:
		$mensagem = "Cadastro Realizado com Sucesso.";
		$alert = 'alert alert-success';
		break;
		case 2:
		$mensagem = "Erro ao cadastrar Imagem.";
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
	<link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../../bower_components/font-awesome/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../../dist/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../../../dist/css/skins/skin-bordo.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-bordo sidebar-mini">
	<!-- Modal Editar -->
	<div class="modal fade" id="modal-editar">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Editar Foto</h4>
					</div>
					<div class="modal-body">
						<div class="box-body" >
							<form role="form" action="../../../controller/atletica/editar_ultimas_fotos.php" method="POST" enctype="multipart/form-data">
								<div class="box-body">
									<input type="hidden" name="id" id="id">
									<div class="form-group">
										<label for="editar_titulo">Título</label>
										<input type="text" name="titulo" class="form-control" id="editar_titulo" placeholder="Digite o Título">
									</div>
									<div class="form-group">
										<label for="editar_descricao">Descrição</label>
										<input type="text" name="descricao" class="form-control" id="editar_descricao" placeholder="Digite a Descrição">
									</div>
									<div class="form-group">
										<label for="editar_data">Data</label>
										<input type="date" name="data" class="form-control" id="editar_data" >
									</div>
									<div class="form-group">
										<label for="cadastro_senha">Foto</label>
										<input type="file" name="foto" class="form-control" id="cadastro_foto">
									</div>

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
														<img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
														<img src="../../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
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
														<img src="../../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
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
														<img src="../../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
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
														<img src="../../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
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
				<img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo($sessao_usuario['nome']);  ?></p>
				<a href="../../../controller/logout.php"><i class="fa fa-power-off"></i> Sair</a>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">

			<li>
				<a href="#">
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
					<li><a href="../../../view/usuarios/gerenciar.php"><i class="far fa-circle"></i> Gerenciar</a></li>

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
					<li><a href="../../../view/loja/produtos.php"><i class="far fa-circle"></i> Produtos</a></li>

				</ul>
			</li>
			<li class="treeview" >
				<a href="#">
					<i class="fa fa-pager"></i> <span>Gerenciar Conteúdo</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="treeview" style="display: block;">
						<a href="#"><i class="far fa-circle"></i> Atlética
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu" style="display: block;">
							<li><a href="../../../view/conteudo/atletica/ultimas-fotos.php"><i class="far fa-images"></i> Últimas Fotos</a></li>
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
			Gerenciar conteúdo
			<small>Últimas Fotos</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Gerenciar Conteúdo</li>
			<li class="">Atlética</li>
			<li class="">Últimas Fotos</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<?php 
		if(isset($_GET['e']) && $_GET['e'] == 1){
			echo '<div class="alert alert-success col-md-3">Foto editada com sucesso.</div>';
		}elseif(isset($_GET['e']) && $_GET['e'] == 2){
			echo '<div class="alert alert-danger col-md-3">Erro ao editar foto.</div>';
		}
		
		?>
		<div class="row">

			<!-- fix for small devices only -->
			<div class="clearfix visible-sm-block"></div>
			<div class="container">
				<div class="col-md-1"></div>
				<div class="row col-md-10" style="padding: 20px 20px">
					<?php 
					foreach ($todas as $value) {

						echo '
						<div class="col-xl-4 col-md-4 mb-4" style="height:200px">
						<div class="ms-thumbnail-container wow fadeInUp">
						<figure class="ms-thumbnail">
						<img style="max-height:150px" src="../../../dist/img/atletica/ultimas_fotos/'.$value["foto"].'" alt="" class="img-fluid">
						<figcaption class="ms-thumbnail-caption text-center">
						<div class="ms-thumbnail-caption-content">
						<h3 class="ms-thumbnail-caption-title">'.$value["titulo"].'</h3>
						<p>'.$value["descricao"].'</p>
						<a href="javascript:editar('.$value["id"].')" class="btn btn-white btn-raised color-bordo"><i
						class="fa fa-edit"></i> Editar
						</a>
						</div>
						</figcaption>
						</figure>
						</div>
						</div>';
					}
					?>
				</div>
			</div>
			<div class="col-md-6 ">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Cadastro de Fotos</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="../../../controller/atletica/cadastrar_ultimas_fotos.php" enctype="multipart/form-data" method="POST">
						<div class="box-body">
							<div class="form-group">
								<label for="cadastro_titulo">Título</label>
								<input type="text" name="titulo" class="form-control" id="cadastro_titulo" placeholder="Digite o Título">
							</div>
							<div class="form-group">
								<label for="cadastro_descricao">Descrição</label>
								<input type="text" name="descricao" class="form-control" id="cadastro_descricao" placeholder="Digite a Descrição">
							</div>
							<div class="form-group">
								<label for="cadastro_senha">Data</label>
								<input type="date" name="data" class="form-control" id="cadastro_data" >
							</div>
							<div class="form-group">
								<label for="cadastro_senha">Foto</label>
								<input type="file" name="foto" class="form-control" id="cadastro_foto">
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
						<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash"></i></a>
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
	<script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../../../dist/js/adminlte.min.js"></script>
	<!-- Sparkline -->
	<script src="../../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- SlimScroll -->
	<script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- ChartJS -->
	<script src="../../../bower_components/chart.js/Chart.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../../../dist/js/demo.js"></script>


	<script src="../../../dist/js/ultimas-fotos.js"></script>
</body>
</html>
