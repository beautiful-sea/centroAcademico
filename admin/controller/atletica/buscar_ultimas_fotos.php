<?php

session_start();

require_once('../../auto_load.php');

$foto = new UltimasFotos;

if(isset($_POST['buscarPorID'])){
	echo json_encode($foto->buscarPorId($_POST['buscarPorID']));
}elseif(isset($_POST['buscarTodas']) == 1){
	echo json_encode($foto->buscarTodas($_POST['buscarTodas']));
}