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

if(empty($_SESSION)) $checkSession = false;
else $checkSession = true;
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="animate.css-master/animate.min.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <title>Itangua</title>
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

        <a href="#" class="navbar-brand">Itanguá</a>
      </div>

      <?php if (!$checkSession) { ?>
        <!-- NAV antes de logar -->
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a class="nav_roll" href="#header">Home</a></li>
            <li><a class="nav_roll" href="#servicos">Serviços</a></li>
            <li><a class="nav_roll" href="#pacotes">Pacotes</a></li>
            <li><a class="nav_roll" href="#depoimentos">Depoimentos</a></li>
            <li><a class="nav_roll" href="#parceiros">Parceiros</a></li>
            <li><a class="nav_roll" href="#contato">Contato</a></li>
            <li><a target='_blank' href="psi.pdf">PSI</a></li>
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
                <button type="button" class="btn btn-success" id="signin">Cadastre-se</button>
              </form>
            </li>
          </ul>
        </div>
      <?php } else { ?>
        <!-- NAV após logar -->
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="gerente/controle.php">Controle</a></li>
              <li><a href="cardapio/cardapio.php">Cardápio</a></li>
              <li><a href="cadastro/formulario.php">Cadastro</a></li>
              <li><a href="#">Seja bem-vindo <u><?php echo $_SESSION['nome']; ?></u></a></li>
              <li><a class="btn btn-danger" href="engine/controllers/logout.php">Sair</a></li>
          </ul>
        </div>
      <?php } ?>
    </div>
  </div>
  <!-- FIM BARRA DE NAVEGAÇÃO -->
  <!-- INÍCIO CABEÇALHO -->
  <div id="header" class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 wow flip">
          <img src="images/cheers-logo.png" style="margin-top: 20px; margin-bottom: 20px; width: 40%; height: auto;">
        </div>
        <h1 class="text-center wow fadeInUp" data-wow-delay="1s">Comercial Itanguá</h1>
        <h1 class="text-center wow fadeInUp" data-wow-delay="2s" style="font-size: 20px; margin-top: -10px;">- Seja bem vindo -</h1>
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
        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1.5s">
          <i class="fa fa-beer" aria-hidden="true"></i>
          <h4>Serviço 1</h4>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1s">
          <i class="fa fa-car" aria-hidden="true"></i>
          <h4>Serviço 2</h4>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="0.5s">
          <i class="fa fa-money" aria-hidden="true"></i>
          <h4>Serviço 3</h4>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft">
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
            <button class="btn btn-success">Saiba Mais</button>
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
            <button class="btn btn-success">Saiba Mais</button>
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
            <button class="btn btn-success">Saiba Mais</button>
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
            <button class="btn btn-success">Saiba Mais</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FIM VALORES -->

  <!-- INÍCIO DEPOIMENTOS -->
  <div id="depoimentos" class="depoimentos">
    <div class="container">
      <div class="row">
        <h2 class="wow fadeInUp">O que nossos clientes dizem</h2>
        <p class="wow fadeInUp">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1.5s">
          <img src="images/avatar01.png" class="img-circle">

          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
        </div>

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1s">
          <img src="images/avatar02.png" class="img-circle">

          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
        </div>

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="0.5s">
          <img src="images/avatar03.png" class="img-circle">

          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
        </div>

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="0s">
          <img src="images/avatar04.png" class="img-circle">

          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- FIM DEPOIMENTOS -->

  <!-- INÍCIO PARCEIROS -->
  <div id="parceiros" class="parceiros">
    <div class="container">
      <div class="row">
        <h2 class="wow fadeInUp">Nossos Parceiros</h2>
        <p class="wow fadeInUp">Lorem Ipsum é simplesmente uma simulação de texto.</p>
        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1.2s">
          <li><img src="images/brahma.png"></li>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="0.8s">
          <li><img src="images/skol.png"></li>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">
          <li><img src="images/kaiser.png"></li>
        </div>
        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="">
          <li><img src="images/itaipava.png"></li>
        </div>
      </div>
    </div>
  </div>
  <!-- FIM PARCEIROS -->

  <!-- INÍCIO CONTATO -->
  <div class="contato" id="contato">
    <div class="container">
      <div class="row">
        <h2 class="wow fadeInUp">Contato</h2>
        <p class="wow fadeInUp">Lorem Ipsum é simplesmente uma simulação de texto.</p>
        <div class="col-lg-6 col-md-6">
          <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="0.2s">
            <span class="input-group-addon" id="sizing=addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" class="form-control" aria-describedby="sizing=addon1" placeholder="Nome completo">
          </div>

          <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="0.4s">
            <span class="input-group-addon" id="sizing=addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            <input type="text" class="form-control" aria-describedby="sizing=addon1" placeholder="e-mail">
          </div>

          <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="0.6s">
            <span class="input-group-addon" id="sizing=addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
            <input type="text" class="form-control" aria-describedby="sizing=addon1" placeholder="Celular">
          </div>
        </div>

        <div class="col-lg-6 col-md-6">
          <div class="input-group wow fadeInUp" data-wow-delay="0.8s">
            <textarea class="form-control" cols="80" rows="6"></textarea>
          </div>
          <button class="btn btn-lg btn-success wow fadeInUp" data-wow-delay="1s" id="enviar-mensagem">Enviar Menssagem</button>
        </div>
      </div>
    </div>
  </div>
  <!-- INÍCIO CONTATO -->

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

  <script src="js/wow.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="//www.powr.io/powr.js?external-type=html"></script>
  <script src="js/sweetalert.js"></script>
  <script src="js/login.js"></script>
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