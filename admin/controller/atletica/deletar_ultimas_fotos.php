<?php

session_start();

require_once('../../auto_load.php');

$foto = new UltimasFotos;

if($foto->deletar($_POST['id']) === true){
	header("Location: ../../view/conteudo/atletica/ultimas-fotos.php?d=1");
}else{
	header("Location: ../../view/conteudo/atletica/ultimas-fotos.php?d=2");
}
