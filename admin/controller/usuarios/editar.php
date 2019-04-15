<?php
session_start();
require_once('../../auto_load.php');


$id 	= $_POST['id'];
$nome 	= $_POST['nome'];	
$email	= $_POST['email'];
$admin  = $_POST['admin'];

$usuario = new Usuario;

$usuario->setNome($nome);
$usuario->setEmail($email);
$usuario->setAdmin($admin);

if($usuario->editar($id)){
	header("Location: ../../view/usuarios/gerenciar.php?e=1");
}else{
	header("Location: ../../view/usuarios/gerenciar.php?e=1");	
}



?>