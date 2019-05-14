<!DOCTYPE html>
<?php
include_once 'model/clsCategoria.php';
include_once 'dao/clsCategoriaDAO.php';
include_once 'dao/clsConexao.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    </head>
    <body class="bodyFundoMadeira">
        <?php
            require_once 'menu.php';
            
            $lista =CategoriaDAO::getCategorias();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhuma  Categorias cadastrada</b></h2>';
            }else {
        ?>
        
        <div id="divListaCategorias">
            <?php 
                foreach ($lista as $categoria) {
                    echo $categoria->getNome().'<br>';            
                }
            ?>
        </div>
      
        <?php
          }
        ?>
        
        <a id="botaoConfig" href="config.php"></a>
        <div class="limparFloat"></div>
        
    </body>
</html>