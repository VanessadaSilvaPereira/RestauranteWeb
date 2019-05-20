<?php

class ProdutoDAO {

    public static function inserir($produto) {
        $sql = "INSERT INTO produtos ( nome,foto, preco,codCategoria, descricao ) VALUES ( "
                . " '" . $produto->getNome() . "' ,"
                . " '" . $produto->getFoto() . "' ,"
                . " " . $produto->getPreco() . " ,"
                . " " . $produto->getCategoria()->getId(). " ,"
                . " '" . $produto->getDescricao() . "' )";

        Conexao::executar($sql);
    }
    public static function getProdutos() {
        $sql = "SELECT * FROM produtos";
        $result = Conexao::consultar($sql);

        $lista = new ArrayObject();
        if ($result != NULL) {
            while (list($_id, $_nome,$_foto, $_preco, $_descricao) = mysqli_fetch_row($result)) {

                $produto = new Produto();
                $produto->setId($_id);
                $produto->setNome($_nome);
//                $produto->setFoto($_foto);
                $produto->setPreco($_preco);
                $produto->setDescricao($_descricao);
                $lista->append($produto);
            }
        }
        return $lista;
    }

}
