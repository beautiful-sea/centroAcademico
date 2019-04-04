<?php
session_start();

require_once("../../auto_load.php");
$consulta = $_POST['consulta'];

$usuario = new Usuario;

if($consulta != ''){
	echo json_encode($usuario->buscarUsuario($consulta));	
}else{
	return false;
}

?>