<?php


class Usuario extends Model{

	private $nome;
	private $email;
	private $senha;
	private $admin;


	public function __construct($dados = Array()){
		$this->setDados($dados);
	}

	public function login(){
		if($this->checarLogin()){
			$_SESSION['usuario'] = $this->checarLogin();
			header('Location: ../index.php');
		}else{
			header('Location: ../login.php?login=false');
		}
	}

	public function checarLogin(){//Verifica se Existe o login e senha solicitado, retornando os dados do usuario

		try{

			$sql = new Sql;

			return $sql->select(
				"SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND admin = 1",[
				":email"	=>	$this->getEmail(),
				":senha"	=>	$this->getSenha()]);

		}catch(Exception $e){
			print "Erro ao acessar Banco de Dados<br>";
			print($e->getMessage());
			return false;
		}

	}

	public function getTodos(){//Retorna todos usuarios
		try{
			$sql = new Sql;
			return $sql->select("SELECT * FROM usuarios");

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function cadastrar(){

		try{

			$sql = new Sql;
			return $sql->query(
				"INSERT INTO usuarios (nome, email, senha) VALUES(:nome,:email,:senha)",
				[':nome'	=>	$this->getNome(),
				':email'	=>	$this->getEmail(),
				':senha'	=>	$this->getSenha()]);

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function editar(){

		try{
			$sql = new Sql;
			return $sql->query(
				"UPDATE usuarios SET nome = :nome,email = :email, admin = :admin WHERE id = :id",[
					':nome'		=>	$this->getNome(),
					':email'	=>	$this->getEmail(),
					':admin'	=>	$this->getAdmin(),
					':id'		=>	$this->getId()]);

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function deletar(){

		try{

			$sql = new Sql;

			return $sql->query(
				"DELETE FROM usuarios WHERE id = :id",[
					":id"	=>	$this->getId()]);

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function checarEmail(){//Verifica se email ja está cadastrado

		try{
			$sql = new Sql;

			$resultado =  $sql->select("SELECT email FROM usuarios where email = :email",[
				":email"	=>	$this->getEmail()]);

			if(count($resultado) > 0){
				return false;
			}else{
				return true;
			}
		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function buscarUsuario($termo){

		try{
			$termo = "%".$termo."%";

			$sql = new Sql;

			return $sql->select(
				"SELECT * FROM usuarios where (email LIKE :termo OR nome LIKE :termo) ORDER BY nome ",[
				":termo"	=>	$termo]);

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}

	}

	public function buscarPorID(){
		try{

			$sql = new Sql;

			return $sql->select("SELECT * FROM usuarios where id = :id",[
				":id"	=>	$this->getId()]);

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}
}




