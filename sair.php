<?php

session_start();
if (isset($_SESSION['logado']))
    unset($_SESSION['logado']);

if (isset($_SESSION['idUsuario']))
    unset($_SESSION['idUsuario']);

if (isset($_SESSION['nome']))
    unset($_SESSION['nome']);

if (isset($_SESSION['admin']))
    unset($_SESSION['admin']);

session_destroy();

header("Location: index.php");


//session_start();
//
//if(isset($_SESSION['logado'])) {
//    unset($_SESSION['logado']);
//}
//session_destroy();
//
//header("Location:index.php");

