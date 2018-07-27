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
          <li><a href="carrinho.php"><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i></a></li>
          <li><a href="../cardapio/carrinho.php"><i class="fa fa-bell fa-1x" aria-hidden="true"></i></a></li>
          <li><a class="btn btn-danger" href="../engine/controllers/logout.php">Sair</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- FIM BARRA DE NAVEGAÇÃO -->

  <!-- INÍCIO DO CARDÁPIO -->
  <div id="cardapio" class="depoimentos">
    <div class="container">
      <h2 class="wow fadeInUp">Cardápio</h2>
      <div class="row">

        <?php
        require_once "../engine/config.php";

        function unique_multidim_array($array, $key) {
          $temp_array = array();
          $i = 0;
          $key_array = array();

          foreach($array as $val) {
              if (!in_array($val[$key], $key_array)) {
                  $key_array[$i] = $val[$key];
                  $temp_array[$i] = $val;
              }
              $i++;
          }
          return $temp_array;
      }

        $Produtos = new Produtos();
        $Produtos = $Produtos->ReadAll();
        $Produtos = unique_multidim_array($Produtos, 'cod_prod');

        foreach ($Produtos as $prod) {
          $Anexo = new Anexo_produtos();
          $Anexo = $Anexo->Read_fk($prod['id']);
          ?>
          <div class="col-lg-3 col-md-3 wow fadeInLeft">
            <img src="data:image/png;base64,<?php echo base64_encode($Anexo['arquivo']); ?>" class="img-circle" id="imgBreja<?php echo $prod['id'];?>">
            <h4 id="nomeBreja<?php echo $prod['id'];?>"><?php echo $prod['nome_prod']; ?></h4>
            <p hidden id="valorBreja<?php echo $prod['id'];?>" class="text-center" style="margin-top: -15px;"><?php echo $prod['valor']; ?>/un</p>
            <p id="descBreja<?php echo $prod['id'];?>"><?php echo $prod['desc_prod']; ?></p>
            <a href="#" type="button" class="btn btn-info btn-block cod_prod brejaTal" data-toggle="modal" data-target="#modalOpcBeer" codigo="<?php echo $prod['cod_prod'];?>" id="breja<?php echo $prod['id'];?>" onclick="document.getElementById('aux_codigo').value = $(this).attr('codigo');" id-aux="<?php echo $prod['id'];?>">Adicionar ao carrinho</a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<!-- FIM DO CARDÁPIO -->

<!-- Modal Opção Cerveja -->
<div class="modal fade" id="modalOpcBeer" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">Detalhes do Produto</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <input hidden type="text" id="aux_codigo">
          <div class="text-center col-md-12">
            <img id="brejaModal" src="" class="img-circle" style="width: 200px;">
            <h4 id="tituloBreja"></h4>
            <p id="breja-val" class="text-center" style="margin-top: -10px;"></p>
            <p id="descBreja"></p>
            <hr>
          </div>

          <div class="col-md-12">
            <div class="col-md-6">
              <p class="text-center"><b>Tipo</b></p>
              <select class="form-control" id="tipoCerveja">
                <option value="">Selecione...</option>
                <option value="1">250ml</option>
                <option value="2">600ml</option>
                <option value="3">Litrão</option>
              </select>
            </div>

            <div class="col-md-6">
              <p class="text-center"><b>Valor Unitário</b></p>
              <input disabled type="text" class="form-control text-center" id="valorBrejaUnit" value="R$ ">
            </div>
          </div>

          <div class="col-md-12" style="margin-top: 15px;">
            <div class="col-md-6">
              <p class="text-center"><b>Quantidade</b></p>
              <input type="number" MIN=0 class="form-control" id="inputquantidade" placeholder="Quantidade" value="0">
            </div>

            <div class="col-md-6">
              <p class="text-center"><b>Valor Total</b></p>
              <input disabled type="text" class="form-control text-center" id="valorBrejaTotal" value="R$">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <a id="add_carrinho" type="button" class="btn btn-info btn-block" href="#" data-toggle="modal" data-dismiss="modal" data-target="#ask_carrinho">Add carrinho</a> -->
        <button id="add_carrinho" class="btn btn-info btn-block" data-toggle="modal">Add carrinho</button>
      </div>
    </div>
  </div>
</div>
<!-- Fim Opção Cerveja -->

<div id="ask_carrinho" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center">Produto adicionado!</h3>
      </div>
      <div class="modal-body">
        <h4 class="text-center">O que deseja fazer?</h4>
      </div>
      <div class="modal-footer">
        <p class="text-center">
          <button type="button" class="btn btn-success" data-dismiss="modal">Continuar comprando</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location = 'carrinho.php'">Ir para o carrinho</button>
        </p>
      </div>
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
<script src="../js/wow.min.js"></script>
<script src="//www.powr.io/powr.js?external-type=html"></script>
</body>
</html>

<script type="text/javascript">
  new WOW().init();

  $('#modalOpcBeer').on('shown.bs.modal', function(e){
    document.getElementById('inputquantidade').value = "0";
    document.getElementById('tipoCerveja').value = "";
    document.getElementById('valorBrejaUnit').value = "R$";
    document.getElementById('valorBrejaTotal').value = "R$";
  });

  $('.brejaTal').click(function(e){
    e.preventDefault();

    var id_aux = $(this).attr('id-aux');

    $("#brejaModal").attr("src", $("#imgBreja"+id_aux).attr("src"));
    $('#tituloBreja').text($('#nomeBreja'+id_aux).text());
    $('#descBreja').text($('#descBreja'+id_aux).text());
  });

  $('#tipoCerveja').change(function(e){
    e.preventDefault();

    var cod_prod = $('#aux_codigo').val(),
        tipo_prod = $('#tipoCerveja').val();

    $.post('../engine/controllers/produtos.php',
    {
      cod_prod : cod_prod,
      tipo_prod : tipo_prod,
      action : 'consultaValor'
    },
    function(data, status){
      obj = JSON.parse(data);
      if (obj.res && obj.valor != null) {
        document.getElementById('valorBrejaUnit').value = obj.valor;
      } else {
        document.getElementById('valorBrejaUnit').value = 'Produto Indisponível';
      }
    });
  });

  $('#inputquantidade').change(function(e){
    e.preventDefault();

    var valorBrejaUnit = $('#valorBrejaUnit').val(),
        quatidade = $(this).val();

    $.post('../engine/controllers/produtos.php',
    {
      valorBrejaUnit : valorBrejaUnit,
      quatidade : quatidade,
      action : 'valorTotal'
    },
    function(data, status){
      document.getElementById('valorBrejaTotal').value = "R$ "+data;
    });
  });

  $('#add_carrinho').click(function(e){
    e.preventDefault();

    var aux = $('#valorBrejaUnit').val(),
        quantidade = $('#inputquantidade').val();

    if (aux == 'Produto Indisponível' || quantidade == 0) {
      swal("Atenção!", "Produto Indisponível ou quantidade inválida.", "info");
    } else {
      $('#modalOpcBeer').modal('hide');
      $('#ask_carrinho').modal('show');
    }
  });




</script>