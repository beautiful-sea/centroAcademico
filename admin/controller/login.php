<?php
session_start();
require_once("../auto_load.php");

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$usuario = new Usuario;

$usuario->setEmail($email);
$usuario->setSenha($senha);

$usuario->login();