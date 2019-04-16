<?php

require_once('../model/Model.php');

$teste = new Model();

$dados = ['nome'=>'123','senha'=>'321'];

$teste->setDados($dados);

var_dump($teste->getDados());

