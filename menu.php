<!DOCTYPE html>
<?php
include_once 'model/clsCategoria.php';
include_once 'dao/clsCategoriaDAO.php';
include_once 'dao/clsConexao.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <script src="jquery-3.3.1.js"></script>


    </head>
    <a href="sair.php" ><button class="botao" style="float: right">Sair</button></a>
    <div class="limparFloat"></div>
    <body style="background-image: url(imagens/madeira2.jpg)">

        <?php
        $lista = CategoriaDAO::getCategorias();

        if ($lista->count() == 0) {
            echo '<h2><b>Nenhuma  Categorias cadastrada</b></h2>';
        } else {
            ?>

            <div id="divListaCategorias">
                <?php
                foreach ($lista as $categoria) {
                    echo '<a href="listaProdutos.php">' . $categoria->getNome() . '<a>' . '<br>';
                }
            }
            ?>
        </div>
        <div class="limparFloat"></div>
        <?php
        session_start();
        if (($_SESSION['admin']) && $_SESSION['admin'] == TRUE) {
            echo'<div><a id="botaoConfig" href="config.php" ></a></div>';
            echo '<div class="limparFloat"></div>';
            echo '<div><a href="todosOsPedidos.php" style="float:right;position:relative" class="botao">Todos os Pedidos</a></div>';
        }
        ?>

    </body>
    <script>

    </script>
</html>