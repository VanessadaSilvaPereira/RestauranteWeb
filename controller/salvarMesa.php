<?php
include_once '../model/clsMesa.php';
include_once '../dao/clsMesaDAO.php';
include_once '../dao/clsConexao.php';

if (isset($_REQUEST['inserir'])) {
    $mesa = new Mesa();
    $mesa->setNome($_POST['txtMesa']);
    MesaDAO::inserir($mesa);
    header("Location: ../config.php");
}

if (isset($_REQUEST['excluir'])) {
    $id = $_REQUEST['idMesa'];
    echo '<h3>Confirma a exclusão da Mesa</h3> '
    . '<br>';
    echo '<a href="?confirmaExcluir&idMesa=' . $id . '">'
    . '    <button>SIM</button></a>';
    echo '<a href="../config.php" ><button>NÃO</button></a>';
}

if (isset($_REQUEST['confirmaExcluir'])) {
    $id = $_REQUEST['idMesa'];
    MesaDAO::excluir($id);
    header("Location: ../config.php");
}
