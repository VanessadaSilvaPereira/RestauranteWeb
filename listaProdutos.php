
<link href="CSS/estilos.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<script src="jquery-3.3.1.js"></script>
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
        <body>
            <?php
            if ($_SESSION['admin'] == FALSE) {
                echo'<a class="botao" href="meuPedido.php" style="position:relative;float:right">Meu Pedido</a>';
            }
            ?>
            <!--<div style="position:relative;height: 5%"></div>-->
            
            <div><a href="menu.php" ><div class="btnVoltar" style="position: relative"></div></a></div>

            <div style="width:100%;">

    <?php
    $codCategoria = $_REQUEST['idCategoria'];
    $listaPro = ProdutoDAO::getProdutos($codCategoria);

    if ($listaPro->count() == 0) {
        echo '<h3>Nenhum Produto cadastrado</h3>';
    } else {
        foreach ($listaPro as $produto) {
            $preco = str_replace(".", ",", $produto->getPreco());
            echo
            '<div class="limparFloat"></div>' .
            '<div id="divItem">
                        <div id="divFoto">
                        <img src="fotos_produtos/' . $produto->getFoto() . '"width="150px height="100px" />
                        </div>'
            . '<div style="float:left;margin:1%">'
            . '<div id="divNome">' . $produto->getNome() . '</div>'
            . '<div style="width:150px;">' . $produto->getDescricao() . '</div>'
            . '<div>R$ ' . $preco . '</div>'
            . '</div>'
            . '<div style="float:right">'
            . '<div style="margin-top:10%">'
            . '<a class="botao" href="ingredientesProduto.php?adicionar&idProduto=' . $produto->getId() . '">Ingredientes</a>'
            . '</div>'
            . '<div style="margin-top:10%">'
            . '<a class="botao" href="meuPedido.php?adicionar&idProduto='
            . $produto->getId() . '">Adicionar</a></div>'
            . '</div>'
            . '</div>';
        }
    }
    ?>

            </div>

        </body>

    <?php
} else {
    header('location: index.php');
}
?>
</html>
