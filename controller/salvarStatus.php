<?php
include_once '../model/clsStatus.php';
include_once '../dao/clsStatusDAO.php';
include_once '../dao/clsConexao.php';

if( isset($_REQUEST['inserir'] ) ){
    $status = new Status();
    $status->setNome($_POST['txtNome']  );

    StatusDAO::inserir($status);
    
    header("Location: ../config.php");
}
if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idStatus'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Status  </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idStatus='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../config.php" ><button>NÃO</button></a>';
}
if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idStatus'];
    StatusDAO::excluir($id);
    header("Location: ../config.php");
}
