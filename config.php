<!DOCTYPE html>
<?php
include_once 'model/clsCategoria.php';
include_once 'dao/clsCategoriaDAO.php';
include_once 'dao/clsConexao.php';
include_once './dao/clsMesaDAO.php';
include_once './model/clsMesa.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Configurações</title>
        <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <script src="jquery-3.3.1.js"></script>
    <h1  class="titulo">Configurações</h1>
</head>
<body>


    <div style="text-align: center">

        <div style="margin-bottom: 1%"> <div><label>Selecionar Mesa</label></div>
            <div><select name="mesa">
                    <option value="0">Selecione...</option>
                    <?php
                    $lista = MesaDAO::getMesas();

                    foreach ($lista as $mes) {
                        $selecionar = "";
                        if ($idMesa == $mes->getId()) {
                            $selecionar = " selected ";
                        }

                        echo '<option ' . $selecionar . ' value="' . $mes->getId() . '" >' .
                        $mes->getNome() . '</option>';
                    }
                    ?>
                </select></div></div>






        <div style="margin-bottom: 2%">
            <div><label>Trocar Senha</label></div>
            <div>
                <label>Senha atual:</label>
                <input type="text">
            </div>
            <label>Nova Senha:</label>
            <input type="text">
        </div>

        <div style="margin-bottom: 1%">
            <form action="controller/salvarCategoria.php?inserir" method="POST">
                <label>Cadastrar Categoria</label>
                <input id="inputNomeCategoria" type="text" name="txtNome">
                <input class="btnAdd"type="submit" value="">
            </form></div>

        <div style="margin-bottom: 1%">
        <form action="controller/salvarIngrediente.php?inserir" method="POST">
            <label>Cadastrar Ingrediente</label>
            <input id="inputNomeIngrediente" type="text" name="txtNome">
            <input class="btnAdd"type="submit" value="">
        </form>
        </div>

        <div style="margin-bottom: 1%">
        <form action="controller/salvarMesa.php?inserir" method="POST">
            <label>Cadastrar Mesa</label>
            <input id="inputNomeMesa" type="text" name="txtNome">
            <input class="btnAdd"type="submit" value="">
            </div>
        </form>
        </div>

    </div>

    <button id="botaoCadastro" onclick="window.location = 'cadastroProduto.php'" >Cadastrar Produto</button>
</body>
</html>
