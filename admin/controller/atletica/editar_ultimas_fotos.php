<?php
session_start();
require_once('../../auto_load.php');

$foto = new UltimasFotos($_POST);

if($_FILES['foto']['error'] != 4){
	$foto->setFoto($_FILES['foto']);
}


if($foto->editar($_POST['id'])){
	header("Location: ../../view/conteudo/atletica/ultimas-fotos.php?e=1");
}else{
	header("Location: ../../view/conteudo/atletica/ultimas-fotos.php?e=2");	
}



?>