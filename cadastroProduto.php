<!DOCTYPE html>
<?php
require './model/clsCategoria.php';
require './dao/clsCategoriaDAO.php';
require './dao/clsConexao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    </head>
    <body>
        <h1 class="titulo">Cadastro de Produto</h1>

        <div style="text-align:center">
            <form>
                <div style="margin-bottom: 1%;">
                    <div><label>Nome:</label></div>
                    <div><input type="text"></div>
                </div>

                <div style="margin-bottom: 1%;">
                    <div><label>Foto:</label></div>
                    <div><input type="file"></div>
                </div>

                <div style="margin-bottom: 1%;">
                    <div><label>Descrição:</label></div>
                    <div><input type="text" style="height:100px;width: 300px"></div>
                </div>

                <div style=" margin-bottom: 1%">
                    <div><label>Preço:</label></div>
                    <div><input type="text"></div>
                </div>

                <div  style="text-align: center"><input id="btnSalvarProduto" type="submit" value="Salvar"></div>
            </form>
             <div style="text-align: center">

        <div style="margin-bottom: 1%"> <div><label>Selecionar Categoria</label></div>
            <div><select name="Categoria">
                    <option value="0">Selecione...</option>
                    <?php
                    $lista = CategoriaDAO::getCategorias();

                    foreach ($lista as $cat) {
                        $selecionar = "";
                        if ($idCategoria == $cat->getId()) {
                            $selecionar = " selected ";
                        }
                        echo '<option ' . $selecionar . ' value="' . $cat->getId() . '" >' .
                        $cat->getNome() . '</option>';
                    }
                    ?>
                </select></div></div>

        </div>

    </body>
</html>
