
<!DOCTYPE html>
<html>
    <?php
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    ?>
    <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <head>
        <meta charset="UTF-8">
        <title>Restaurante</title>
    </head>
    
    <body id="bodyIndex">
        <?php
        
        if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) {
            ?>
            <div>
                <a href="menu.php"><button id="button01">Faça seu Pedido</button></a>
            </div>
            <?php
        } else {
            ?>
        
            <div id="divFormLogar">
                <form action="entrar.php" method="POST" >
                    <div><label>Login:</label></div>
                    <input type="text" name="txtLogin" required placeholder="" />
                    <div><label>Senha:</label></div>
                    <input type="password" name="txtSenha" required placeholder="" />
                    <div><input type="submit" value="Entrar" class="botao"/></div>
                </form>
            </div>
            <?php
            if (isset($_REQUEST['loginInvalido'])) {
                echo '<h5>Login ou senha incorretos!</h5>';
            }
        }
        ?>
    </body>

</html>
