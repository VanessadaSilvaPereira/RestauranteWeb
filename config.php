<link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<script src="jquery-3.3.1.js"></script>
<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) {
    include_once 'model/clsCategoria.php';
    include_once 'dao/clsCategoriaDAO.php';
    include_once 'dao/clsConexao.php';
    include_once 'dao/clsMesaDAO.php';
    include_once 'model/clsMesa.php';
    include_once 'dao/clsStatusDAO.php';
    include_once 'model/clsStatus.php';
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Configurações</title>


        </head>
        <body>
            <h1 class="titulo">Configurações</h1>
            <div style=" width:50%; margin-left: 25%;border: solid black 2px">
                <form>
                    <div style="margin: 2%;">
                        <label>Selecionar Mesa</label>
                        <div>
                            <select name="mesa">
                                <option  value="0">-</option>
                                <?php
                                $lista = MesaDAO::getMesas();
                                foreach ($lista as $mes) {
                                    $selecionar = "";
                                    if ($idMesa == $mes->getId()) {
                                        $selecionar = " selected ";
                                    }
                                    echo '<option ' . $selecionar . 'value="' . $mes->getId() . '" >' .
                                    $mes->getNome() . '</option>';
                                }
                                ?>
                            </select>
                            <input type="submit" value="ok" class="botao">
                        </div>
                    </div>
                </form>

                <div style="margin: 2%">
                    <form action="controller/salvarCategoria.php?inserir" method="POST">
                        <div>
                            <label>Cadastrar Categoria</label>
                        </div>
                        <input id="inputNomeCategoria" type="text" name="txtCategoria" value="" required maxlength="100">
                        <input class="btnAdd"type="submit" value="">
                    </form>

                    <form action="controller/salvarIngrediente.php?inserir" method="POST">
                        <div>
                            <label>Cadastrar Ingrediente</label>
                        </div>
                        <input id="inputNomeIngrediente" type="text" name="txtIngrediente" value="" required maxlength="100">
                        <input class="btnAdd"type="submit" value="">
                    </form>

                    <form action="controller/salvarMesa.php?inserir" method="POST">
                        <div>
                            <label>Cadastrar Mesa</label>
                        </div>
                        <input id="inputNomeMesa" type="text" name="txtMesa" value="" required maxlength="100">
                        <input class="btnAdd"type="submit" value="">
                    </form>

                    <form action="controller/salvarStatus.php?inserir" method="POST">
                        <div>
                            <label>Cadastrar Status</label>
                        </div>
                        <input id="inputNomeStatus" type="text" name="txtStatus" value="" required maxlength="100">
                        <input class="btnAdd"type="submit" value="">
                        </div>
                    </form>

                    <div style="float: right"><a class="botao" href="cadastroProduto.php">Cadastrar Produto</a></div>

                    <a href="menu.php" ><div class="btnVoltar" style="float: left"></div></a>
                </div>
  <?php
    } else {
        header("Location: index.php");
    }
    ?>
        </body>
      
</html>
