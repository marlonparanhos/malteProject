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

  <!-- INÍCIO DO CARDÁPIO -->
  <div id="depoimentos" class="depoimentos">
    <div class="container">
      <h2 class="wow fadeInUp">Cardápio</h2>
      <div class="row">

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1.5s">
          <img src="../images/1.jpg" class="img-circle">
          <h4 id="breja01-title">Cerveja Artesanal - Leopoldina</h4>
          <p id="breja01-desc">Leopoldina Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado.</p>
          <a href="#" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modalOpcBeer" id="breja01">Adicionar ao carrinho</a>
        </div>

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1s">
          <img src="../images/3.jpg" class="img-circle">
          <h4 id="breja02-title">Império</h4>
          <p id="breja02-desc">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href="#" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modalOpcBeer" id="breja02">Adicionar ao carrinho</a>
        </div>

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="0.5s">
          <img src="../images/5.jpg" class="img-circle">
          <h4 id="breja03-title">Corona Extra</h4>
          <p id="breja03-desc">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href="#" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modalOpcBeer" id="breja03">Adicionar ao carrinho</a>
        </div>

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="0s">
          <img src="../images/2.png" class="img-circle">
          <h4 id="breja04-title">Burgman lager</h4>
          <p id="breja04-desc">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href="#" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modalOpcBeer" id="breja04">Adicionar ao carrinho</a>
        </div>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1.5s">
          <img src="../images/7.jpg" class="img-circle">
          <h4 id="breja05-title">Bud Light</h4>
          <p id="breja05-desc">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href="#" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modalOpcBeer" id="breja05">Adicionar ao carrinho</a>
        </div>

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1s">
          <img src="../images/8.jpg" class="img-circle">
          <h4 id="breja06-title">EISENBAHN</h4>
          <p id="breja06-desc">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href="#" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modalOpcBeer" id="breja06">Adicionar ao carrinho</a>
        </div>

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="0.5s">
          <img src="../images/9.jpg" class="img-circle">
          <h4 id="breja07-title">Madalena Weiss</h4>
          <p id="breja07-desc">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href="#" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modalOpcBeer" id="breja07">Adicionar ao carrinho</a>
        </div>

        <div class="col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="0s">
          <img src="../images/10.jpg" class="img-circle">
          <h4 id="breja08-title">1795 Original Czech Lager</h4>
          <p id="breja08-desc">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
          <a href="#" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modalOpcBeer" id="breja08">Adicionar ao carrinho</a>
        </div>
      </div>

    </div>

  </div>
</div>
<!-- FIM DO CARDÁPIO -->

<!-- Modal Opção Cerveja -->
<div class="modal fade" id="modalOpcBeer" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Gerar Benefício Social</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="text-center col-md-12">
            <img id="brejaModal" src="../images/3.jpg" class="img-circle" style="width: 200px;">
            <h4 id="tituloBreja">Cerveja Artesanal - Famiglia Valduga</h4>
            <p id="descBreja">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
            <hr>
          </div>

          <div class="col-md-12">
            <div class="col-md-6">
              <p class="text-center"><b>Tipo</b></p>
              <select class="form-control" id="tipoCerveja">
                <option>Selecione...</option>
                <option>250ml</option>
                <option>600ml</option>
              </select>
            </div>

            <div class="col-md-6">
              <p class="text-center"><b>Quantidade</b></p>
              <label for="inputquantidade" class="sr-only">Quantidade</label>
              <input type="number" MIN=0 class="form-control" id="inputquantidade" placeholder="Quantidade">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a id="add_carrinho" type="button" class="btn btn-info btn-block" href="#">Add carrinho</a>
      </div>
    </div>
  </div>
</div>
<!-- Fim Opção Cerveja -->

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

  $('#add_carrinho').click(function(e){
    e.preventDefault();

    swal("Sucesso", "Ir pro carrinho?", "success", {
      buttons: {
        cancel: true,
        confirm: "Sim",
      },
    });
  });

  $('#breja01').click(function(e){
    e.preventDefault();

    $("#brejaModal").attr("src", "../images/1.jpg");
    $('#tituloBreja').text($('#breja01-title').text());
    $('#descBreja').text($('#breja01-desc').text());
  });

  $('#breja02').click(function(e){
    e.preventDefault();

    $("#brejaModal").attr("src", "../images/3.jpg");
    $('#tituloBreja').text($('#breja02-title').text());
    $('#descBreja').text($('#breja02-desc').text());
  });

  $('#breja03').click(function(e){
    e.preventDefault();

    $("#brejaModal").attr("src", "../images/5.jpg");
    $('#tituloBreja').text($('#breja03-title').text());
    $('#descBreja').text($('#breja03-desc').text());
  });

  $('#breja04').click(function(e){
    e.preventDefault();

    $("#brejaModal").attr("src", "../images/2.png");
    $('#tituloBreja').text($('#breja04-title').text());
    $('#descBreja').text($('#breja04-desc').text());
  });

  $('#breja05').click(function(e){
    e.preventDefault();

    $("#brejaModal").attr("src", "../images/7.jpg");
    $('#tituloBreja').text($('#breja05-title').text());
    $('#descBreja').text($('#breja05-desc').text());
  });

  $('#breja06').click(function(e){
    e.preventDefault();

    $("#brejaModal").attr("src", "../images/8.jpg");
    $('#tituloBreja').text($('#breja06-title').text());
    $('#descBreja').text($('#breja06-desc').text());
  });

  $('#breja07').click(function(e){
    e.preventDefault();

    $("#brejaModal").attr("src", "../images/9.jpg");
    $('#tituloBreja').text($('#breja07-title').text());
    $('#descBreja').text($('#breja07-desc').text());
  });

  $('#breja08').click(function(e){
    e.preventDefault();

    $("#brejaModal").attr("src", "../images/10.jpg");
    $('#tituloBreja').text($('#breja08-title').text());
    $('#descBreja').text($('#breja08-desc').text());
  });
</script>