<?php

class Estoque extends Produto
{

	private $id_produto;
	private $qtd;

	public function cadastrar()
	{

		$sql = new Sql;
		return $sql->query(
			"INSERT INTO estoque (id_produto, qtd) VALUES(
				:id_produto,:qtd)",
			[
				":id_produto"	=>	$this->getId_produto(),
				":qtd"			=>	$this->getQtd(),
			]
		);
	}

	public function listProdutos(){

		$sql = new Sql;
		return $sql->select("SELECT * FROM 'produtos'");
		mDebug($sql);
	}


	public function editar($id)
	{

		$sql = new sql;

		if ($this->getFoto()) { //Verifica se o usuário enviou alguma foto e salva a imagem
			$fotoAntiga = $this->buscarPorID($id);

			if ($this->salvarImagem($this->getFoto())) { //Se nova imagem for salva, apagar a antiga da pasta
				unlink('../../dist/img/loja/produtos/' . $fotoAntiga['foto']);
			}

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
