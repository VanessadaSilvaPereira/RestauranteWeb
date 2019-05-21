<!DOCTYPE html>
<?php
    include_once 'model/clsProduto.php';
    include_once 'dao/clsIngredienteProdutoDAO.php';
    include_once './model/clsIngredientesProduto.php';
    include_once 'dao/clsConexao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        ?>
        <h1 align="center"></h1>
        <br><br><br>
        <?php
            $idIngredienteProduto = $_REQUEST['idIngredienteProduto'];
            $lista = IngredienteProdutoDAO::getIngredientesProduto($idIngredienteProduto);
            
            if(count($lista) == 0 ){
                echo '<h3>O produto não possui ingredientes!</h3>';
            } else {
                echo '<table border="1"> ';
                echo '  <tr> ';
                echo '      <th>Código do Produto</th> ';
                echo '      <th>Nome</th> ';
                echo '  </tr> ';
                $total = 0;
                foreach ($lista as $item) {
                    echo '<tr>';
                    echo '  <td>'.$item->getProduto()->getId().'</td>';
                   
                       
                    echo '  <td>'.$item->getProduto()->getNome().'</td>';
                   
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
