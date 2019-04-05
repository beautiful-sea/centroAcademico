<?php
session_start();

require_once("../../auto_load.php");

$usuario = new Usuario;

if(isset($_POST['todos']) && $_POST['todos'] == 1){
	echo json_encode($usuario->getTodos());
}else{
	$consulta = $_POST['consulta'];

	if($consulta != ''){
		echo json_encode($usuario->buscarUsuario($consulta));	
	}else{
		return false;
	}	
}


?>