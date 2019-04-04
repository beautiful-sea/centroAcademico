<?php

session_start();

require_once('../../auto_load.php');

$produto = new Produto;

$produto->setNome($_POST['nome']);
$produto->setDescricao($_POST['descricao']);
$produto->setValor($_POST['valor']);
$produto->setValor_socios($_POST['valor_socios']);
$produto->setFoto($_FILES);

$produto->cadastrar();

/*
$usuario = new Usuario;

$usuario->setNome($nome);
$usuario->setEmail($email);

if($senha == md5($_POST['senha2'])){
	$usuario->setSenha($senha);
}else{
	header("Location: ../../view/usuarios/gerenciar.php?r=2");
}

if(!$usuario->checarEmail()){
	header("Location: ../../view/usuarios/gerenciar.php?r=3");
}elseif($usuario->cadastrar()){
	header("Location: ../../view/usuarios/gerenciar.php?r=1");
}

*/
