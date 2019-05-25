<?php
    include_once 'model/clsUsuario.php';
    include_once 'dao/clsUsuarioDAO.php';
    include_once 'dao/clsConexao.php';
        
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];
//    $senha = md5($senha);
    
    $usuario = UsuarioDAO::logar($login, $senha);
    
    if( $usuario == NULL ){
        echo '<body onload="window.history.back()" >';
    } else {
        session_start();
        $_SESSION['logado'] = TRUE;
        $_SESSION['idUsuario'] = $usuario->getId();
        $_SESSION['nome'] = $usuario->getNome();
        $_SESSION['admin'] = $usuario->getAdmin();
        
       header("Location: ".$_SERVER['HTTP_REFERER']);
    }