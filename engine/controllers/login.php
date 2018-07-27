<?php session_start();

	require_once "../config.php";

	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$res;

	$Funcionario = new Funcionarios();
	$Funcionario = $Funcionario->ReadByEmail($email);

	$Cliente = new Cliente();
	$Cliente = $Cliente->ReadByEmail($email);

	if ($Cliente === NULL && $Funcionario === NULL) {
		$res = 'no_user_found';
		session_destroy();
	} else {
		$verificaEmail = strcmp($email,$Cliente['email']);
		$verificaEmail1 = strcmp($email,$Funcionario['email']);
		if ($verificaEmail === 0 || $verificaEmail1 === 0) {
			$verificaSenha = password_verify($senha,$Cliente['senha']);
			$verificaSenha1 = password_verify($senha,$Funcionario['senha']);
			if ($verificaSenha) {
				$_SESSION['id_usuario'] = $Cliente['id_usuario'];
				$_SESSION['nome'] = $Cliente['nome'];
				$_SESSION['email'] = $Cliente['email'];
				$_SESSION['tipo_usuario'] = 0; // CLIENTE
				$_SESSION['check'] = 1;
				$result['tipo_usuario'] = 0;
				$res = 'true';
			} else if($verificaSenha1){
				$_SESSION['id_usuario'] = $Funcionario['id_usuario'];
				$_SESSION['nome'] = $Funcionario['nome'];
				$_SESSION['email'] = $Funcionario['email'];
				$_SESSION['tipo_usuario'] = $Funcionario['tipo_funcionario'];
				$_SESSION['check'] = 1;
				$result['tipo_usuario'] = $Funcionario['tipo_funcionario'];
				$res = 'true';
			} else {
				$res = 'wrong_password';
				session_destroy();
			}
		} else {
			$res = 'wrong_user_found';
			session_destroy();
		}
	}
	$result['res'] = $res;
	echo json_encode($result);
?>