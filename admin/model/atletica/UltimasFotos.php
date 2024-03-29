<?php

class UltimasFotos extends Model{

	private $titulo;
	private $descricao;
	private $foto;
	private $data_evento;

	public function __construct($dados = Array()){

		$this->setDados($dados);
	}
	public function cadastrar(){
		$sql = new Sql;

		$stmt = Conexao::getInstancia()->prepare($sql);

		$foto = $this->salvarImagem($this->getFoto());

		
		if($foto === true){
			return $sql->query("INSERT INTO fotos_atletica (titulo,descricao,foto,data_evento) VALUES(
		:titulo,:descricao,:foto,:data_evento)",[
			":titulo"		=>	$this->getTitulo(),
			":descricao"	=>	$this->getDescricao(),
			":data_evento"	=>	$this->getData_evento(),
			":foto"			=>	$this->getFoto()]);
		}else{
			return $foto;
		}
	}

	public function editar($id){

		$sql = new Sql;

		var_dump($this->getData_evento());
		if($this->getFoto()){//Verifica se o usuário enviou alguma foto e salva a imagem
			$fotoAntiga = $this->buscarPorID($id);
			if($this->salvarImagem($this->getFoto())){
				unlink('../../dist/img/atletica/ultimas_fotos/' .$fotoAntiga['foto']);
			}
			return $sql->query("UPDATE fotos_atletica SET titulo = :titulo,descricao = :descricao,data_evento = :data_evento, foto = :foto WHERE id = :id",[
				":titulo"		=>	$this->getTitulo(),
				":descricao"	=>	$this->getDescricao(),
				":data_evento"	=>	$this->getData_evento(),
				":foto"			=>	$this->getFoto(),
				":id"			-> 	$id]);
		}else{

			return $sql->query("UPDATE fotos_atletica SET titulo = :titulo,descricao = :descricao,data_evento = :data_evento WHERE id = :id",[
				":titulo"		=>	$this->getTitulo(),
				":descricao"	=>	$this->getDescricao(),
				":data_evento"	=>	$this->getData_evento(),
				":id"			=> 	$id]);
		}	
	}

	public function alterar($antiga,$nova){
		try{

			$sql = new Sql;

			$sql->query("UPDATE fotos_atletica SET titulo = :titulo,descricao = :descricao,data_evento = :data_evento, foto = :foto WHERE id = :id",[
				":titulo"		=>	$antiga['titulo'],
				":descricao"	=>	$antiga['descricao'],
				":data_evento"	=>	$antiga['data_evento'],
				":foto"			=>	$antiga['foto'],
				":id"			=>	$nova['id']]);

			///////////////////////////////////////////
			$sql = new Sql;
			return $sql->query("UPDATE fotos_atletica SET titulo = :titulo,descricao = :descricao,data_evento = :data_evento, foto = :foto WHERE id = :id",[
				":titulo"		=>	$nova['titulo'],
				":descricao"	=>	$nova['descricao'],
				":data_evento"	=>	$nova['data_evento'],
				":foto"			=>	$nova['foto'],
				":id"			=>	$antiga['id']]);

		}catch(Exception $e){
			echo "Erro ao acessar Banco de dados<br>";
			return $e->getMessage();
		}
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
				$destino = '../../dist/img/atletica/ultimas_fotos/' . $novoNome;

				chmod('../../dist/img/atletica/ultimas_fotos/',0777);
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

	public function buscarTodas($opcoes = 'ORDER BY dt_cadastro DESC LIMIT 1,6'){

		try{

			$sql = new Sql;

			return $sql->select("SELECT * FROM fotos_atletica $opcoes");

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}

	public function buscarPorID($id){
		try{

			$sql = new Sql;

			$consulta = $sql->select("SELECT * FROM fotos_atletica where id = :id",[
				":id"	=>	$id]);

			return $consulta[0];

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}
	public function deletar($id){

		try{
			$sql = new Sql;

			$consulta = $sql->query("DELETE FROM fotos_atletica WHERE id = :id",[
				":id"	=>	$id]);
			return $consulta[0];

		}catch(Exception $e){
			print("Erro ao acessar Banco de Dados<br>");
			print($e->getMessage());
		}
	}
}
