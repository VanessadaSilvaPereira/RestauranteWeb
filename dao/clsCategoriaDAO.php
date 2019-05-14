<?php

class CategoriaDAO {
    
    public static function inserir($categoria) {
        $sql = "INSERT INTO faleConosco ( nome ) VALUES ( "
                . " '" . $categoria->getNome() . "' )";
              
        Conexao::executar($sql);
    }
    public static function getCategorias() {
        $sql = "SELECT * FROM categorias";
        $result = Conexao::consultar($sql);

        $lista = new ArrayObject();
        if ($result != NULL) {
            while (list($_id, $_nome) = mysqli_fetch_row($result)) {
                
                $categoria = new Categoria();
                $categoria->setId($_id);
                $categoria->setNome($_nome);
                $lista->append($categoria);
            }
        }
        return $lista;
    }   
}
