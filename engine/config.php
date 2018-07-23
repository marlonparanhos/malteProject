<?php
error_reporting(error_reporting() & ~E_NOTICE);

	//pegando configurações locais (pt-br)
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

function converteData($data, $tipo){
	if ($tipo == "br" || $tipo == "BR") {
		$nova_data = str_replace("-", "/", $data);
		$nova_data = date('d/m/Y', strtotime($nova_data));
	}

	if ($tipo == "us" || $tipo == "US") {
		$nova_data = str_replace("/", "-", $data);
		$nova_data = date('Y-m-d', strtotime($nova_data));
	}
	return $nova_data;
}

require_once "bd/bd.php";
require_once "classes/cliente.php";
require_once "classes/funcionarios.php";
?>