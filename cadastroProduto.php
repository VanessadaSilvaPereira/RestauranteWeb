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
        <form enctype="multipart/form-data" action="controller/salvarProduto.php?inserir" method="POST">
            
            <!--$foto = "sem_foto.png";-->
           <div id="div01Pro">

                <div style="margin: 1%;">
                    <div>
                        <div style="float: left">
                            <div style="margin:1%;">
                                <label>Nome:</label>
                                <div><input type="text" name="txtNome" value="" required maxlength="100"></div>
                            </div>

                            <div style="margin: 1%;">
                                <label>Foto:</label>
                                <div><input type="file" name="foto"></div>
                            </div>

                            <div style="margin: 1%;">
                                <label>Descrição:</label>
                                <div><input type="text" name="txtDescricao" value="" required maxlength="100"></div>
                            </div>

                            <div style=" margin: 1%;">
                                <label>Preço:</label>
                                <div><input type="text" name="txtPreco" value="" required maxlength="100"></div>
                            </div>

                            <div style="margin: 1%;">
                                <label>Selecionar Categoria</label>
                                <div><select style="width: 50%" name="categoria" >
                                        <option  value="0">Selecione...</option>
                                        <?php
                                        $listaCat = CategoriaDAO::getCategorias();
                                        foreach ($listaCat as $cat) {
                                            $selecionar = "";
                                            if ($idCategoria == $cat->getId()) {
                                                $selecionar = " selected ";
                                            }
                                            echo '<option ' . $selecionar . 'value="' . $cat->getId() . '" >' .
                                            $cat->getNome() . '</option>';
                                        }
                                        ?>
                                    </select></div></div>
                            <div><input class="botao" type="submit" value="Salvar"></div>

                        </div>
                        <div id="divIngredientes" style="border: solid black 2px;float: right">
                            <h3 style="text-align: center"><i>Ingredientes</i></h3>
                            <?php
                            $listaIng = IngredienteDAO::getIngredientes();

                            if ($listaIng->count() == 0) {
                                echo '<h2><b>Nenhum Ingrediente cadastrado</b></h2>';
                            } else {
                                foreach ($listaIng as $ingrediente) {
                                    echo
                                    '<div>'
                                    . '<input type="checkbox" value="" id="ingrediente" />'
                                    . $ingrediente->getNome()
                                    . '</div>';
                                }
                            }
                            ?>
                        </div>
  
            
        </form>
        
           
                       
                    </div>
                </div>
            </div>

            </body>
            </html>
