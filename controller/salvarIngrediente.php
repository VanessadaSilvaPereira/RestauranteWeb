<?php
include_once '../model/clsIngrediente.php';
include_once '../dao/clsIngredienteDAO.php';
include_once '../dao/clsConexao.php';

if( isset( $_REQUEST['inserir'] ) ){
    $ingrediente = new Ingrediente();
    $ingrediente->setNome( $_POST['txtIngrediente']  );

    IngredienteDAO::inserir($ingrediente);
    
    header("Location: ../config.php");
}
if( isset($_REQUEST['excluir'])){
    $id = $_REQUEST['idIngrediente'];
    echo '<br><br><hr> '
       . '<h3>Confirma a exclusão do Ingrediente  </h3> '
       . '<br><hr>';
    echo  '<a href="?confirmaExcluir&idIngrediente='.$id.'">'
        . '    <button>SIM</button></a> ';
    echo '<a href="../config.php" ><button>NÃO</button></a>';
}
if( isset( $_REQUEST['confirmaExcluir'] ) ){
    $id = $_REQUEST['idIngrediente'];
    IngredienteDAO::excluir($id);
    header("Location: ../config.php");
}
