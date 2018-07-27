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
  <link rel="stylesheet" href="../animate.css-master/animate.min.css">
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

        <a href="#" class="navbar-brand">ITANGUA</a>
      </div>
      <!-- NAV após logar -->
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">Home</a></li>
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
          <li><a href="../cardapio/carrinho.php"><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i></a></li>
          <li><a class="btn btn-danger" href="../engine/controllers/logout.php">Sair</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- FIM BARRA DE NAVEGAÇÃO -->

  <!-- INÍCIO CABEÇALHO -->
  <div id="header" class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 wow flip">
          <img src="../images/cheers-logo.png" style="margin-bottom: 10px; width: 20%; height: auto;">
        </div>
        <h1 class="text-center wow fadeInUp" data-wow-delay="1s" style="font-size: 34px;">Área do Cliente!</h1>
        <p class="text-center"><button class="wow fadeInUp btn btn-success" data-wow-delay="1s" id="fazer_pedido" onclick="window.location = '../cardapio/cardapio.php'">FAZER PEDIDO</button></p>
      </div>
    </div>
  </div>
  <!-- FIM CABEÇALHO -->

  <!-- INÍCIO SERVIÇOS -->
  <div id="servicos" class="servicos">
    <div class="container">
      <h2 class="wow fadeInUp">Alguns Serviços</h2>
      <p class="wow fadeInUp">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
      <div class="row">
        <div class="col-lg-3 col-md-3 wow fadeInLeft servHover" data-wow-delay="1.5s" id="servico01" onclick="alert($(this).attr('id'));">
          <i class="fa fa-beer" aria-hidden="true"></i>
          <h4>Serviço 1</h4>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft servHover" data-wow-delay="1s" id="servico02" onclick="alert($(this).attr('id'));">
          <i class="fa fa-car" aria-hidden="true"></i>
          <h4>Serviço 2</h4>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft servHover" data-wow-delay="0.5s" id="servico03" onclick="alert($(this).attr('id'));">
          <i class="fa fa-money" aria-hidden="true"></i>
          <h4>Serviço 3</h4>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft servHover" id="servico04" onclick="alert($(this).attr('id'));">
          <i class="fa fa-credit-card" aria-hidden="true"></i>
          <h4>Serviço 4</h4>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- FIM SERVIÇOS -->

  <!-- INÍCIO VALORES -->
  <div id="pacotes" class="valores">
    <div class="container">
      <div class="row">
        <h2 class="wow fadeInUp">Pacotes</h2>
        <p class="wow fadeInUp">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        <div class="col-lg-3 col-md-3 wow flipInY" data-wow-delay="0">
          <div class="pacote">
            <h4>Pacote 1</h4>
            <h1>R$ 199,99</h1>
            <b>em até 12x</b>
            <p>Lorem Ipsum é simplesmente uma simulação de texto.</p>
            <hr>
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
            <li>Item 4</li>
            <li>Item 5</li>
            <button class="btn btn-success" onclick="alert('Pacote 1')">Saiba Mais</button>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 wow flipInY" data-wow-delay="0.5s">
          <div class="pacote">
            <h4>Pacote 2</h4>
            <h1>R$ 299,99</h1>
            <b>em até 12x</b>
            <p>Lorem Ipsum é simplesmente uma simulação de texto.</p>
            <hr>
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
            <li>Item 4</li>
            <li>Item 5</li>
            <button class="btn btn-success" onclick="alert('Pacote 2')">Saiba Mais</button>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 wow flipInY" data-wow-delay="1s">
          <div class="pacote">
            <h4>Pacote 3</h4>
            <h1>R$ 399,99</h1>
            <b>em até 12x</b>
            <p>Lorem Ipsum é simplesmente uma simulação de texto.</p>
            <hr>
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
            <li>Item 4</li>
            <li>Item 5</li>
            <button class="btn btn-success" onclick="alert('Pacote 3')">Saiba Mais</button>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 wow flipInY" data-wow-delay="1.5s">
          <div class="pacote">
            <h4>Pacote 4</h4>
            <h1>R$ 499,99</h1>
            <b>em até 12x</b>
            <p>Lorem Ipsum é simplesmente uma simulação de texto.</p>
            <hr>
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
            <li>Item 4</li>
            <li>Item 5</li>
            <button class="btn btn-success" onclick="alert('Pacote 4')">Saiba Mais</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FIM VALORES -->
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/sweetalert.js"></script>
  <script src="../js/login.js"></script>
  <script src="../js/wow.min.js"></script>
  <script src="//www.powr.io/powr.js?external-type=html"></script>
</body>
</html>

<script type="text/javascript">
  new WOW().init();

  $('.nav_roll').click(function(e){
    e.preventDefault();

    var id = $(this).attr('href'),
    targetOffset = $(id).offset().top,
    menuHeight = $('#myNavbar').innerHeight();

    $('body, html').animate({
      scrollTop: targetOffset - menuHeight
    }, 1700);
    console.log(targetOffset);
  });

  $('#enviar-mensagem').click(function(e){
    e.preventDefault();

    alert('Mensagem enviada com sucesso!');
  });
</script>