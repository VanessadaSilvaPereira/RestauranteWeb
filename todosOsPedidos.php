<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) {

    include_once 'model/clsPedido.php';
    include_once 'dao/clsPedidoDAO.php';
    include_once 'dao/clsConexao.php';
    include './model/clsItem.php';
    include './dao/clsItemDAO.php';
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
                        echo '<div style="float:left;margin:5%">Mesa:' . $pedido->getMesa(). '</div>';
                        echo '<div style="float:left;margin:5%">Valor: ' . $pedido->getValor() . '</div>';

                        
                        
            $idPedido = $_REQUEST['idPedido'];
            $lista = ItemDAO::getItens($idPedido);
            
            if(count($lista) == 0 ){
                echo '<h3>O pedido não possui itens!</h3>';
            } else {
                echo '<table border="1"> ';
                echo '  <tr> ';
                echo '      <th >Código do Produto</th> ';
                echo '      <th>Foto</th> ';
                echo '      <th>Nome</th> ';
                echo '      <th>Quantidade</th> ';
                echo '      <th>Preço</th> ';
                echo '      <th>Subtotal</th> ';
                echo '  </tr> ';
                $total = 0;
                foreach ($lista as $item) {
                    echo '<tr>';
                    echo '  <td>'.$item->getProduto()->getId().'</td>';
                    echo '  <td> <img src="fotos_produtos/'
                        .$item->getProduto()->getFoto().'" ></td>';
                    echo '  <td>'.$item->getProduto()->getNome().'</td>';
                    echo '  <td>'.$item->getQuantidade().'</td>';
                    echo '  <td>R$ '.$item->getPreco().'</td>';
                    $subtotal = $item->getQuantidade() * $item->getPreco();
                    $total += $subtotal;
                    echo '  <td>'.$subtotal.'</td>';
                    echo '</tr>';  
                }
                echo '<tr> ';
                echo '  <th colspan="3">Total: </th>';
                echo '  <th colspan="3">R$ '.$total.' </th>';
                echo '</tr> ';
                echo '</table> ';
            }
                    
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
