<?php

class Pedido {

    private $id, $horario, $valor, $mesa, $status;
    
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getHorario() {
        return $this->horario;
    }

    function getValor() {
        return $this->valor;
    }

    function getMesa() {
        return $this->mesa;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setMesa($mesa) {
        $this->mesa = $mesa;
    }

    function setStatus($status) {
        $this->status = $status;
    }


}