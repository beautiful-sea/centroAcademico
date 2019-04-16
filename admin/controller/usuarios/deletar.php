<?php
session_start();
require_once('../../auto_load.php');

$usuario = new Usuario($_POST);

$dados = $usuario->buscarPorID();//Busca o usuário que vai ser deletado pelo ID

if($dados['id'] == $_SESSION['usuario']['id']){//Verifica se usuário nao esta tentando se deletar
	header("Location: ../../view/usuarios/gerenciar.php?d=2");
	exit();
}
if($usuario->deletar()){
	header("Location: ../../view/usuarios/gerenciar.php?d=1");	
}

