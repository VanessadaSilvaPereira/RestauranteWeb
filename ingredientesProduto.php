<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) {

    include 'model/clsProduto.php';
    include'dao/clsConexao.php';
    include './dao/clsProdutoDAO.php';
    include './dao/clsIngredienteDAO.php';
    include './model/clsIngrediente.php';
    include './model/clsIngredienteProduto.php';
    include './dao/clsIngredienteProdutoDAO.php';
    include './dao/clsCategoriaDAO.php';
    include './model/clsCategoria.php';
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            <h1 align="center">Ingredientes do Produto</h1>
            <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


            <div id="divListaIngredientesProdutos">
                <?php
                $idProduto = $_REQUEST['idProduto'];
                $listaIng = IngredienteProdutoDAO::getIngredientesProdutos($idProduto);


                if ($listaIng->count() == 0) {

                    echo '<h3>Nenhum  ingrediente cadastrado</h3>';
                } else {
                    ?>

                    <?php
                    foreach ($listaIng as $ingredienteProduto) {
                        //ERA SÓ TER COLOCADO DENTRO DE UMA DIV :O
                        echo '<div id="divIngrediente">' . $ingredienteProduto->getIngrediente() . '</div>';
                    }
                }
                ?>
            </div>
            <a onclick="window.history.go(-1)" ><div class="btnVoltar"></div></a>
        </body>
        <?php
    } else {
        header('location:index.php');
    }
    ?>
</html>