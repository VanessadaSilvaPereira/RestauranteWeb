<link href="CSS/Estilos.css" rel="stylesheet" type="text/css">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) {
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
           
        </head>
        
        <body>
            <h1 class="titulo">Cadastro de Produto</h1>

            <div style="width: 50%; margin-left:25%;border: solid black 2px">
                <form enctype="multipart/form-data" action="controller/salvarProduto.php?inserir" method="POST">
                    <div id="div01Pro">

                        <div style="margin: 1%;">
                            <div>
                                <div>
                                    
                                    <div style="margin:1%;">
                                        <label>Nome:</label>
                                        <div>
                                            <input type="text" name="txtNome" value="" required maxlength="100">
                                        </div>
                                    </div>

                                    <div style="margin: 1%;">
                                        <label>Foto:</label>
                                        <div>
                                            <input id="file" type="file" name="foto">
                                        </div>
                                    </div>

                                    <div style="margin: 1%;">
                                        <label>Descrição:</label>
                                        <div>
                                            <input type="text" name="txtDescricao" value="" required maxlength="100">
                                        </div>
                                    </div>

                                    <div style=" margin: 1%;">
                                        <label>Preço:</label>
                                        <div>
                                            <input type="text" name="txtPreco" value="" required maxlength="100">
                                        </div>
                                    </div>

                                    <div style="margin: 1%;">
                                        <label>Selecionar Categoria</label>
            <div>
                <select name="categoria" >
                <option value="0"  >-</option>
                <?php
                    $lista = CategoriaDAO::getCategorias();
                    
                    foreach ($lista as $cat){
                        $selecionar = "";
                        if( $idCategoria == $cat->getId() ){
                            $selecionar = " selected ";
                        }
                        
                        echo '<option '.$selecionar.' value="'.$cat->getId().'" >'.
                                $cat->getNome().'</option>';
                    }
                ?>
                
            </select>
            </div>
                                         <div id="divIngredientes" style="border: solid black 2px; margin-top: 1%">
                                    <h3 style="text-align: center">Ingredientes</h3>
                                    <?php
                                    $listaIng = IngredienteDAO::getIngredientes();
                                    if ($listaIng->count() == 0) {
                                        echo '<h3>Nenhum Ingrediente cadastrado</h3>';
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
                                        <div class="limparFloat"></div>
                                    </div>
                                    
                                    <div>
                                        <input class="botao" type="submit" value="Salvar">
                                    </div>
                                    
                                    <a href="config.php">
                                        <div class="btnVoltar"></div>
                                    </a>

                                </div>
                               
                            </div>
                        </div>
                    </div>
               </form>
            </div>
             
            <?php
        } else {
            header('location: index.php');
        }
        ?>
    </body>
</html>