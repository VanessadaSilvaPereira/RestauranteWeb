<!DOCTYPE html>
<?php
require './dao/clsIngredienteDAO.php';
require './dao/clsConexao.php';
require './model/clsIngrediente.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        
        <title></title>
         <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
         
    </head>
    <body>
        <h1 class="titulo">Ingredientes</h1>
         <?php
            $lista = IngredienteDAO::getIngredientes();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhum Ingrediente cadastrado</b></h2>';
            }else {
        ?>
        
        <div id="divListaIngrediente">
            <?php 
                foreach ($lista as $ingrediente) {
                    echo '<div id="ingrediente"><input type="checkbox" value="" />'.$ingrediente->getNome().'</div>';            
                }
            ?>
        </div>
      
        <?php
          }
        ?>
        <button>ok</button>
    </body>
</html>
