<!DOCTYPE html>
<?php
session_start();
if($_SESSION['logado']&& $_SESSION['logado']==TRUE){
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    </head>
    <body>
        <?php
        
        ?>
    </body>
    
    <?php
}else{
    header('location:index.php');
}

    ?>
</html>
