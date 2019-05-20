<?php

include_once '../model/clsCategoria.php';
include_once '../dao/clsCategoriaDAO.php';
include_once '../dao/clsConexao.php';

if (isset($_REQUEST['inserir'])) {
    $categoria = new Categoria();
    $categoria->setNome($_POST['txtCategoria']);
    CategoriaDAO::inserir($categoria);
    header("Location: ../menu.php");
}

if (isset($_REQUEST['excluir'])) {
    $id = $_REQUEST['idCategoria'];
    echo '<h3>Confirma a exclusão da Categoria  </h3> '
    . '<br>';
    echo '<a href="?confirmaExcluir&idCategoria=' . $id . '">'
    . '    <button>SIM</button></a> ';
    echo '<a href="../config.php" ><button>NÃO</button></a>';
}

if (isset($_REQUEST['confirmaExcluir'])) {
    $id = $_REQUEST['idCategoria'];
    CategoriaDAO::excluir($id);
    header("Location: ../config.php");
}
