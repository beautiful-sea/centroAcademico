<?php
session_start();
require_once('../../auto_load.php');

$id_usuario = $_POST['id'];

$usuario = new Usuario;

$dados = $usuario->buscarPorID($id_usuario);//Busca o usuário que vai ser deletado pelo ID

if($dados['id'] == $_SESSION['usuario']['id']){//Verifica se usuário nao esta tentando se deletar
	header("Location: ../../view/usuarios/gerenciar.php?d=2");
	exit();
}
if($usuario->deletar($id_usuario)){
	header("Location: ../../view/usuarios/gerenciar.php?d=1");	
}

