<?php
require_once "../config.php";

$total = count($_FILES['arquivo']['name']);
$id_produto = $_POST['id_produto'];

for ($i=0; $i < $total; $i++) {
    $arquivo = $_FILES['arquivo']['tmp_name'][$i];
    $tamanho = $_FILES['arquivo']['size'][$i];
    $tipo = $_FILES['arquivo']['type'][$i];
    $nome = $_FILES['arquivo']['name'][$i];

    if ( $arquivo != "none" ){
        $fp = fopen($arquivo, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);

        $sql = "
        INSERT INTO anexo_produtos
        (
        nome_arquivo,
        tamanho_arquivo,
        tipo_arquivo,
        arquivo,
        fk_produto
        )
        VALUES
        (
        '$nome',
        '$tamanho',
        '$tipo',
        '$conteudo',
        '$id_produto'
        );
        ";

        $DB = new DB();
        $DB->open();
        $result = $DB->query($sql);
        $DB->close();
        header('Location: ../../cardapio/produtos.php');
    }
}
?>