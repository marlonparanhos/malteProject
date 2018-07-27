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
  <link rel="stylesheet" href="../css/fileinput.css">
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
            <li><a href="../gerente/controle.php">Funcionários</a></li>
            <li><a href="../gerente/controle.php">Pedidos</a></li>
            <li><a href="#">Seja bem-vindo <u><?php echo $_SESSION['nome']; ?></u></a></li>
            <li><a href="../cardapio/carrinho.php"><i class="fa fa-bell fa-1x"></i></a></li>
            <li><a class="btn btn-danger exitBtn" href="../engine/controllers/logout.php">Sair</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- FIM BARRA DE NAVEGAÇÃO -->

  <div id="depoimentos" class="depoimentos">
    <div class="container">
      <h2 class="wow fadeInUp">Cardápio</h2>

      <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#novo_prod">Cadastre um novo produto</button>

      <div class="row">
        <?php
        require_once "../engine/config.php";

        $Produtos = new Produtos();
        $Produtos = $Produtos->ReadAll();

        foreach ($Produtos as $prod) {
          $Anexo = new Anexo_produtos();
          $Anexo = $Anexo->Read_fk($prod['id']);
          ?>
          <div class="col-lg-3 col-md-3 wow fadeInLeft">
            <img src="data:image/png;base64,<?php echo base64_encode($Anexo['arquivo']); ?>" class="img-circle">
            <h4><?php
            echo $prod['nome_prod']." - ";
            if ($prod['tipo_prod'] == 1) {
              echo "250ml";
            } elseif ($prod['tipo_prod'] == 2) {
              echo "600ml";
            } else {
              echo "Litrão";
            }
            ?></h4>
            <p id="<?php echo $prod['id']; ?>" class="text-center" style="margin-top: -15px;"><?php echo $prod['valor']; ?>/un</p>
            <p><?php echo $prod['desc_prod']; ?></p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEditarProd">Editar</button>
            <button type="button" class="btn btn-danger">Excluir</button>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditarProd" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-center">Detalhes do Produto</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="text-center col-md-12">
                <img id="brejaModal" src="../images/3.jpg" class="img-circle" style="width: 200px;">
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
                    <option value="1">250ml | R$ 3,19/un</option>
                    <option value="2">600ml | R$ 4,90/un</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <p class="text-center"><b>Quantidade</b></p>
                  <input type="number" MIN=0 class="form-control" id="inputquantidade" placeholder="Quantidade">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a id="add_carrinho" type="button" class="btn btn-info btn-block" href="#" data-toggle="modal" data-dismiss="modal" data-target="#ask_carrinho">Add carrinho</a>
          </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="novo_prod" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">Cadastrar Produto</h4>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-md-12" style="margin-bottom: 10px;">
            <p class="text-center"><b>Nome do Produto</b></p>
            <input type="text" class="form-control" id="nome_prod" placeholder="Nome do Produto">
          </div>

          <div class="col-md-12" style="margin-bottom: 10px;">
            <p class="text-center"><b>Descrição</b></p>
            <textarea id="desc_prod" class="form-control" placeholder="Descreva o produto aqui..."></textarea>
          </div>

          <div class="col-md-3"></div>
          <div class="col-md-6" style="margin-bottom: 10px;">
              <p class="text-center"><b>Tipo</b></p>
              <select class="form-control" id="tipo_prod">
                <option value="">Selecione...</option>
                <option value="1">250ml</option>
                <option value="2">600ml</option>
                <option value="3">Litrão</option>
              </select>
            </div>

          <div class="col-md-12"></div>
          <div class="col-md-3"></div>
          <div class="col-md-6" style="margin-bottom: 10px;">
              <p class="text-center"><b>Código do Produto</b></p>
              <input type="text" class="form-control" id="cod_prod" placeholder="xxxx">
          </div>

          <div class="col-md-12"></div>
          <div class="col-md-3"></div>
          <div class="col-md-6" style="margin-bottom: 10px;">
              <p class="text-center"><b>Valor</b></p>
              <input type="text" class="form-control" id="valor_prod" placeholder="R$">
          </div>

          <div class="col-lg-12">
            <hr>
            <h4 class="text-center">Anexar Imagem do Produto</h4>
            <p class="text-center" style="font-size: 14px"><i class="fa fa-info-circle"></i> <b>Obs.:</b> Certifique-se de selecionar uma imagem nítida do produto.</p>
            <form enctype="multipart/form-data" action="../engine/controllers/upload.php" method="post" id="enviar_arquivo">
              <input type="hidden" name="id_produto" id="id_produto" />

              <input id="input_anexo" name="arquivo[]" type="file" class="file" data-show-preview="true" required showUpload="false" data-show-upload="false">
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="cadastrar_prod" class="btn btn-success btn-block">Cadastrar</button>
      </div>
    </div>
  </div>
</div>


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
<script src="../js/vanilla-masker.js"></script>
<script src="../js/fileinput.js"></script>
<script src="../js/sweetalert.js"></script>
</body>
</html>

<script type="text/javascript">
  VMasker(document.querySelector("#valor_prod")).maskMoney({
    precision: 2,
    separator: ',',
    delimiter: '.',
    unit: 'R$',
    zeroCents: false
  });

  VMasker(document.querySelector("#cod_prod")).maskPattern("9999");

  $('#cadastrar_prod').click(function(e){
    e.preventDefault();

    var nome_prod = $('#nome_prod').val(),
    desc_prod = $('#desc_prod').val(),
    tipo_prod = $('#tipo_prod').val(),
    valor_prod = $('#valor_prod').val(),
    cod_prod = $('#cod_prod').val();

    if (!$('#input_anexo').val()) {
      return swal("Atenção!", "Você precisa anexar uma imagem do produto.", "error");
    }

    $.post('../engine/controllers/produtos.php',
    {
      nome_prod : nome_prod,
      desc_prod : desc_prod,
      tipo_prod : tipo_prod,
      valor : valor_prod,
      cod_prod : cod_prod,
      disponibilidade : 0, // 0 = disponível | 1 = indisponível

      action : 'create'
    },
    function(data, status){
      obj = JSON.parse(data);
      if (obj.res) {
        swal("Sucesso", "Cadastro realizado!", "success", {button : false});
        setTimeout(function(){
          document.getElementById('id_produto').value = obj.id_produto;
          document.getElementById('enviar_arquivo').submit();
          // location.reload();
        }, 3000);
      }
    });
  });
</script>