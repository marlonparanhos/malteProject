<?php
	class Cliente {
		private $id;
		private $nome;
		private $idade;
		private $genero;
		private $email;
		private $rua;
		private $bairro;
		private $numero;
		private $cpf;
		private $celular;
		private $senha;

		public function SetValues($id, $nome, $idade, $genero, $email, $rua, $bairro, $numero, $cpf, $celular, $senha) {
			$this->id = $id;
			$this->nome = $nome;
			$this->idade = $idade;
			$this->genero = $genero;
			$this->email = $email;
			$this->rua = $rua;
			$this->bairro = $bairro;
			$this->numero = $numero;
			$this->cpf = $cpf;
			$this->celular = $celular;
			$this->senha = $senha;
		}

		public function Create() {
			$sql = "
				INSERT INTO cliente
						  (
				 			id,
				 			nome,
				 			idade,
				 			genero,
				 			email,
				 			rua,
				 			bairro,
				 			numero,
				 			cpf,
				 			celular,
				 			senha,
				 			created_at
						  )
				VALUES
					(
				 			'$this->id',
				 			'$this->nome',
				 			'$this->idade',
				 			'$this->genero',
				 			'$this->email',
				 			'$this->rua',
				 			'$this->bairro',
				 			'$this->numero',
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
				SELECT * FROM cliente WHERE id  = '$id'
			";

			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data[0];
		}

		public function ReadByEmail($email){
			$sql = "
				SELECT * FROM cliente WHERE email = '$email'
			";

			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data[0];
		}

		public function ReadAll() {
			$sql = "
				SELECT * FROM cliente
			";

			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}else{
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

		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT * FROM cliente LIMIT $inicio, $registros;
			";

			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data;
		}

		public function Update() {
			$sql = "
				UPDATE cliente SET

				  nome = '$this->nome',
				  idade = '$this->idade',
				  genero = '$this->genero',
				  email = '$this->email',
				  rua = '$this->rua',
				  bairro = '$this->bairro',
				  numero = '$this->numero',
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

		public function Delete() {
			$sql = "
				DELETE FROM cliente
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
			$this->nome;
			$this->idade;
			$this->genero;
			$this->email;
			$this->rua;
			$this->bairro;
			$this->numero;
			$this->cpf;
			$this->celular;
			$this->senha;
		}

		function __destruct() {
			$this->id;
			$this->nome;
			$this->idade;
			$this->genero;
			$this->email;
			$this->rua;
			$this->bairro;
			$this->numero;
			$this->cpf;
			$this->celular;
			$this->senha;
		}
	};
?>