<link href="CSS/estilos.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) {

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

            <?php
            if ($_SESSION['admin'] == FALSE) {
                echo'<a class="botao" href="meuPedido.php" style="position:relative;float:right">Meu Pedido</a>';
            }
            ?>
            
            <div class="limparFloat"></div>
            
            <div style="width:70%;margin-top:5%">

                <?php
                $listaPro = ProdutoDAO::getProdutos();
                if ($listaPro->count() == 0) {
                    echo '<h3>Nenhum Produto cadastrado</h3>';
                } else {
                    foreach ($listaPro as $produto) {
//                  $preco = str_replace(",", ".", $produto->getPreco());
                        echo
                        '<div class="limparFloat"></div>' .
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
        <!--<a href="menu.php" style="position: relative;"><div class="btnVoltar"></div></a>-->
        <?php
    } else {
        header('location: index.php');
    }
    ?>
</html>
