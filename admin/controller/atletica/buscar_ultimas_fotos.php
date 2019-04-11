<?php

session_start();

require_once('../../auto_load.php');

$foto = new UltimasFotos;

if(isset($_POST['buscarPorID'])){
	echo json_encode($foto->buscarPorId($_POST['buscarPorID']));
}