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
         <script src="jquery-3.3.1.js"></script>
    </head>
    <body>
        <?php
            $lista =CategoriaDAO::getCategorias();
            
            if ( $lista->count()==0){
                echo '<h2><b>Nenhuma  Categorias cadastrada</b></h2>';
            }else {
        ?>
        
        <div id="divListaCategorias">
            <?php 
                foreach ($lista as $categoria) {
                    echo '<a href="listaProdutos.php">'.$categoria->getNome().'<a>'.'<br>';            
                }
            ?>
        </div>
      
        <?php
          }
        ?>
        
        <a id="botaoConfig" href="config.php" onclick="teste()" ></a>
        
        <div class="limparFloat"></div>
        
    </body>
    <script>

    function teste() {
        var senha;
        
// alert("Digite a senha de Administrador!");
 senha = prompt("Digite a senha de administrador");
 
 if(senha === 123456){
     window.location("config.php");
 }else{
     window.location("menu.php");
 }
}

    </script>
</html>