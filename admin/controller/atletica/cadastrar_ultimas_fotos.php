<?php

session_start();

require_once('../../auto_load.php');

$foto = new UltimasFotos;

$foto->setTitulo($_POST['titulo']);
$foto->setDescricao($_POST['descricao']);
$foto->setData_evento($_POST['data']);
$foto->setFoto($_FILES['foto']);

if($foto->cadastrar() === true){
	header("Location: ../../view/conteudo/atletica/ultimas-fotos.php?r=1");
}else{
	header("Location: ../../view/conteudo/atletica/ultimas-fotos.php?r=2");
}
