<?php

require_once "../config.php";


	//parte1

$id = $_POST['id'];
$nome_prod = $_POST['nome_prod'];
$desc_prod = $_POST['desc_prod'];
$tipo_prod = $_POST['tipo_prod'];
$valor = $_POST['valor'];
$cod_prod = $_POST['cod_prod'];
$disponibilidade = $_POST['disponibilidade'];


	//parte2
$action = $_POST['action'];

	//parte3
$Item = new Produtos();
$Item->SetValues($id, $nome_prod, $desc_prod, $tipo_prod, $valor, $cod_prod, $disponibilidade);



	//parte4
switch($action) {
	case 'create':
	$res = $Item->Create();
	$res = json_decode($res);

	if($res->{'result'} === NULL){
		$result['res'] = "true";
	}else{
		$result['res'] = "false";
	}

	$result['id_produto'] = $res->{'lastId'};

	echo json_encode($result);
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
	} else {
		$res = 'false';
	}
	echo $res;
	break;

	case 'consultaValor':
	$Prods = new Produtos();
	$Prods = $Item->ReadAll();

	foreach ($Prods as $p) {
		if ($p['cod_prod'] == $cod_prod && $p['tipo_prod'] == $tipo_prod) {
			$valor = $p['valor'];
			$res = 'true';
		} else {
			$res = 'false';
		}
	}

	$result['res'] = $res;
	$result['valor'] = $valor;
	echo json_encode($result);
	break;

	case 'valorTotal':
	$valorBrejaUnit = str_replace('R$ ', '', $_POST['valorBrejaUnit']);
	$valorBrejaUnit = str_replace(',', '.', $valorBrejaUnit);
	$valorTotal = $_POST['quatidade'] * $valorBrejaUnit;

	echo $valorTotal;
	break;
}
?>
