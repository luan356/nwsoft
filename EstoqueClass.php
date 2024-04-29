<?php
include("env.php");

class Estoque {
    public function showEstoque(){
        $conn = new Conection;
        $mysqli = $conn->ConnMysqli();

        $select = " SELECT nome, tipo,valor, COUNT(nome) AS quantidade
        FROM estoque
        GROUP BY nome, tipo;
        ";
        $sql = $mysqli->query($select) or die('falha na execução da consulta: ' . $mysqli->error);

        $resultados = array();
        while ($row = $sql->fetch_assoc()) {
            $resultados[] = $row;
        }

        return $resultados;
    }

    public function validaEstoquista($id){

        $conn = new Conection;
        $mysqli = $conn->ConnMysqli();

        $select = " SELECT id,perfil FROM usuarios where id ='$id'";
        $sql = $mysqli->query($select) or die('falha na execução da consulta: ' . $mysqli->error);
        $row = $sql->fetch_assoc();

        

      

        return $row;
        
    }
}
