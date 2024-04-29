<?php
include("env.php");



class Compra {
    public function finalizaCompra(int $pedido, int $finaliza){


        $conn = new Conection;
        $mysqli = $conn->ConnMysqli();



        $update = "UPDATE vendas SET vendido = '$finaliza' WHERE pedido = '$pedido' and vendido = '0'";



        if ($mysqli->query($update)) {
          header("Location: Vendas.php"."?conection=".urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl']));
        } else {
          echo "Erro ao Finalizar Venda : " . $mysqli->error;    
        }
      



    }

  
}

$pedido= $_GET['pedido'];
$finaliza=$_GET['fnl'];

$compra = new Compra;
$finaliza = $compra->finalizaCompra($pedido,$finaliza);





?>