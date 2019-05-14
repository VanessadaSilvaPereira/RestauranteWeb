<!DOCTYPE html>
<?php
include_once 'model/clsCategoria.php';
include_once 'dao/clsCategoriaDAO.php';
include_once 'dao/clsConexao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Configurações</title>
        <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <h1  class="titulo">Configurações</h1>
</head>
<body class="bodyFundoMadeira">


    <div style="text-align: center;">
        <div><label>Selecionar Mesa</label></div>
        <div><select></select></div>
    </div>


    <div style="margin-top:5%; margin-bottom: 5%; border: solid black 2px;text-align: center">
        <div><label>Trocar Senha</label></div>
        <div><label>Senha atual:</label>
            <input type="text"></div>
        <label>Nova Senha:</label>
        <input type="text">
    </div>

    <div style="text-align: center;">
        <form action="controller/salvarCategoria.php?inserir" method="POST">
            <label>Cadastrar Categoria:</label>
            <input type="text" name="txtNome">
        <input type="submit" value="Salvar">
        
        </form>
    </div>
</div>




<button id="botaoCadastro" onclick="window.location = 'cadastroProduto.php'" >Cadastrar Produto</button>
</body>
</html>
