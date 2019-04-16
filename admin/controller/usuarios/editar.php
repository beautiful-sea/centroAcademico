<?php
session_start();
require_once('../../auto_load.php');

$usuario = new Usuario($_POST);

if($usuario->editar()){
	header("Location: ../../view/usuarios/gerenciar.php?e=1");
}else{
	header("Location: ../../view/usuarios/gerenciar.php?e=2");	
}



?>