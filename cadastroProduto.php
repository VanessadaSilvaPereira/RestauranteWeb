<!DOCTYPE html>
<?php
require './model/clsProduto.php';
require './model/clsCategoria.php';
require './model/clsIngrediente.php';
require './dao/clsProdutoDAO.php';
require './dao/clsCategoriaDAO.php';
require './dao/clsIngredienteDAO.php';
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

    <div style="width: 60%; height:100%; margin-left:20%;">

        <form action="controller/salvarProduto.php?inserir" method="POST">
            <div id="div01Pro">

                <div style="margin: 1%;">
                    <div>
                        <div style="float: left">
                            <div style="margin:1%;">
                                <div><label>Nome:</label></div>
                                <div><input type="text" name="txtNome" value="" required maxlength="100"></div>
                            </div>


                            <div style="margin: 1%;"><div><label>Foto:</label></div>
                                <div><input type="file"></div>
                            </div>
                            <div class="limparFloat"></div>
                            <div style="margin: 1%;">
                                <div><label>Descrição:</label></div>
                                <div><input type="text" name="txtDescricao" value="" required maxlength="100"></div>
                            </div>
                            <div class="limparFloat"></div>
                            <div style=" margin: 1%;">
                                <div><label>Preço:</label></div>
                                <div><input type="text" name="txtPreco" value="" required maxlength="100"></div>
                            </div>

                            <div style="margin: 1%;">
                                <label>Selecionar Categoria</label>
                                <div><select style="width: 50%" name="categoria" >
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


                            <div >
                                <input class="botao" type="submit" value="Salvar">
                            </div>
                        </div>
                        <div id="divIngredientes" style="border: solid black 2px;float: right">
                             <h3 style="text-align: center"><i>Ingredientes</i></h3>
                             <?php
                             $lista = IngredienteDAO::getIngredientes();

                             if ($lista->count() == 0) {
                                 echo '<h2><b>Nenhum Ingrediente cadastrado</b></h2>';
                             } else {
                                 ?>
                                <div id="divListaIngrediente">
                                    <?php
                                    foreach ($lista as $ingrediente) {
                                        echo '<div><input type="checkbox" value="" id="ingrediente" />' . $ingrediente->getNome() . '</div>';
                                    }
                                    ?>
                                </div>

                                <?php
                            }
                            ?>
                        </div>


                        </form>
                    </div>
                </div>
            </div>

            </body>
            </html>
