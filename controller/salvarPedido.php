<?php

include_once '../model/clsCategoria.php';
include_once '../model/clsProduto.php';
include_once '../model/clsPedido.php';
include_once '../dao/clsPedidoDAO.php';
include_once '../dao/clsProdutoDAO.php';
include_once '../dao/clsConexao.php';

if( isset($_REQUEST['inserir']) ){

    session_start();
    include_once '../model/clsProduto.php';
    include_once '../model/clsItem.php';
    include_once '../dao/clsItemDAO.php';

    date_default_timezone_set('America/Sao_Paulo');
    $horario = date("Y-m-d H:i:s");
    
    $pedido = new Pedido();
    $pedido->setHorario($horario);

    $idPedido = PedidoDAO::inserir($pedido);
    $pedido->setId( $idPedido );
    foreach ($_SESSION['pedido'] as $idProduto => $qtd) {
        $produto = ProdutoDAO::getProdutoById($idProduto);
        $item = new Item();
        $item->setProduto($produto);
        $item->setPedido($pedido);
        $item->setPreco( $produto->getPreco() );
        $item->setQuantidade( $qtd );
        ItemDAO::inserir( $item );
        
    }
    unset($_SESSION['pedido']);
    
    header("Location: ../pedidos.php");
    
}





