<?php

class Model{

	private $atributos = [];


	public function __call($nome,$args){

		$metodo = substr($nome,0,3);
		$nomeCampo = substr($nome, 3,strlen($nome));


		switch ($metodo) {
			case 'get':
					return (isset($this->atributos[$nomeCampo])?$this->atributos[$nomeCampo]:NULL);
				break;
			case 'set':
					$this->atributos[$nomeCampo] = $args[0];
				break;
		}
	}

	public function setDados($dados = Array()){
		foreach ($dados as $chave => $valor) {
			$this->{'set'.ucfirst($chave)}($valor);
		}
	}

	public function getDados(){
		return $this->atributos;
	}

}