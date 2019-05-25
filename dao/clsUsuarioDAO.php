<?php
class UsuarioDAO{
 public static function getUsuarios(){
        $sql = " SELECT id, nome, admin from usuarios ";        
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        while( list( $cod, $nome, $admin) = mysqli_fetch_row($result) ){
          
            $usuario = new Usuario();
            $usuario->setId($cod);
            $usuario->setNome($nome);
            $usuario->setAdmin($admin);
  
            $lista->append($usuario);
        }
        
        return $lista;
    }
    
    
   public static function getUsuarioById( $id ){
        $sql = " SELECT u.id, u.nome, u.admin "
             . " FROM usuarios u "
             . " WHERE u.id = ".$id 
             . " ORDER BY u.nome ";
        
        $result = Conexao::consultar($sql);
      
        list( $cod, $nome,$admin) = mysqli_fetch_row($result);
           
            $usuario = new Usuario();
            $usuario->setId($cod);
            $usuario->setNome($nome);
            $usuario->setAdmin($admin);
            
        return $usuario;
    }
  
    public static function logar($login, $senha){
        $sql = " SELECT id, nome, admin "
             . " FROM usuarios "
             . " WHERE nome = '".$login."'"
             . "     AND senha = '".$senha."'";
        $result = Conexao::consultar($sql);
        
        if( mysqli_num_rows( $result ) > 0 ){
            $dados = mysqli_fetch_assoc( $result );
            $usuario = new Usuario();
            $usuario->setId( $dados['id'] );
            $usuario->setNome( $dados['nome'] );
            $usuario->setAdmin( $dados['admin'] );
            return $usuario;
        } else {
            return NULL;
        }
        
    }
   }