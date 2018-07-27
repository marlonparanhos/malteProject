<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Produtos {

		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id;
		private $nome_prod;
		private $desc_prod;
		private $tipo_prod;
		private $valor;
		private $cod_prod;
		private $disponibilidade;


		//setters

		//Funcao que seta uma instancia da classe
		public function SetValues($id, $nome_prod, $desc_prod, $tipo_prod, $valor, $cod_prod, $disponibilidade) {
			$this->id = $id;
			$this->nome_prod = $nome_prod;
			$this->desc_prod = $desc_prod;
			$this->tipo_prod = $tipo_prod;
			$this->valor = $valor;
			$this->cod_prod = $cod_prod;
			$this->disponibilidade = $disponibilidade;

		}


		//Methods

		//Funcao que salva a instancia no BD
		public function Create() {

			$sql = "
				INSERT INTO produtos
						  (
				 			id,
				 			nome_prod,
				 			desc_prod,
				 			tipo_prod,
				 			valor,
				 			cod_prod,
				 			disponibilidade,
				 			created_at
						  )
				VALUES
					(
				 			'$this->id',
				 			'$this->nome_prod',
				 			'$this->desc_prod',
				 			'$this->tipo_prod',
				 			'$this->valor',
				 			'$this->cod_prod',
				 			'$this->disponibilidade',
				 			now()
					);
			";

			$DB = new DB();
			$DB->open();
			$result['result'] = $DB->query($sql);
			$result['lastId'] = $DB->lastId();
			$DB->close();
			return json_encode($result);
		}

		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id) {
			$sql = "
				SELECT
					 *
				FROM
					produtos AS t1
				WHERE
					t1.id  = '$id'

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
					 *
				FROM
					produtos AS t1


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
					 *
				FROM
					produtos AS t1


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
				UPDATE produtos SET

				  nome_prod = '$this->nome_prod',
				  desc_prod = '$this->desc_prod',
				  tipo_prod = '$this->tipo_prod',
				  valor = '$this->valor',
				  cod_prod = '$this->cod_prod',
				  disponibilidade = '$this->disponibilidade',
				  updated_at = now()

				WHERE id = '$this->id';

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
				DELETE FROM produtos
				WHERE id = '$this->id';
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
			$this->id;
			$this->nome_prod;
			$this->desc_prod;
			$this->tipo_prod;
			$this->valor;
			$this->cod_prod;
			$this->disponibilidade;


		}

		//destructor
		function __destruct() {
			$this->id;
			$this->nome_prod;
			$this->desc_prod;
			$this->tipo_prod;
			$this->valor;
			$this->cod_prod;
			$this->disponibilidade;


		}

	};

?>
