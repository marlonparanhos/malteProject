<?php
	require_once "../config.php";

	$id = $_POST['id'];
	$tipo_funcionario = $_POST['tipo_funcionario'];
	$nome = $_POST['nome'];
	$idade = $_POST['idade'];
	$genero = $_POST['genero'];
	$email = $_POST['email'];
	$cpf = $_POST['cpf'];
	$celular = $_POST['celular'];
	$senha = $_POST['senha'];

	$action = $_POST['action'];

	$Item = new Funcionarios();
	$Item->SetValues($id, $tipo_funcionario, $nome, $idade, $genero, $email, $cpf, $celular, password_hash($senha, PASSWORD_DEFAULT));

	switch($action) {
		case 'create':
			$res = $Item->Create();
			if ($res === NULL) {
				$res = "true";
			} else {
				$res = "false";
			}
			echo $res;
		break;

		case 'update':
			$res = $Item->Update();

			if ($res === NULL) {
				$res= 'true';
			} else {
				$res = 'false';
			}
			echo $res;
		break;

		case 'delete':
			$res = $Item->Delete();
			if ($res === NULL) {
				$res= 'true';
			} else {
				$res = 'false';
			}
			echo $res;
		break;
	}
?>