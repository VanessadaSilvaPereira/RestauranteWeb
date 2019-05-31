<?php

class IngredienteDAO {
    
    public static function inserir($ingrediente) {
        $sql = "INSERT INTO ingredientes ( nome ) VALUES ( "
                . " '" . $ingrediente->getNome() . "' )";
              
        Conexao::executar($sql);
    }
    public static function getIngredientes() {
        $sql = "SELECT * FROM ingredientes";
        $result = Conexao::consultar($sql);

        $lista = new ArrayObject();
        if ($result != NULL) {
            while (list($_id, $_nome) = mysqli_fetch_row($result)) {
                $ingrediente = new Ingrediente();
                $ingrediente->setId($_id);
                $ingrediente->setNome($_nome);
                $lista->append($ingrediente);
            }
        }
        return $lista;
    }   
    
    
}
