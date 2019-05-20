<?php

class StatusDAO {
    
    public static function inserir($status) {
        $sql = "INSERT INTO status (nome) VALUES ( "
                . " '".$status->getNome()."' )";
              
        
        Conexao::executar($sql);
    }
   
    public static function getStatus() {
        $sql = "SELECT * FROM status";
        $result = Conexao::consultar($sql);

        $lista = new ArrayObject();
        if ($result != NULL) {
            while (list($_id, $_nome) = mysqli_fetch_row($result)) {
                
                $status = new Status();
                $status->setId($_id);
                $status->setNome($_nome);
                $lista->append($status);
            }
            
        }
        return $lista;
    }   
}
