<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Restaurante</title>
        <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    </head>
    <body id="bodyIndex">
        <?php
        session_start();
        if (!isset($_SESSION['logado']) && !$_SESSION['logado'] == TRUE) {
            
            ?>

            <div id="divFormLogar">
            <form action="entrar.php" method="POST" >
                <div><label>Login:</label></div>
            <input type="text" name="txtLogin" required placeholder="" />
            <div><label>Senha:</label></div>
            <input type="password" name="txtSenha" required placeholder="" />
            <div><input type="submit" value="Entrar"  id="btnEntrar"/></div>
            </form>
            </div>
            <?php
            if (isset($_REQUEST['loginInvalido'])) {
                echo '<h5>Login ou senha incorretos!</h5>';
            }
        } else {
            ?>
            <a href="sair.php" ><button  id="btnSair">Sair</button></a>
            <div>
                <a href="Menu.php"><button id="button01">Faça seu Pedido</button></a>
            </div>
            <?php
        }
        ?>
    </body>

</html>
