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

        <a href="../index.php" class="navbar-brand">ITANGUA</a>
      </div>

      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="" href="../index.php">Home</a></li>
          <li><a class="" href="../cardapio/cardapio.php">Cardápio</a></li>
          <li><a class="" href="controle.php">Controle</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
  <!-- FIM BARRA DE NAVEGAÇÃO -->

<div id="depoimentos" class="depoimentos">
    <div class="container">
      <div class="row">
        <h2 class="wow fadeInUp">GERENCIE O SEU COMÉRCIO</h2>
        <br>
        <div class="col-lg-4 col-md-4 wow fadeInLeft">
          <img src="../images/cerveja.jpg" class="img-circle">
          <h4>Cadastre produtos</h4>
          <b>Viajou para Themyscira</b>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
            <a href="../cardapio/produtos.php">
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"> IR </button>
            </a>
        </div>

        <div class="col-lg-4 col-md-4 wow fadeInLeft">
          <img src="../images/funcionarios.jpg" class="img-circle">
          <h4>Cadastre funcionários</h4>
          <b>Viajou para as Maldivas</b>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
            <a href="../cadastro/formulario_func.php">
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"> IR </button>
            </a>
        </div>

        <div class="col-lg-4 col-md-4 wow fadeInLeft">
          <img src="../images/pedido.png" class="img-circle">
          <h4>Gerencie pedidos</h4>
          <b>Viajou para a Capadócia</b>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
            <a href="pedidos.php">
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"> IR </button>
            </a>
        </div>

      </div>
    </div>
  </div>
  <!-- FIM DEPOIMENTOS -->

  <br>
  <br>
  <br>


  <div id="footer" class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <h4>Fale Conosco</h4>

          <p><i class="fa fa-home" aria-hidden="true"></i> Rua da Glória, 123</p>

          <p><i class="fa fa-envelope" aria-hidden="true"></i></p>

          <p><i class="fa fa-phone" aria-hidden="true"></i> (38) 9 9999-9999</p>

          <p><i class="fa fa-globe" aria-hidden="true"></i></p>
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

  <script src="../js/wow.min.js"></script>
  <script src="../https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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