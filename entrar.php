
<?php
require_once 'dao/clsConexao.php';

$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];
if ($login == "cliente" && $senha == "123456") {

    session_start();
    $_SESSION['logado'] = TRUE;
    
    header('Location:index.php');
  
} else {
    header('Location: index.php?loginInvalido');
}

