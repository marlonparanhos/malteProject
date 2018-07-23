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
          <li><a class="" href="cardapio.php">Cardápio</a></li>
          <li><a class="" href="../cadastro/formulario.php">Cadastro</a></li>
          <li><a class="" href="../cadastro/perfil.php">Perfil</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
  <!-- FIM BARRA DE NAVEGAÇÃO -->

<!-- INÍCIO DO CARDÁPIO -->
  <div id="depoimentos" class="depoimentos">
    <div class="container">
      <h2 class="wow fadeInUp">Meu Carrinho</h2>
      <div class="row">
      
        <div class="col-lg-6 col-md-6 wow fadeInLeft">
          <img src="../images/1.jpg" class="img-circle">
          <h4>Cerveja Artesanal - Famiglia Valduga</h4>
          <b>Viajou para Themyscira</b>
          <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        </div>

        <div class="col-lg-2 col-md-2 wow fadeInLeft">
          <b>TIPO</b>
          <div class="form-check">
              <label class="form-check-label">
                  <input class="form-check-input" type="checkbox"> 600ml
              </label>
          </div>
          <div class="form-check">
              <label class="form-check-label">
                  <input class="form-check-input" type="checkbox"> 250ml
              </label>
          </div>
        </div>

        <div class="col-lg-2 col-md-2 wow fadeInLeft">
            <b>Quantidade</b>
            <div class="form-group mx-sm-3">
              <label for="inputquantidade" class="sr-only">Quantidade</label>
              <input type="quantidade" class="form-control" id="inputquantidade" placeholder="Quantidade">
            </div>
        </div>

        <div class="col-lg-2 col-md-2 wow fadeInLeft">
          <br>
          <a type="button" class="btn btn-info btn-block" href="compra_final.php">Add carrinho</a>
        </div>

        </div>
      </div>
    </div>
  </div>
<!-- FIM DO CARDÁPIO -->

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