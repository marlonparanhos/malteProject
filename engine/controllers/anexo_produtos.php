<?php

	require_once "../config.php";


	//parte1

	$id_arquivo = $_POST['id_arquivo'];
	$nome_arquivo = $_POST['nome_arquivo'];
	$tamanho_arquivo = $_POST['tamanho_arquivo'];
	$tipo_arquivo = $_POST['tipo_arquivo'];
	$arquivo = $_POST['arquivo'];
	$fk_produto = $_POST['fk_produto'];


	//parte2
	$action = $_POST['action'];

	//parte3
	$Item = new Anexo_produtos();
	$Item->SetValues($id_arquivo, $nome_arquivo, $tamanho_arquivo, $tipo_arquivo, $arquivo, $fk_produto);



	//parte4
	switch($action) {
		case 'create':


			$res = $Item->Create();
			if ($res === NULL) {
				$res = "true";
			}
			else {
				$res = "false";
			}

			echo $res;


		break;

		case 'update':



			$res = $Item->Update();

			if ($res === NULL) {
				$res= 'true';
			}
			else {
				$res = 'false';
			}
			echo $res;


		break;

		case 'delete':



			$res = $Item->Delete();
			if ($res === NULL) {
				$res= 'true';
			}
			else {
				$res = 'false';
			}
			echo $res;


		break;



	}
?>
