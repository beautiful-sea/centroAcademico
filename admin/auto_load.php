<?php


spl_autoload_register(function($nomeClasse){

	
	$pastas = [
		"model/$nomeClasse.php",
		"model/BD/$nomeClasse.php",
		"../model/$nomeClasse.php",
		"../model/BD/$nomeClasse.php",
		"../admin/model/BD/$nomeClasse.php",
		"../admin/model/atletica/$nomeClasse.php",
		"../admin/model/$nomeClasse.php",
		"../../model/$nomeClasse.php",
		"../../model/atletica/$nomeClasse.php",
		"../../model/BD/$nomeClasse.php",
		"../../../model/$nomeClasse.php",
		"../../../model/atletica/$nomeClasse.php",
		"../../../model/BD/$nomeClasse.php"
	];

	foreach ($pastas as $pasta) {
		if(file_exists($pasta)){
			require_once($pasta);
		}		
	}
});

