<!DOCTYPE html>
<?php
include './dao/clsProdutoDAO.php';
include './dao/clsConexao.php';
include './model/clsProduto.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div style="width: 50%">
            <?php
            $listaPro = ProdutoDAO::getProdutos();

            if ($listaPro->count() == 0) {
                echo '<h2><b>Nenhum Produto cadastrado</b></h2>';
            } else {
                foreach ($listaPro as $produto) {
                    
                  $preco = str_replace(",", ".", $produto->getPreco());
                    echo

                    '<div style="clear:both;border:solid black 2px">
                        <div style="float:left; border:solid black 2px">
                        <img src="../fotos_produtos/' . $produto->getFoto() . '" width="100px height="100px" />
                        </div>'
                        . '<div style=float:left>'
                        . '<div>'
                        . $produto->getNome()
                        . '</div>'
                        . '<div>'
                        . $produto->getDescricao()
                        . '</div>'
                        . '<div>'
                        . 'R$' . $preco
                        . '</div>'
                        .'<div style="float:right"><a href="listaIngredientes.php">Ingredientes</a></div>'
                        . '</div>'
                  . '</div>'
                    ;
                }
            }
            ?>
        </div>
    </body>
</html>
