<?php
$showerros = true;
if($showerros) {
  ini_set("display_errors", $showerros);
  error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}
session_start();

session_name(sha1($_SERVER['HTTP_USER_AGENT'].$_SESSION['email']));

if (!$_SESSION['check']) {
  session_destroy();
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1201)) {
  session_unset();
  session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="../image/x-icon" href="../images/favicon.ico"/>

  <title>Itangua</title>
</head>

<body>

  <!-- INÍCIO BARRA DE NAVEGAÇÃO -->
  <div class="container row justify-content-sm-center">
    <br>
    <br>
    <br>
    <div id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="../" class="navbar-brand">ITANGUA</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a class="nav_roll" href="../">Home</a></li>
            <li>
              <form class="form-inline" style="margin-top: 10px;">
                <div class="form-group mx-sm-3">
                  <label for="email_login" class="sr-only">E-mail</label>
                  <input type="text" class="form-control" id="email_login" placeholder="e-mail">
                </div>
                <div class="form-group mx-sm-3">
                  <label for="senha_login" class="sr-only">Senha</label>
                  <input type="password" class="form-control" id="senha_login" placeholder="Senha">
                </div>
                <button type="button" class="btn btn-primary" id="logar">Login</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- FIM BARRA DE NAVEGAÇÃO -->

  <!-- iNÍCIO DO FORMULÁRIO -->
  <div class="row text-center">
    <div class="container">
      <h2>CADASTRE-SE</h2>

      <div class="form-row">
        <div class="form-group col-sm-6" style="margin-top: 25px;">
          <div class="thumbnail">
           <img alt="150x100" width="150" height="100" src="../images/avatar01.png" alt="Imagem como Thumbnail">
           <div class="caption">
             <p>Legenda da Foto</p>
           </div>
         </div>
         <form>
          <div class="form-group center-align">
            <label for="exampleFormControlFile1">Selecione sua foto</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>
        </form>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-sm-4">
        <label for="inputNome">Nome Completo</label>
        <input type="text" class="form-control" id="inputNome" placeholder="Nome">
      </div>
      <div class="form-group col-sm-2">
        <label for="inputIdade">Sua idade</label>
        <input type="number" min="0" id="inputIdade" class="form-control">
      </div>
      <div class="form-group col-sm-2">
        <label for="inputIdade">Gênero</label>
        <select class="form-control" id="inputGenero">
          <option disabled selected value="">Selecione...</option>
          <option value="0">Masculino</option>
          <option value="1">Feminino</option>
        </select>
      </div>
      <div class="form-group col-sm-4">
        <label for="inputEmail">E-mail</label>
        <input type="text" class="form-control" id="inputEmail" placeholder="usuario@exemplo.com">
      </div>
    </div>

    <div class="form-row">

      <div class="form-group col-sm-6">
        <label for="inputRua">Rua</label>
        <input type="text" class="form-control" id="inputRua" placeholder="Rua">
      </div>
      <div class="form-group col-sm-4">
        <label for="inputBairro">Bairro</label>
        <input type="text" class="form-control" id="inputBairro" placeholder="Bairro">
      </div>
      <div class="form-group col-sm-2">
        <label for="inputNumero">Número</label>
        <input type="text" id="inputNumero" class="form-control">
      </div>

    </div>

    <div class="form-row">

      <div class="form-group col-sm-3">
        <label for="inputCPF">Seu CPF</label>
        <input type="text" class="form-control" id="inputCPF" placeholder="999.999.999-99">
      </div>

      <div class="form-group col-sm-3">
        <label for="inputTelefone">Celular ou telefone</label>
        <input type="text" id="inputTelefone" placeholder="99999-9999" class="form-control">
      </div>

    </div>

    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="inputSenha">Senha</label>
        <input type="password" class="form-control" id="inputSenha">
      </div>

      <div class="form-group col-sm-6">
        <label for="inputConfirmar_Senha">Confirmar Senha</label>
        <input type="password" class="form-control" id="inputConfirmar_Senha">
      </div>
    </div>

    <div class="form-row">
      <div class="col-sm-12">
        <button type="button" id="confirmar" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIM DO FORMULÁRIO -->

<div id="footer" class="footer" style="margin-top: 20px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <h4>Fale Conosco</h4>
            <p><i class="fa fa-home" aria-hidden="true"></i> Rua da Breja, 123</p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> itangua@gmail.com</p>
            <p><i class="fa fa-phone" aria-hidden="true"></i> (38) 9 9999-9999</p>
          </div>
          <div class="col-lg-4 col-md-4">
            <h4>+ Informações</h4>
            <p><i class="fa fa-square-o" aria-hidden="true"></i> Sobre nós</p>
            <p><i class="fa fa-square-o" aria-hidden="true"></i> Privacidade</p>
            <p><i class="fa fa-square-o" aria-hidden="true"></i> Direitos</p>
            <p><i class="fa fa-square-o" aria-hidden="true"></i> Créditos</p>
          </div>
          <div class="col-lg-4 col-md-4">
            <h4>Fique conectado</h4>
            <a href="http://facebook.com"><i class="social fa fa-facebook" aria-hidden="true"></i></a>
            <a href="http://twitter.com"><i class="social fa fa-twitter" aria-hidden="true"></i></a>
            <a href="http://pinterest.com"><i class="social fa fa-pinterest" aria-hidden="true"></i></a>
            <a href="http://youtube.com"><i class="social fa fa-youtube" aria-hidden="true"></i></a>
            <a href="http://instagram.com/tourpelomundo"><i class="social fa fa-instagram" aria-hidden="true"></i></a><br>
            <input type="email" name="" placeholder="Receba nossas atualizações"><button class="btn btn-success">Assinar</button>
          </div>
        </div>
      </div>
    </div>

<script src="../js/jquery-1.11.3.min.js" ></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/login.js"></script>
<script src="../js/vanilla-masker.js" ></script>
<script src="../js/sweetalert.js" ></script>
</body>
</html>

<script type="text/javascript">
  VMasker(document.querySelector("#inputCPF")).maskPattern("999.999.999-99");
  VMasker(document.querySelector("#inputTelefone")).maskPattern("(99) 9-9999-9999");

  $("#confirmar").click(function(e){
    e.preventDefault();

    var inputNome = $("#inputNome").val(),
    inputIdade = $("#inputIdade").val(),
    inputGenero = $("#inputGenero").val(),
    inputEmail = $("#inputEmail").val(),
    inputRua = $("#inputRua").val(),
    inputBairro = $("#inputBairro").val(),
    inputNumero = $("#inputNumero").val(),
    inputCPF = $("#inputCPF").val(),
    inputTelefone = $("#inputTelefone").val(),
    inputSenha = $("#inputSenha").val(),
    inputConfirmar_Senha = $("#inputConfirmar_Senha").val();

    if (inputNome == "" || inputIdade == "" || inputGenero == "" || inputEmail == "" || inputRua == "" || inputBairro == "" || inputNumero == "" || inputCPF == "" || inputTelefone == "" || inputSenha == "" || inputConfirmar_Senha == ""){
      return swal("Atenção", "Todos os campos devem ser preenchidos!", "info");
    }
    if (inputSenha != inputConfirmar_Senha) {
      return swal("Atenção", "As senhas não conferem!", "error");
    }

    $.post('../engine/controllers/cliente.php',
    {
      nome : inputNome,
      idade : inputIdade,
      genero : inputGenero,
      email : inputEmail,
      rua : inputRua,
      bairro : inputBairro,
      numero : inputNumero,
      cpf : inputCPF,
      celular : inputTelefone,
      senha : inputSenha,

      action : 'create'
    },
    function(data, status){
      if (data) {
        swal("Sucesso", "Cadastro realizado!", "success", {button : false});
        setTimeout(function(){
          window.location = "../index.php";
        }, 3000);
      }
    });
  });
</script>