<?php
$showerros = true;
if($showerros) {
  ini_set("display_errors", $showerros);
  error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}
session_start();
// Inicia a sessão

session_name(sha1($_SERVER['HTTP_USER_AGENT'].$_SESSION['email']));
// Sempre usará nome de sessão diferente
// Estou concatenando informações sobre o local de onde o acesso está sendo feito + email do user
// e criptografando com sha1

if (!$_SESSION['check']) {
  session_destroy();
}

if(empty($_SESSION) || $_SESSION['tipo_usuario'] == 0){
  $checkSession = false;
  ?>
  <script>
    window.location = "../";
  </script>
  <?php
}
else{
  $checkSession = true;
}
// verifica se a última requisição foi feita há mais de 20 minutos
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1201)) {
  session_unset();     // reseta $_SESSION pelo tempo de execução
  session_destroy();   // destrói a sessão que estava ativa
}
$_SESSION['LAST_ACTIVITY'] = time(); // atualiza o tempo com a última atividade

// require_once "engine/config.php";
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

          <a href="../funcionario/index.php" class="navbar-brand">ITANGUA</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../funcionario/index.php">Home</a></li>
            <li><a href="../gerente/controle.php">Controle</a></li>
            <li><a href="#">Seja bem-vindo <u><?php echo $_SESSION['nome']; ?></u></a></li>
            <li><a href="../cardapio/carrinho.php"><i class="fa fa-bell fa-1x" aria-hidden="true"></i></a></li>
            <li><a class="btn btn-danger exitBtn" href="../engine/controllers/logout.php">Sair</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- FIM BARRA DE NAVEGAÇÃO -->

  <div id="depoimentos" class="depoimentos">
    <div class="container">
      <h2 class="wow fadeInUp">PEDIDOS</h2>

      <div class="row">
        <div class="col-lg-3 col-md-3 wow fadeInLeft">
          <h2 class="wow fadeInUp">PEDIDOS</h2>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft">
          <h2 class="wow fadeInUp">PEDIDOS</h2>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft">
          <h2 class="wow fadeInUp">PEDIDOS</h2>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft">
          <h2 class="wow fadeInUp">PEDIDOS</h2>
        </div>
      </div>

    </div>
  </div>

  <br>
  <br>
  <br>


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

  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">
  
</script>