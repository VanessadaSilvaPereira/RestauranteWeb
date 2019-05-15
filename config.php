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
        <script src="jquery-3.3.1.js"></script>
    <h1  class="titulo">Configurações</h1>
</head>
<body>

   
    <div style="text-align: center;">
        <div><label>Selecionar Mesa</label></div>
        <div><select name="mesa">
             <option value="0">Selecione...</option>
             <option value >teste<option>
            </select></div>
    </div>
    
    
     

    <div style="margin-top:2%; margin-bottom: 2%;text-align: center">
        <div><label>Trocar Senha</label></div>
        <div><label>Senha atual:</label>
            <input type="text"></div>
        <label>Nova Senha:</label>
        <input type="text">
    </div>


    <form action="controller/salvarCategoria.php?inserir" method="POST">
        <div style="text-align: center;">
            <label>Cadastrar Categoria</label>
            <input id="inputNomeCategoria" type="text" name="txtNome">
            <input id="btnSalvarCategoria"type="submit" value="">

        </div>
    </form>
    
</div>

<button id="botaoCadastro" onclick="window.location = 'cadastroProduto.php'" >Cadastrar Produto</button>
</body>
</html>
