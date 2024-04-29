<?php
include("env.php");

class Pedidos {
    public function pedidoVendas(){
        $conn = new Conection;
        $mysqli = $conn->ConnMysqli();

        $select = " SELECT pedido,valor_total,payload,vendedor,vendido  FROM vendas WHERE vendido = '0' ";
        $sql = $mysqli->query($select) or die('falha na execução da consulta: ' . $mysqli->error);

        $resultados = array();
        while ($row = $sql->fetch_assoc()) {
            $resultados[] = $row;
        }

        return $resultados;
    }

    public function showIdPayload(int $pedido){

       $conn = new Conection;
        $mysqli = $conn->ConnMysqli();

        $select = " SELECT payload,vendido FROM vendas WHERE pedido = '$pedido' ";
        $sql = $mysqli->query($select) or die('falha na execução da consulta: ' . $mysqli->error);

        $resultados = array();
        while ($row = $sql->fetch_assoc()) {
            $resultados[] = $row;
        }

        return $resultados;

    }

    public function validaVendedor($id){

        $conn = new Conection;
        $mysqli = $conn->ConnMysqli();

        $select = " SELECT id,perfil FROM usuarios where id ='$id'";
        $sql = $mysqli->query($select) or die('falha na execução da consulta: ' . $mysqli->error);
        $row = $sql->fetch_assoc();

      

        return $row;
        
    }
    public function relatorioVendas(){
        $conn = new Conection;
        $mysqli = $conn->ConnMysqli();

        $select = " SELECT pedido,valor_total,payload,vendedor,vendido  FROM vendas";
        $sql = $mysqli->query($select) or die('falha na execução da consulta: ' . $mysqli->error);

        $resultados = array();
        while ($row = $sql->fetch_assoc()) {
            $resultados[] = $row;
        }

        return $resultados;
    }
}
