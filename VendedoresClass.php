<?php
include("env.php");

class Vendedores {
    public function showVendedores(){
        $conn = new Conection;
        $mysqli = $conn->ConnMysqli();

        $select = "SELECT * from usuarios WHERE perfil in ('vendedor','estoquista')";
        $sql = $mysqli->query($select) or die('falha na execução da consulta: ' . $mysqli->error);

        $resultados = array();
        while ($row = $sql->fetch_assoc()) {
            $resultados[] = $row;
        }

        return $resultados;
    }
}
