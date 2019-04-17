<?php

class Produto extends Model{

	private $nome;
	private $descricao;
	private $valor;
	private $valor_socios;
	private $foto;


	public function __construct($dados = Array()){
		$this->setDados($_POST);
	}

	public function cadastrar(){

		$sql = new Sql;

		$foto = $this->salvarImagem($this->getFoto());

		if($foto === true){
			return $sql->query(
				"INSERT INTO produtos (nome,descricao,valor,valor_socios,foto) VALUES(
				:nome,:descricao,:valor,:valor_socios,:foto)",[
					":nome"			=>	$this->getNome(),
					":descricao"	=>	$this->getDescricao(),
					":valor"		=>	$this->getValor(),
					":valor_socios"	=>	$this->getValor_socios(),
					":foto"			=>	$this->getFoto()
				]);
		}else{
			return $foto;
		}
	}

	public function editar($id){

		$sql = new sql;

		if($this->getFoto()){//Verifica se o usuário enviou alguma foto e salva a imagem
			$fotoAntiga = $this->buscarPorID($id);

			if($this->salvarImagem($this->getFoto())){//Se nova imagem for salva, apagar a antiga da pasta
				unlink('../../dist/img/loja/produtos/' .$fotoAntiga['foto']);
			}

			return $sql->query(
				"UPDATE produtos SET nome = :nome,descricao = :descricao,valor = :valor,valor_socios = :valor_socios, foto = :foto WHERE id = :id",[
					":nome"			=>	$this->getNome(),
					":descricao"	=>	$this->getDescricao(),
					":valor"		=>	$this->getValor(),
					":valor_socios"	=>	$this->getValor_socios(),
					":foto"			=>	$this->getFoto(),
					":id"			=>	$id]);
		}else{
			return $sql->query(
				"UPDATE produtos SET nome = :nome,descricao = :descricao,valor = :valor,valor_socios = :valor_socios WHERE id = :id",[
					":nome"			=>	$this->getNome(),
					":descricao"	=>	$this->getDescricao(),
					":valor"		=>	$this->getValor(),
					":valor_socios"	=>	$this->getValor_socios(),
					":id"			=>	$id]);
		}
	}

	public function salvarImagem($imagem){

		// verifica se foi enviado um arquivo
		if ( isset( $imagem[ 'name' ] ) && $imagem[ 'error' ] == 0 ) {
			echo "string";

			$arquivo_tmp = $imagem[ 'tmp_name' ];
			$nome = $imagem[ 'name' ];

		    // Pega a extensão
			$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

		    // Converte a extensão para minúsculo
			$extensao = strtolower ( $extensao );

		    // Somente imagens, .jpg;.jpeg;.gif;.png
		    // Aqui eu enfileiro as extensões permitidas e separo por ';'
		    // Isso serve apenas para eu poder pesquisar dentro desta String
			if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) && $imagem['size'] <= 5000000) {
		        // Cria um nome único para esta imagem
		        // Evita que duplique as imagens no servidor.
		        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
				$novoNome = uniqid ( time () ) . '.' . $extensao;

		        // Concatena a pasta com o nome
				$destino = '../../dist/img/loja/produtos/' . $novoNome;

		        // tenta mover o arquivo para o destino
				if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
					echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
					echo ' < img src = "' . $destino . '" />';
					$this->setFoto($novoNome);
					return true;
				}
				else
					return 2;
				//Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.
			}
			else
				return 3;
			//Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png", com tamanho maximo de 5Mb
		}
		else
			return 4;
		//'Você não enviou nenhum arquivo!'
	}

	public function buscarProduto($termo){

		try{
			$termo = "%".$termo."%";

			$sql = new Sql;

			return $sql->select("SELECT * FROM produtos where nome LIKE :termo ORDER BY nome",[
				":termo"	=>	$termo]);

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function buscarTodos(){

		try{
			$sql = new Sql;
			return $sql->select("SELECT * FROM produtos ORDER BY nome ");
		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function buscarPorID($id){
		try{
			$sql = new Sql;

			$resultado = $sql->select("SELECT * FROM produtos where id = :id",[
				":id"	=>	$id]);
			return $resultado[0];

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}
	public function deletar($id){

		try{
			$sql = new Sql;

			return $sql->query("DELETE FROM produtos WHERE id = :id",[
				":id"	=>	$id]);

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}
}
