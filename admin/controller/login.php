<?php
session_start();
require_once("../model/Usuario.php");

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$usuario = new Usuario;

$usuario->setEmail($email);
$usuario->setSenha($senha);

$usuario->login();