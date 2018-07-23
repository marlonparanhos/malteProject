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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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

<div class="container">
<br>
<h1 class="center-align">COMPRAS</h1>
<br>
<br>
<br>

<div class="container">
  <div class="form-row">
    <div class="form-group col-md-3">
      <h4>Iten(s):</h4>
      <img alt="150x100" width="150" height="100" src="../images/1.jpg" alt="Imagem como Thumbnail">
      <h4>Cerveja Artesanal - Famiglia Valduga</h4>
    </div>
    
    <div class="form-group col-md-3">
      <h4>Preço:</h4>
    </div>
    
    <div class="form-group col-md-3">
      <h4>Quantidade:</h4>
    </div>
    
    <div class="form-group col-md-3">
      <h4>Subtotal:</h4>
    </div>

  </div>
</div>

<div class="container">
  <div class="form-row">
    <div class="form-group col-md-9">
    </div>

    <div class="form-group col-md-3">
      <h4>TOTAL:</h4>
      <br>

        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Confirmar compra</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Obrigado pela compra !</h4>
              </div>
              <div class="modal-body">
                <p>Continue navegando pelo nosso site.</p>
              </div>
              <div class="modal-footer">
                <a href="../index.php">
                  <button type="button" class="btn btn-default" data-dismiss="modal"> OK! </button>
                </a>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>
</div>

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