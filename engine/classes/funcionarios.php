<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Funcionarios {

		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id;
		private $tipo_funcionario;
		private $nome;
		private $idade;
		private $genero;
		private $email;
		private $cpf;
		private $celular;
		private $senha;


		//setters

		//Funcao que seta uma instancia da classe
		public function SetValues($id, $tipo_funcionario, $nome, $idade, $genero, $email, $cpf, $celular, $senha) {
			$this->id = $id;
			$this->tipo_funcionario = $tipo_funcionario;
			$this->nome = $nome;
			$this->idade = $idade;
			$this->genero = $genero;
			$this->email = $email;
			$this->cpf = $cpf;
			$this->celular = $celular;
			$this->senha = $senha;

		}


		//Methods

		//Funcao que salva a instancia no BD
		public function Create() {

			$sql = "
				INSERT INTO funcionarios
						  (
				 			id,
				 			tipo_funcionario,
				 			nome,
				 			idade,
				 			genero,
				 			email,
				 			cpf,
				 			celular,
				 			senha,
				 			created_at
						  )
				VALUES
					(
				 			'$this->id',
				 			'$this->tipo_funcionario',
				 			'$this->nome',
				 			'$this->idade',
				 			'$this->genero',
				 			'$this->email',
				 			'$this->cpf',
				 			'$this->celular',
				 			'$this->senha',
				 			now()
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
					 t1.id,
					 t1.tipo_funcionario,
					 t1.nome,
					 t1.idade,
					 t1.genero,
					 t1.email,
					 t1.cpf,
					 t1.celular,
					 t1.senha
				FROM
					funcionarios AS t1
				WHERE
					t1.id  = '$id'

			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data[0];
		}

		public function ReadByEmail($email){
			$sql = "
				SELECT * FROM funcionarios WHERE email = '$email'
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
					 t1.id,
					 t1.tipo_funcionario,
					 t1.nome,
					 t1.idade,
					 t1.genero,
					 t1.email,
					 t1.cpf,
					 t1.celular,
					 t1.senha
				FROM
					funcionarios AS t1


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
					 t1.id,
					 t1.tipo_funcionario,
					 t1.nome,
					 t1.idade,
					 t1.genero,
					 t1.email,
					 t1.cpf,
					 t1.celular,
					 t1.senha
				FROM
					funcionarios AS t1


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
				UPDATE funcionarios SET

				  tipo_funcionario = '$this->tipo_funcionario',
				  nome = '$this->nome',
				  idade = '$this->idade',
				  genero = '$this->genero',
				  email = '$this->email',
				  cpf = '$this->cpf',
				  celular = '$this->celular',
				  senha = '$this->senha',
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
				DELETE FROM funcionarios
				WHERE id = '$this->id';
			";
			$DB = new DB();

			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		function __construct() {
			$this->id;
			$this->tipo_funcionario;
			$this->nome;
			$this->idade;
			$this->genero;
			$this->email;
			$this->cpf;
			$this->celular;
			$this->senha;
		}

		function __destruct() {
			$this->id;
			$this->tipo_funcionario;
			$this->nome;
			$this->idade;
			$this->genero;
			$this->email;
			$this->cpf;
			$this->celular;
			$this->senha;
		}
	};
?>