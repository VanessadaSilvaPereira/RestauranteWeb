<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) {
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

        <body style="background-image: url(imagens/madeira2.jpg)">
            
            <h1  class="titulo">Meu Pedido</h1>
            
            <div style="width: 50%;margin-left: 25%;">
                
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
                
                <a href="listaProdutos.php">
                    <div class="btnVoltar"></div>
                </a>
            </div>

        </body>
        <?php
    } else {
        header('location:index.php');
    }
    ?>
</html>
