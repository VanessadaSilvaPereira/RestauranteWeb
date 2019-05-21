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

//                  $preco = str_replace(",", ".", $produto->getPreco());
                    echo

                    '<div style="clear:both;">
                        
                        <div id="divFoto" style="float:left">
                        <img src="fotos_produtos/' . $produto->getFoto() . '"width="150px height="100px" />
                        </div>'
                            
                    . '<div style="float:left;margin:3%">'
                    . '<div>' . $produto->getNome() . '</div>'
                    . '<div>' . $produto->getDescricao() . '</div>'
                    . '<div>R$ ' . $produto->getPreco() . '</div>'
                            
                    . '</div>'
                    . '<div style="float:right"><a href="listaIngredientes.php">Ingredientes</a></div>'
                    . '</div>'
                    ;
                }
            }
            ?>
        </div>
    </body>
</html>
