<!DOCTYPE html>
<?php
include './dao/clsProdutoDAO.php';
include './dao/clsConexao.php';
include './model/clsProduto.php';
include './dao/clsCategoriaDAO.php';
include './model/clsCategoria.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background-image: url(imagens/madeira2.jpg)">
        <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <a class="botao" href="meuPedido.php" style="position:relative;float:right">Meu Pedido</a>
        <div style="width:70%">
            <?php
            $listaPro = ProdutoDAO::getProdutos();
            if ($listaPro->count() == 0) {
                echo '<h3>Nenhum Produto cadastrado</h3>';
            } else {
                
                foreach ($listaPro as $produto) {

//                  $preco = str_replace(",", ".", $produto->getPreco());
                    echo
                       '<div class="limparFloat"></div>'.
                    '<div id="divItem">
                        
                        <div id="divFoto" style="float:left">
                        <img src="fotos_produtos/' . $produto->getFoto() . '"width="150px height="100px" />
                        </div>'
                    . '<div style="float:left;margin:3%">'
                    . '<div>' . $produto->getNome() . '</div>'
                    . '<div>' . $produto->getDescricao() . '</div>'
                    . '<div>R$ ' . $produto->getPreco() . '</div>'
                    . '</div>'
                    . '<div style="float:right">'
                   
                    . '<a class="botao" href="ingredientesProdutos.php">Ingredientes</a>'
                  
                    . '</div>'
                    . '</div>'
                    ;
                }
            }
            ?>
        </div>
    </body>
</html>
