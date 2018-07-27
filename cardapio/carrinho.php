<?php
$showerros = true;
if($showerros) {
  ini_set("display_errors", $showerros);
  error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}
session_start();

session_name(sha1($_SERVER['HTTP_USER_AGENT'].$_SESSION['email']));

if (!$_SESSION['check']) session_destroy();

if(empty($_SESSION)){
  $checkSession = false;
  ?>
  <script>
    window.location = "../";
  </script>
  <?php
} else {
  $checkSession = true;
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

  <style type="text/css">
  .servicos .servHover {
    opacity: 0.7;
    cursor: pointer;
    transition: all 500ms ease-in-out;
    border-radius: 20px;
  }

  .servicos .servHover:hover {
    opacity: 1;
    cursor: pointer;
    background-color: #ecf0f1;
    transform: scale(1.1);
  }


  .nav-drop {
    background-color: #222222 !important;
    text-transform: uppercase;
    font-family: 'PT Sans Narrow', Arial, sans-serif;
    font-weight: 700;
  }

  .nav-drop a {
    color: #fff !important;
    opacity: 0.7;
  }

  .nav-drop a:hover {
    opacity: 1;
    background-color: #111111 !important;
  }

  .estilo td {
    vertical-align: middle !important;
  }
</style>
</head>

<body>

  <!-- INÍCIO BARRA DE NAVEGAÇÃO -->
  <div id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a href="../cliente" class="navbar-brand">ITANGUA</a>
      </div>
      <!-- NAV após logar -->
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../cliente/">Home</a></li>
          <li><a href="../cardapio/cardapio.php">Faça seu pedido</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="menuDrop" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Minha Conta<span class="caret"></span></a>
            <ul class="dropdown-menu nav-drop" id="link-drop" style="">
              <li><a href="#" id="">Cadastro</a></li>
              <li><a href="#" id="">Carrinho de Compras</a></li>
              <li><a href="#" id="">Alterar Senha</a></li>
            </ul>
          </li>
          <li><a href="#">Seja bem-vindo <u><?php echo $_SESSION['nome']; ?></u></a></li>
          <li><a href="#"><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i></a></li>
          <li><a class="btn btn-danger" href="../engine/controllers/logout.php">Sair</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- FIM BARRA DE NAVEGAÇÃO -->

  <div class="row">
    <div id="cardapio" style="padding: 90px 0 80px;">
      <div class="container">
        <h2 class="text-center">Carrinho de Compras</h2>
        <div class="row" style="margin-top: 30px;">
          <table class="table table-hover table-striped estilo">
            <thead>
              <th>Item</th>
              <th>Valor</th>
              <th>Quantidade</th>
              <th>Valor Total</th>
              <th class="text-center">Remover do Carrinho</th>
            </thead>
            <tbody>
              <tr>
                <td width="40%"><img src="../images/5.jpg" style="width: 20%;"><strong style="margin-left: 20px;">Corona Extra</strong></td>
                <td>R$ 4,90/un</td>
                <td>6</td>
                <td>R$ 29,40</td>
                <td class="text-center ExcluirItem"><i class="fa fa-remove"></i></td>
              </tr>
              <tr>
                <td width="40%"><img src="../images/3.jpg" style="width: 20%;"><strong style="margin-left: 20px;">Império</strong></td>
                <td>R$ 4,50/un</td>
                <td>4</td>
                <td>R$ 18,00</td>
                <td class="text-center ExcluirItem"><i class="fa fa-remove"></i></td>
              </tr>
              <tr>
                <td width="40%"><img src="../images/2.png" style="width: 20%;"><strong style="margin-left: 20px;">Burgman</strong></td>
                <td>R$ 3,00/un</td>
                <td>12</td>
                <td>R$ 36,00</td>
                <td class="text-center ExcluirItem"><i class="fa fa-remove"></i></td>
              </tr>
              <tr style="background-color: #222222; color: #cccccc">
                <th colspan="4" scope="row" style="font-size: 16px;">Total:</th>
                <td class="text-center" style="font-size: 16px;">R$ 83,40</td>
              </tr>
            </tbody>
          </table>
        </div>

        <button class="btn btn-success pull-right" id="finaliza_compra">Finalizar Compra</button>
      </div>
    </div>
  </div>

  <div id="footer" class="footer">
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
  <script src="../js/sweetalert.js"></script>
  <script src="../js/login.js"></script>
</body>
</html>

<script type="text/javascript">
  $('#finaliza_compra').click(function(e){
    e.preventDefault();

    swal('Sucesso', 'Compra finalizada! Redirecionando...', 'success', {button: false});
    setTimeout(function(){
      window.location = "../cliente/";
    }, 3000);
  });
</script>