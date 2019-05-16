<!DOCTYPE html>
<?php
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
        <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <script src="jquery-3.3.1.js"></script>
    <h1  class="titulo">Configurações</h1>
</head>
<body>
    <div style="width: 30%; height:100%; margin-left: 35%;">

        <div style="margin: 1%;text-align: center;"> <div><label>Selecionar Mesa</label></div>
            <div style="width:100%"><select name="mesa">
                    <option  value="0">Selecione...</option>
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
                </select></div></div>

        <div style="margin: 1%">
            <div><label>Trocar Senha</label></div>
            <div>
                <label>Senha atual:</label>
                <input style="margin-left: 1.5%" type="text">
            </div>
            <label>Nova Senha:</label>
            <input type="text">
        </div>


        <div style="margin: 2%">
            <form action="controller/salvarCategoria.php?inserir" method="POST">
                <div><label>Cadastrar Categoria</label></div>
                <input id="inputNomeCategoria" type="text" name="txtNome">
                <input class="btnAdd"type="submit" value="">
            </form>

            <form action="controller/salvarIngrediente.php?inserir" method="POST">
                <div><label>Cadastrar Ingrediente</label></div>
                <input id="inputNomeIngrediente" type="text" name="txtNome">
                <input class="btnAdd"type="submit" value="">
            </form>

            <form action="controller/salvarMesa.php?inserir" method="POST">
                <div><label>Cadastrar Mesa</label></div>
                <input id="inputNomeMesa" type="text" name="txtNome">
                <input class="btnAdd"type="submit" value="">
 </form>
                <form action="controller/salvarStatus.php?inserir" method="POST">
                    <div><label>Cadastrar Status</label></div>
                    <input id="inputNomeStatus" type="text" name="txtNome">
                    <input class="btnAdd"type="submit" value="">
                    </div>
</form>

               
                <button id="botaoCadastro" style="float: right" onclick="window.location = 'cadastroProduto.php'">
                    Cadastrar Produto
                </button>
        </div>

</body>
</html>
