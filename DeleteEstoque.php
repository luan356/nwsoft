<?php

include("env.php");

class DeleteEstoque {
  public function deleteItem($item){

    $conn = new Conection;
    $mysqli = $conn->ConnMysqli();

    $del=  "DELETE FROM estoque WHERE nome = '$item' ORDER BY id DESC LIMIT 1    ";


    if($mysqli->query($del)){
      header("Location: Estoque.php"."?conection=".urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl']));
      echo "erro ao Deletar Item";
    }


}
}

$item = $_GET['nome'];

  $delete = new DeleteEstoque();
  $del = $delete->deleteItem($item);
  
  ?>

