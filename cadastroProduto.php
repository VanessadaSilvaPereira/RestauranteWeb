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

    <h1 class="titulo">Cadastro de Produto</h1>
</head>
<body>

    <div style="width: 30%; height:100%; margin-left: 30%;">

        <div>
            <button class="botao" onclick="window.location = 'listaIngredientes.php'">Ingredientes</button>
        </div>
        <div class="limparFloat"></div>
        <form>
            <div style="margin: 1%;">
                <!--fazer uma função javascript para contar os caracteres -->
                <div>
                    <div><label>Foto:</label></div>
                    <div style="width: 100px; height: 100px; border: solid black 2px">
                        <div style="margin-left:120px "><input type="file"></div>
                    </div>

                    <div style="margin-left: 120px; margin-top: -50px">
                        <div><label>Nome:</label></div>
                        <div><input type="text" name="txtNome" value="" required maxlength="100"></div>
                    </div>

                    <div style="margin: 1%;">
                        <div><label>Descrição:</label></div>
                        <div><input type="text" name="txtDescricao" value="" required maxlength="100"></div>
                    </div>

                    <div style=" margin: 1%;">
                        <div><label>Preço:</label></div>
                        <div><input type="text" name="txtPreco" value="" required maxlength="100"></div>
                    </div>

                    <div style="margin: 1%;">
                        <div><label>Selecionar Categoria</label></div>
                        <div><select style="width: 50%" name="Categoria">
                                <option  value="0">Selecione...</option>
                                <?php
                                $lista = CategoriaDAO::getCategorias();
                                foreach ($lista as $cat) {
                                    $selecionar = "";
                                    if ($idCategoria == $cat->getId()) {
                                        $selecionar = " selected ";
                                    }
                                    echo '<option ' . $selecionar . 'value="' . $cat->getId() . '" >' .
                                    $cat->getNome() . '</option>';
                                }
                                ?>
                            </select></div></div>


                    <div style="float: right">
                        <input class="botao" type="submit" value="Salvar">
                    </div>
                    </form>
                </div>

                </body>
                </html>
