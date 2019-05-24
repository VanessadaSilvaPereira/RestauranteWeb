<?php
    include_once 'model/clsProduto.php';
    include_once 'model/clsIngredientesProduto.php';
    include_once 'dao/clsIngredienteProdutoDAO.php';
    include_once 'dao/clsConexao.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1 align="center">Ingredientes do Produto</h1>
        <br><br><br>
        <!--pedido->produto
        item-ingredientesProduto
        produto-ingrediente
        -->
        <?php
            $idProduto = $_REQUEST['idProduto'];
            $lista = IngredienteProdutoDAO::getIngredientesProduto($idProduto);
            
            if(count($lista) == 0 ){
                echo '<h3>O produto não possui ingredientes!</h3>';
            } else {
                echo '<table border="1"> ';
                echo '  <tr> ';
                echo '      <th>Código do Ingrediente</th> ';
              
                echo '      <th>Nome</th> ';
             
                echo '  </tr> ';
                $total = 0;
                foreach ($lista as $ingredientesProduto) {
                    echo '<tr>';
                    echo '  <td>'.$ingredientesProduto->getIngrediente()->getId().'</td>';
                   
                    echo '  <td>'.$ingredientesProduto->getNome().'</td>';
                   
                    
                  
                    echo '</tr>';  
                }
               
                echo '</table> ';
            }
        ?>
        
        
    </body>
</html>