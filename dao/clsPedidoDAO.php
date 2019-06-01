<?php

class PedidoDAO {

    public static function inserir($pedido) {
        $sql = " INSERT INTO pedidos "
                . " ( horario,codMesa, codStatus) "
                . " VALUES ( "
                . " '" . $pedido->getHorario() . "' , "
                . " '" . $pedido->getCodMesa()->getId() . "' , "
                . "  " . $pedido->getStatus()->getId() . "  ) ";

        $idPedido = Conexao::executarComRetornoId($sql);
        return $idPedido;
    }

    public static function getPedidos() {

        $sql = " SELECT p.id, p.codMesa,p.codStatus,          "
                . " DATE_FORMAT( p.hora, '%d/%m/%Y %H:%i:%s' ) , "
                . " ( SELECT SUM( i.preco * i.quantidade )          "
                . "     FROM itens i                                "
                . "     INNER JOIN pedidos p ON i.codPedido = p.id  "
                . "     WHERE i.codPedido = p.id ) AS valor         "
                
                . " FROM pedidos p                                  "
                . "ORDER BY p.hora DESC                  ";

        $result = Conexao::consultar($sql);

        $lista = new ArrayObject();

        while (list( $id, $mesa, $status, $data, $valor ) = mysqli_fetch_row($result)) {

            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setMesa($mesa);
            $pedido->setStatus($status);
            $pedido->setHorario($data);
            $pedido->setValor($valor);
            $lista->append($pedido);
        }
        return $lista;
    }

}
