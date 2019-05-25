<?php
    include 'model/clsProduto.php';
//    include 'model/clsIngredientesProduto.php.php';
//    include 'dao/clsIngredienteProdutoDAO.php.php';
    include'dao/clsConexao.php';
    include './dao/clsIngredienteDAO.php';
    include './model/clsIngrediente.php';
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
        
        <?php

        $idProduto = $_REQUEST['idProduto'];
            $lista = IngredienteProdutoDAO::getIngredientesProduto($idProduto);
            if(count($lista) == 0 ){
                echo '<h3>O produto não possui ingredientes!</h3>';
            } else {
                foreach ($lista as $ingredientesProdutos) {
                    $ingredientesProdutos->getIngrediente()->getNome();
                }
            }
        ?>
    </body>
</html>