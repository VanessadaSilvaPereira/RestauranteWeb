<?php

class Produto {
    private $id, $nome, $foto, $preco, $categoria, $descricao;
    
    
    function __construct($id=NULL, $nome=NULL, $foto=NULL, $preco=NULL, $categoria=NULL, $descricao=NULL) {
        $this->id = $id;
        $this->nome = $nome;
        $this->foto = $foto;
        $this->preco = $preco;
        $this->categoria = $categoria;
        $this->descricao = $descricao;
    }
    
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getFoto() {
        return $this->foto;
    }

    function getPreco() {
        return $this->preco;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }




    }
