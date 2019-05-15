<?php

class MesaDAO {
    
    public static function inserir($mesa) {
        $sql = "INSERT INTO mesas ( nome ) VALUES ( "
                . " '" . $mesa->getNome() . "' )";
              
        Conexao::executar($sql);
    }
    public static function getMesas() {
        $sql = "SELECT * FROM mesas";
        $result = Conexao::consultar($sql);

        $lista = new ArrayObject();
        if ($result != NULL) {
            while (list($_id, $_nome) = mysqli_fetch_row($result)) {
                
                $mesa = new Mesa();
                $mesa->setId($_id);
                $mesa->setNome($_nome);
                $lista->append($mesa);
            }
        }
        return $lista;
    }   
}
