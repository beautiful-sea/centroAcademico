<?php
session_start();
require_once('../../auto_load.php');


$f = new UltimasFotos;

$imagem_nova = $f->buscarPorID($_POST['imagem_nova']);
$imagem_antiga = $f->buscarPorID($_POST['imagem_antiga']);


if($f->alterar($imagem_antiga,$imagem_nova)){
	header("Location: ../../view/conteudo/atletica/ultimas-fotos.php?e=1");
}else{
	header("Location: ../../view/conteudo/atletica/ultimas-fotos.php?e=2");	
}



?>