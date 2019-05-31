<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) {

    include_once 'model/clsPedido.php';
    include_once 'dao/clsPedidoDAO.php';
    include_once 'dao/clsConexao.php';
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>

            <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        </head>

        <body>
            <h1 class="titulo">Todos os Pedidos</h1>

            <a href="menu.php"  ><div class="btnVoltar"></div></a>
                <?php
                $lista = PedidoDAO::getPedidos();
                if (count($lista) == 0) {
                    echo '<h3>Não existem pedidos cadastrados!</h3>';
                } else {
                    foreach ($lista as $pedido) {
                        echo '<div style="float:left;margin:5%">' . $pedido->getId() . '</div>';
                        echo '<div style="float:left;margin:5%">Horário: ' . $pedido->getHorario() . '</div>';
                        echo '<div style="float:left;margin:5%">Status: ' . $pedido->getStatus(). '</div>';
                        echo '<div style="float:left;margin:5%">Mesa:' . $pedido->getMesa() . '</div>';
                        echo '<div style="float:left;margin:5%">Valor: ' . $pedido->getValor() . '</div>';

                        echo '<div class="limparFloat"><a href="itens.php?idPedido=' . $pedido->getId() . '" >'
                        . '         <button>Ver Produtos</button></a></div>';
                    }
                }
                ?>

        </body>
        <?php
    } else {
        header('LOCATION: index.php');
    }
    ?>
</html>
