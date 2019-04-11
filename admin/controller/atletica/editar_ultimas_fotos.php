<?php
session_start();
require_once('../../auto_load.php');


$foto = new UltimasFotos;


$foto->setTitulo($_POST['titulo']);
$foto->setDescricao($_POST['descricao']);
$foto->setData_evento($_POST['data']);

if($_FILES['foto']['error'] != 4){
	$foto->setFoto($_FILES['foto']);
}

if($foto->editar($_POST['id'])){
	header("Location: ../../view/conteudo/atletica/ultimas-fotos.php?e=1");
}else{
	header("Location: ../../view/conteudo/atletica/ultimas-fotos.php?e=2");	
}



?>