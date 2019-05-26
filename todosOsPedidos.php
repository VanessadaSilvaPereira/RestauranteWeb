<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) {
?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>

            <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        </head>

        <body style="background-image: url(imagens/madeira2.jpg)">
            <h1>Todos os Pedidos</h1>

            <a href="menu.php"  ><div class="btnVoltar"></div></a>

        </body>
        <?php
    } else {
        header('LOCATION: index.php');
    }
    ?>
</html>
