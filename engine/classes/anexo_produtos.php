<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Anexo_produtos {

		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_arquivo;
		private $nome_arquivo;
		private $tamanho_arquivo;
		private $tipo_arquivo;
		private $arquivo;
		private $fk_produto;


		//setters

		//Funcao que seta uma instancia da classe
		public function SetValues($id_arquivo, $nome_arquivo, $tamanho_arquivo, $tipo_arquivo, $arquivo, $fk_produto) {
			$this->id_arquivo = $id_arquivo;
			$this->nome_arquivo = $nome_arquivo;
			$this->tamanho_arquivo = $tamanho_arquivo;
			$this->tipo_arquivo = $tipo_arquivo;
			$this->arquivo = $arquivo;
			$this->fk_produto = $fk_produto;

		}


		//Methods

		//Funcao que salva a instancia no BD
		public function Create() {

			$sql = "
				INSERT INTO anexo_produtos
						  (
				 			id_arquivo,
				 			nome_arquivo,
				 			tamanho_arquivo,
				 			tipo_arquivo,
				 			arquivo,
				 			fk_produto
						  )
				VALUES
					(
				 			'$this->id_arquivo',
				 			'$this->nome_arquivo',
				 			'$this->tamanho_arquivo',
				 			'$this->tipo_arquivo',
				 			'$this->arquivo',
				 			'$this->fk_produto'
					);
			";

			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}

		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id) {
			$sql = "
				SELECT
					 t1.id_arquivo,
					 t1.nome_arquivo,
					 t1.tamanho_arquivo,
					 t1.tipo_arquivo,
					 t1.arquivo,
					 t1.fk_produto
				FROM
					anexo_produtos AS t1
				WHERE
					t1.id_arquivo  = '$id'

			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data[0];
		}

		public function Read_fk($id) {
			$sql = "
				SELECT * FROM anexo_produtos WHERE fk_produto  = '$id'
			";
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data[0];
		}


		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll() {
			$sql = "
				SELECT
					 t1.id_arquivo,
					 t1.nome_arquivo,
					 t1.tamanho_arquivo,
					 t1.tipo_arquivo,
					 t1.arquivo,
					 t1.fk_produto
				FROM
					anexo_produtos AS t1


			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{

				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;
					}
				}
			}
			$DB->close();
			return $realData;
		}




		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_arquivo,
					 t1.nome_arquivo,
					 t1.tamanho_arquivo,
					 t1.tipo_arquivo,
					 t1.arquivo,
					 t1.fk_produto
				FROM
					anexo_produtos AS t1


				LIMIT $inicio, $registros;
			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data;
		}

		//Funcao que atualiza uma instancia no BD
		public function Update() {
			$sql = "
				UPDATE anexo_produtos SET

				  nome_arquivo = '$this->nome_arquivo',
				  tamanho_arquivo = '$this->tamanho_arquivo',
				  tipo_arquivo = '$this->tipo_arquivo',
				  arquivo = '$this->arquivo',
				  fk_produto = '$this->fk_produto'

				WHERE id_arquivo = '$this->id_arquivo';

			";


			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		//Funcao que deleta uma instancia no BD
		public function Delete() {
			$sql = "
				DELETE FROM anexo_produtos
				WHERE id_arquivo = '$this->id_arquivo';
			";
			$DB = new DB();

			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}


		/*
			--------------------------------------------------
			Viewer SPecific methods -- begin
			--------------------------------------------------

		*/


		/*
			--------------------------------------------------
			Viewer SPecific methods -- end
			--------------------------------------------------

		*/


		//constructor

		function __construct() {
			$this->id_arquivo;
			$this->nome_arquivo;
			$this->tamanho_arquivo;
			$this->tipo_arquivo;
			$this->arquivo;
			$this->fk_produto;


		}

		//destructor
		function __destruct() {
			$this->id_arquivo;
			$this->nome_arquivo;
			$this->tamanho_arquivo;
			$this->tipo_arquivo;
			$this->arquivo;
			$this->fk_produto;


		}

	};

?>
