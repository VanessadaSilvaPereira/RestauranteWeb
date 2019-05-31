<?php

class IngredientesProduto {

private $id, $ingrediente, $produto;
    
  
function getId() {
    return $this->id;
}

function getIngrediente() {
    return $this->ingrediente;
}

function getProduto() {
    return $this->produto;
}

function setId($id) {
    $this->id = $id;
}

function setIngrediente($ingrediente) {
    $this->ingrediente = $ingrediente;
}

function setProduto($produto) {
    $this->produto = $produto;
}


}
