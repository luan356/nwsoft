<?php

include("env.php");

class Delete {
  public function DeleteVendedor($id){

    $conn = new Conection;
    $mysqli = $conn->ConnMysqli();



    $del=  "DELETE FROM usuarios WHERE id ='$id' and perfil = 'vendedor'";


    if($mysqli->query($del)){
      header("Location: Vendedores.php"."?conection=".urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl']));
    } else {
      echo "erro ao Deletar Vendedor";
    }
}
}

    $id = $_GET['id'];

  $delete = new Delete();
  $delete->DeleteVendedor($id);
  
  ?>

