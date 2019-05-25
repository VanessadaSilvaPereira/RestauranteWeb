<?php

class IngredienteProdutoDAO {
    
    
     public static function inserir( $ingredienteProduto ){
        $sql = " INSERT INTO ingredientesProduto "
             . " (codProduto, codIngrediente,nome) "
             . " VALUES ( "
             . $ingredienteProduto->getProduto()->getId()  . " , "
             . $ingredienteProduto->getIngrediente()->getId() . " , "
             . $ingredienteProduto->getNome()       . "  ) ";
        Conexao::executar($sql);
    }

    public static function getIngredientesProduto($idProduto) {
        $sql = "SELECT p.nome, "
                . " i.id "
                . " FROM produtos p "
                . " INNER JOIN ingredientes_produtos i ON i.codProduto = p.id "
                . " WHERE i.codProduto = " . $idProduto;
//        echo $sql;
         
       $result = Conexao::consultar($sql);
       Conexao::executar($sql);
        $lista = new ArrayObject();
        
    
        while (list($nome, $codIngredienteProduto) = mysqli_fetch_row($result)) {
            $produto = new Produto();
            $produto->setNome($nome);

            $ingredienteProduto = new IngredienteProduto();
            $ingredienteProduto->setId($codIngredienteProduto);
            $ingredienteProduto->setProduto($produto);
            
            $lista->append($ingredienteProduto);
        }
        return $lista;
         
    }
    
}