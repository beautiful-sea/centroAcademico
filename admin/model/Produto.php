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
	    return $this->valor = $valor;
	}

	public function getValor_socios()
	{
	    return $this->valor_socios;
	}
	
	public function setValor_socios($valor_socios)
	{
	    return $this->valor_socios = $valor_socios;
	}

	public function getFoto()
	{
	    return $this->foto;
	}
	
	public function setFoto($foto)
	{
	    return $this->foto = $foto;
	}

	public function cadastrar(){

		$sql = "INSERT INTO produtos (nome,descricao,valor,valor_socios,foto) VALUES(
		:nome,:descricao,:valor,:valor_socios,:foto)";

		$stmt = Conexao::getInstancia()->prepare($sql);

		$this->salvarImagem($this->getFoto());
	}

	public function salvarImagem($imagem){


		// verifica se foi enviado um arquivo
		if ( isset( $imagem[ 'foto' ][ 'name' ] ) && $imagem[ 'foto' ][ 'error' ] == 0 ) {
		    echo 'Você enviou o arquivo: <strong>' . $imagem[ 'foto' ][ 'name' ] . '</strong><br />';
		    echo 'Este arquivo é do tipo: <strong > ' . $imagem[ 'foto' ][ 'type' ] . ' </strong ><br />';
		    echo 'Temporáriamente foi salvo em: <strong>' . $imagem[ 'foto' ][ 'tmp_name' ] . '</strong><br />';
		    echo 'Seu tamanho é: <strong>' . $imagem[ 'foto' ][ 'size' ] . '</strong> Bytes<br /><br />';
		 
		    $arquivo_tmp = $imagem[ 'foto' ][ 'tmp_name' ];
		    $nome = $imagem[ 'foto' ][ 'name' ];
		 
		    // Pega a extensão
		    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
		 
		    // Converte a extensão para minúsculo
		    $extensao = strtolower ( $extensao );
		 
		    // Somente imagens, .jpg;.jpeg;.gif;.png
		    // Aqui eu enfileiro as extensões permitidas e separo por ';'
		    // Isso serve apenas para eu poder pesquisar dentro desta String
		    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
		        // Cria um nome único para esta imagem
		        // Evita que duplique as imagens no servidor.
		        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
		        $novoNome = uniqid ( time () ) . '.' . $extensao;
		 
		        // Concatena a pasta com o nome
		        $destino = '../../dist/img/loja/produtos/ ' . $novoNome;
		 
		        // tenta mover o arquivo para o destino
		        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
		            echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
		            echo ' < img src = "' . $destino . '" />';
		        }
		        else
		            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
		    }
		    else
		        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
		}
		else
		    echo 'Você não enviou nenhum arquivo!';

	}
}