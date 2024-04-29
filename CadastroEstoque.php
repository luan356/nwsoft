<?php
include("env.php");

class CadastroEstoque {
  public function cadastroItem($nome,$tipo,$valor){

    $conn = new Conection;
    $mysqli = $conn->ConnMysqli();



    $insert = "INSERT INTO estoque (nome, tipo,valor) VALUES ('$nome', '$tipo','$valor')";

    if($mysqli->query($insert)){
      header("Location: Estoque.php"."?conection=".urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl']));
    } else {
      echo "erro ao Cadastrar Item";
    }
}
}

    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];

    
  $cadastro = new CadastroEstoque();
  $cadastro->cadastroItem($nome, $tipo,$valor);
  
  
  ?>

