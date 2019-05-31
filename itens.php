<?php
require './dao/clsItemDAO.php';
require 'dao/clsConexao.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <h1 align="center">Itens do Pedido</h1>
       
        <?php
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
        ?>
        
    </body>
</html>
