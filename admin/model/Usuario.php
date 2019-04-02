<?php

require_once('../model/Conexao.php');

class Usuario{

	private $nome;
	private $email;
	private $senha;


	public function getNome(){
		return $this->$nome;
	}
	public function setNome($nome){
		$this->$nome = $nome;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function login(){
		if($this->checarLogin()){
			$_SESSION['usuario'] = $this->checarLogin();
			header('Location: ../index.php');
		}else{
			echo 'n exste';
		}
	}

	public function checarLogin(){//Verifica se Existe o login e senha solicitado

		try{

			$email = $this->getEmail();
			$senha = $this->getSenha();

			$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND admin = 1";

			$stmt = Conexao::getInstancia()->prepare($sql);

			$stmt->bindValue(":email",$email);
			$stmt->bindValue(":senha",$senha);

			$stmt->execute();

			$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

			return $resultado;

		}catch(Exception $e){
			print "Erro ao acessar Banco de Dados<br>";
			print($e->getMessage());
			return false;
		}

	}

	public function getTodos(){

	}

}




