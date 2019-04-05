<?php

class Produto{

	private $nome;
	private $descricao;
	private $valor;
	private $valor_socios;
	private $foto;


	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}
	
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}

	public function getValor()
	{
		return $this->valor;
	}
	
	public function setValor($valor)
	{
		$this->valor = $valor;
	}

	public function getValor_socios()
	{
		return $this->valor_socios;
	}
	
	public function setValor_socios($valor_socios)
	{
		$this->valor_socios = $valor_socios;
	}

	public function getFoto()
	{
		return $this->foto;
	}
	
	public function setFoto($foto)
	{
		$this->foto = $foto;
	}

	public function cadastrar(){

		$sql = "INSERT INTO produtos (nome,descricao,valor,valor_socios,foto) VALUES(
		:nome,:descricao,:valor,:valor_socios,:foto)";

		$stmt = Conexao::getInstancia()->prepare($sql);

		$foto = $this->salvarImagem($this->getFoto());

		if($foto === true){
			$stmt->bindValue(":nome",$this->getNome());
			$stmt->bindValue(":descricao",$this->getDescricao());
			$stmt->bindValue(":valor",$this->getValor());
			$stmt->bindValue(":valor_socios",$this->getValor_socios());
			$stmt->bindValue(":foto",$this->getFoto());

			return $stmt->execute();	
		}else{
			return $foto;
		}
	}

	public function editar($id){

		if($this->getFoto()){//Verifica se o usuário enviou alguma foto e salva a imagem
			$fotoAntiga = $this->buscarPorID($id);
			if($this->salvarImagem($this->getFoto())){
				unlink('../../dist/img/loja/produtos/' .$fotoAntiga['foto']);
			}
			$foto = $this->getFoto();
			$sql = "UPDATE produtos SET nome = :nome,descricao = :descricao,valor = :valor,valor_socios = :valor_socios, foto = :foto WHERE id = :id";
			$stmt = Conexao::getInstancia()->prepare($sql);
			$stmt->bindValue(":foto",$foto);
		}else{
			$sql = "UPDATE produtos SET nome = :nome,descricao = :descricao,valor = :valor,valor_socios = :valor_socios WHERE id = :id";
			$stmt = Conexao::getInstancia()->prepare($sql);
		}

		$stmt->bindValue(":nome",$this->getNome());
		$stmt->bindValue(":descricao",$this->getDescricao());
		$stmt->bindValue(":valor",$this->getValor());
		$stmt->bindValue(":valor_socios",$this->getValor_socios());
		$stmt->bindValue(":id",$id);

		return $stmt->execute();	
	}

	public function salvarImagem($imagem){

		// verifica se foi enviado um arquivo
		if ( isset( $imagem[ 'name' ] ) && $imagem[ 'error' ] == 0 ) {


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
			$sql = "SELECT * FROM produtos where nome LIKE :termo ORDER BY nome ";

			$stmt = Conexao::getInstancia()->prepare($sql);

			$stmt->bindValue(":termo",$termo);

			$stmt->execute();

			$consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $consulta;

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function buscarTodos(){

		try{

			$sql = "SELECT * FROM produtos ORDER BY nome ";

			$stmt = Conexao::getInstancia()->prepare($sql);

			$stmt->execute();

			$consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $consulta;

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function buscarPorID($id){
		try{

			$sql = "SELECT * FROM produtos where id = :id";

			$stmt = Conexao::getInstancia()->prepare($sql);

			$stmt->bindValue(":id",$id);

			$stmt->execute();

			$consulta = $stmt->fetch(PDO::FETCH_ASSOC);

			return $consulta;

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}
	public function deletar($id){

		try{

			$sql = "DELETE FROM produtos WHERE id = :id";

			$stmt = Conexao::getInstancia()->prepare($sql);

			$stmt->bindValue(':id',$id);

			return $stmt->execute();

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}
}
