<?php

class IngredienteProdutoDAO {

    public static function getIngredientesProduto($idProduto) {
        $sql = "SELECT p.nome, "
                . " i.id "
                . " FROM produtos p "
                . " INNER JOIN ingredientes_produtos i ON i.codProduto = p.id "
                . " WHERE i.codProduto = " . $idProduto;
        echo $sql;
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();

        while (list($codPro, $nome, $codIngredienteProduto) = mysqli_fetch_row($result)) {
            $produto = new Produto();
            $produto->setId($codPro);
            $produto->setNome($nome);

            $ingredienteProduto = new IngredienteProduto();
            $ingredienteProduto->setId($codIngredienteProduto);
            $ingredienteProduto->setProduto($produto);
            
            $lista->append($ingredienteProduto);
        }
        return $lista;
    }
}