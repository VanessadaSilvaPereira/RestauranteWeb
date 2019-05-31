<?php

class ProdutoDAO {

    public static function inserir($produto) {
        $sql = "INSERT INTO produtos ( nome,foto, preco,codCategoria, descricao ) VALUES ( "
                . " '" . $produto->getNome() . "' ,"
                . " '" . $produto->getFoto() . "' ,"
                . " " . $produto->getPreco() . " ,"
                . " " . $produto->getCategoria()->getId() . " ,"
                . " '" . $produto->getDescricao() . "' )";

        Conexao::executar($sql);
    }

//    public static function getProdutos() {
//        $sql = "SELECT id, nome,foto, preco,descricao FROM produtos";
//        $result = Conexao::consultar($sql);
//        $lista = new ArrayObject();
//        if ($result != NULL) {
//            while (list($_id, $_nome, $_foto, $_preco, $_descricao) = mysqli_fetch_row($result)) {
//                $produto = new Produto();
//                $produto->setId($_id);
//                $produto->setNome($_nome);
//                $produto->setFoto($_foto);
//                $produto->setPreco($_preco);
//                $produto->setDescricao($_descricao);
//                $lista->append($produto);
//            }
//        }
//        return $lista;
//    }
    
     public static function getProdutos($idCategoria){
        $sql = "SELECT p.id, p.nome, p.foto, p.preco, p.descricao"
             . " FROM produtos p "
             . " WHERE p.codCategoria = " . $idCategoria;

        $result = Conexao::consultar( $sql );
        $lista = new ArrayObject();
        
        while( list($_id, $_nome, $_foto, $_preco,$_descricao) 
                = mysqli_fetch_row($result)) {
            $produto = new Produto();
            $produto->setId($_id);
            $produto->setNome($_nome);
            $produto->setFoto($_foto);
            $produto->setPreco($_preco);
            $produto->setDescricao($_descricao);
            $lista->append($produto);
        }
        return $lista;     
    }

    public static function getProdutoByCategoria($codCategoria) {
        $sql = " SELECT p.id, p.nome, p.foto, p.descricao, p.preco "
                . " FROM produtos p "
                . " WHERE p.codCategoria = " . $codCategoria;

        $result = Conexao::consultar($sql);

        list( $cod, $nome, $foto, $descricao, $preco) = mysqli_fetch_row($result);
       
        $produto = new Produto();
        $produto->setId($cod);
        $produto->setNome($nome);
        $produto->setFoto($foto);
        $produto->setDescricao($descricao);
        $produto->setPreco($preco);

        return $produto;
    }

}
