<?php
class Usuario{
    private $id, $nome, $senha, $admin;
        
    function __construct($id, $nome, $senha, $admin) {
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->admin = $admin;
    }
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSenha() {
        return $this->senha;
    }

    function getAdmin() {
        return $this->admin;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }
}

