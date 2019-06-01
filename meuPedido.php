<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) {
    include_once 'dao/clsConexao.php';
    include_once 'dao/clsProdutoDAO.php';
    include_once 'model/clsProduto.php';
    include_once 'model/clsCategoria.php';
    ?>

    <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script src="jquery-3.3.1.js"></script>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Meu Pedido</title>
        </head>
        <body>

            <h1  class="titulo">Meu Pedido</h1>
            <div style="width: 50%;margin-left: 25%;">
                <?php
                if (!isset($_SESSION['pedido']) ||
                        count($_SESSION['pedido']) == 0) {
                    echo '<h3>Não há pedidos!</h3>';
                } else {
                    echo '<table border="1" >';
                    echo '  <tr>';
                    echo '      <th>Código</th>';
                    echo '      <th>Foto</th>';
                    echo '      <th>Nome</th>';
                    echo '      <th>Quantidade</th>';
                    echo '      <th>Preço</th>';
                    echo '      <th>Subtotal</th>';
                echo '      <th>Remover</th>';
                    echo '  </tr>';
                    $total = 0;
                    foreach ($_SESSION['pedido'] as $id => $qtd) {
                        $produto = ProdutoDAO::getProdutoById($id);
                        echo ' <tr>';
                        echo '      <td>' . $produto->getId() . '</td>';
                        echo '      <td><img width="50px" src="fotos_produtos/' . $produto->getFoto() . '" /></td>';
                        echo '      <td>' . $produto->getNome() . '</td>';
                        echo '      <td>' . $qtd . ' | <a href="meuPedido.php?remover&'
                        . 'idProduto=' . $produto->getId() . '"><button>-</button></a> | '
                        . '<a href="meuPedido.php?adicionar&'
                        . 'idProduto=' . $produto->getId() . '"><button>+</button></a> | </td>';

                        echo '      <td>R$ ' . $produto->getPreco() . '</td>';

                        $subtotal = $qtd * $produto->getPreco();

                        $total += $subtotal;
                        echo '      <td>R$ ' . $subtotal . '</td>';
                        echo '      <td><a href="meuPedido.php?excluir&idProduto='
                        . $produto->getId() . '" ><button>Excluir</button></a></td>';
                        echo ' </tr>';
                    }
                    echo '  <tr>';
                    echo '      <th colspan="4">Total:</th>';
                    echo '      <th colspan="3">R$ ' . $total . '</th>';
                    echo '  </tr>';
                    echo '</table>';

                    echo '<hr> '
                    . '<a href="finalizarPedido.php">'
                    . '       <button>Finalizar Pedido</button></a>';
                }
                ?>
                <form>
                    <div style="text-align: center">
                        <label>Observações:</label>
                    </div>

                    <div>
                        <input type="text" id="obs">
                    </div>

                    <div style="float: right">
                        <button class="botao">Cancelar</button>
                        <button class="botao">Enviar Pedido</button>
                    </div>
                    <div class="limparFloat"></div>
                </form>
                <a onclick="window.history.go(-1)" ><div class="btnVoltar"></div></a>

            </div>
        </body>
    </html>
    <?php
} else {
    header('location:index.php');
}
?>
</html>
