<?php

include_once '../model/clsCategoria.php';
include_once '../dao/clsCategoriaDAO.php';
include_once '../model/clsProduto.php';
include_once '../dao/clsProdutoDAO.php';
include_once '../dao/clsConexao.php';

if (isset($_REQUEST['inserir'])) {
$produto = new Produto();
$produto->setNome($_POST['txtNome']);
$produto->setPreco($_POST['txtPreco']);
$produto->setDescricao($_POST['txtDescricao']);

$cat = new Categoria();
$cat->setId( $_POST['categoria']);
$produto->setCategoria( $cat );

$produto->setFoto( salvarFoto() );

ProdutoDAO::inserir($produto);
header("Location: ../cadastroProduto.php");
}

function salvarFoto(){
$nome_arquivo = "";
if( isset( $_FILES['foto']['name']) &&
$_FILES['foto']['name'] != "" ){
$nome_arquivo = date('YmdHis').
basename( $_FILES['foto']['name'] );
$diretorio = "../fotos_produtos/";
$caminho = $diretorio.$nome_arquivo;
if(!move_uploaded_file( $_FILES['foto']['tmp_name'],
 $caminho ) ){
$nome_arquivo = "sem_foto.png";
}
} else {
$nome_arquivo = "sem_foto.png";
}
return $nome_arquivo;
}

if (isset($_REQUEST['excluir'])) {
$id = $_REQUEST['idProduto'];
echo '<h3>Confirma a exclusão do Produto  </h3> '
. '<br>';
echo '<a href="?confirmaExcluir&idProduto=' . $id . '">'
. '    <button>SIM</button></a> ';
echo '<a href="../cadastroProduto.php" ><button>NÃO</button></a>';
}

if (isset($_REQUEST['confirmaExcluir'])) {
$id = $_REQUEST['idProduto'];
ProdutoDAO::excluir($id);
header("Location: ../cadastroProduto.php");
}
