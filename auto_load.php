<?php


spl_autoload_register(function($nomeClasse){

	
	$pastas = ["model/$nomeClasse.php","../model/$nomeClasse.php","../../model/$nomeClasse.php"];

	foreach ($pastas as $pasta) {
		if(file_exists($pasta)){
			require_once($pasta);
		}		
	}
});

