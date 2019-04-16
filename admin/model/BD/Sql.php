<?php 

class Sql extends Conexao{


	public function setParametros($stmt, $parametros = Array()){

		foreach ($parametros as $chave => $valor) {
			$this->bindParametro($stmt,$chave,$valor);
		}
	}

	public function bindParametro($stmt, $chave, $valor){
		$stmt->bindValue($chave,$valor);
	}

	public function query($queryBruta,$parametros){

		$stmt   = Conexao::getInstancia()->prepare($queryBruta);

		$this->setParametros($stmt,$parametros);

		return $stmt->execute();
	}

	public function select($queryBruta, $parametros = array()){

		$stmt   = Conexao::getInstancia()->prepare($queryBruta);

		$this->setParametros($stmt,$parametros);

		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}