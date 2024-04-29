<?php
//  eu  escolhi o nome para esse arquivo foi env pois é o nome que mais se assemelha com os arquivos que usamos diariamente.//
class Conection {

  public function ConnMysqli(){

    $user = "root";
    $pwd = "123456"; 
    $database = "nwsoft";
    $host = "localhost";

    $mysqli = new mysqli($host, $user, $pwd, $database);

    if ($mysqli->connect_error) {
      die("Falha na conexão com o banco de dados: " . $mysqli->connect_error);

  }
  return $mysqli;
  
}

}

