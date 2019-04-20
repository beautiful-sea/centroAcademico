<?php

class Estoque extends Model
{
	private $id_produto;
	private $qtd;

	public function __construct($dados = Array()){
		$this->setDados($_POST);
	}
	
	public function cadastrar()
	{

		$sql = new Sql;
		return $sql->query(
			"INSERT INTO estoque (id_produto, qtde) VALUES(
				:id_produto,:qtd)",
			[
				":id_produto"	=>	$this->getProduto(),
				":qtd"			=>	$this->getQtd()
			]);
	}

	public function listProdutos(){
		$sql=new Sql;
		return $sql->select("SELECT * FROM produtos ORDER BY nome");
		 
	}


	public function editar($id)
	{
if ($id){
		$sql = new sql;
			return $sql->query(
				"UPDATE produtos SET nome = :nome,descricao = :descricao,valor = :valor,valor_socios = :valor_socios, foto = :foto WHERE id = :id",
				[
					":nome"			=>	$this->getNome(),
					":descricao"	=>	$this->getDescricao(),
					":valor"		=>	$this->getValor(),
					":valor_socios"	=>	$this->getValor_socios(),
					":foto"			=>	$this->getFoto(),
					":id"			=>	$id
				]
			);
		} else {
			return $sql->query(
				"UPDATE produtos SET nome = :nome,descricao = :descricao,valor = :valor,valor_socios = :valor_socios WHERE id = :id",
				[
					":nome"			=>	$this->getNome(),
					":descricao"	=>	$this->getDescricao(),
					":valor"		=>	$this->getValor(),
					":valor_socios"	=>	$this->getValor_socios(),
					":id"			=>	$id
				]
			);
		}
	}


	public function buscarProduto($termo)
	{

		try {
			$termo = "%" . $termo . "%";

			$sql = new Sql;

			return $sql->select("SELECT * FROM produtos where nome LIKE :termo ORDER BY nome", [
				":termo"	=>	$termo
			]);
		} catch (Exception $e) {
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function buscarTodos()
	{

		try {
			$sql = new Sql;
			return $sql->select("SELECT * FROM produtos ORDER BY nome ");
		} catch (Exception $e) {
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function buscarPorID($id)
	{
		try {
			$sql = new Sql;
			return $sql->select("SELECT * FROM produtos where id = :id", [
				":id"	=>	$id
			]);
		} catch (Exception $e) {
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}
	public function deletar($id)
	{

		try {
			$sql = new Sql;

			return $sql->query("DELETE FROM produtos WHERE id = :id", [
				":id"	=>	$id
			]);
		} catch (Exception $e) {
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}
}