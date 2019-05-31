<?php

class IngredienteProdutoDAO {
    
   //insert into ingredientes_produtos (codIngrediente, codProduto) VALUES(1 , 18)
     public static function inserir( $ingredienteProduto ){
        $sql = " INSERT INTO ingredientesProduto "
             . " (codProduto, codIngrediente,nome) "
             . " VALUES ( "
             . $ingredienteProduto->getProduto()->getId()  . " , "
             . $ingredienteProduto->getIngrediente()->getId() . " , "
             . $ingredienteProduto->getNome()       . "  ) ";
        Conexao::executar($sql);
    }
public static function getIngredientesProdutos($idProduto){
        $sql = "SELECT  p.nome "
             . " FROM ingredientes p "
             . " INNER JOIN ingredientes_produtos i ON i.codIngrediente = p.id "
             . " WHERE i.codProduto = " . $idProduto;
        $result = Conexao::consultar( $sql );
        $listaIng = new ArrayObject();
//        echo $sql;
        while( list($nome) = mysqli_fetch_row($result)) {
            $ingredientesProduto = new IngredientesProduto();
           
            $ingredientesProduto->setIngrediente($nome);
            //FALTAVA ESSA LINHA TBM
             $listaIng->append($ingredientesProduto);
        }
        return $listaIng;
                   
                
    }
}