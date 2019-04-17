<?php
session_start();

require_once("../../auto_load.php");

$usuario = new Usuario;

if(isset($_POST['todos'])){
	echo json_encode($usuario->getTodos($_POST['todos']));
}else{
	$consulta = $_POST['consulta'];

	if($consulta != ''){
		echo json_encode($usuario->buscarUsuario($consulta));	
	}else{
		return false;
	}	
}


?>