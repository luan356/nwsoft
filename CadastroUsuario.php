<?php
include("env.php");

class Cadastro {
  public function CadastroUsuario($cpf_no_valid, $nome,$senha,$email,$perfil){

    $conn = new Conection;
    $mysqli = $conn->ConnMysqli();

    $cpf =  $this->validaCpf($cpf_no_valid);

    if ($cpf) {  
        $query = "CALL cadastrar_usuario('$cpf', '$senha', '$perfil', '$nome', '$email', @resultado)";
      
        $mysqli->query($query);
        $resultado = $mysqli->query("SELECT @resultado")->fetch_assoc()['@resultado'];

        if ($resultado == 'Usuario cadastrado com sucesso') {
            header("Location: Vendedores.php" . "?conection=" . urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl']));
        } else {
            echo "Erro ao cadastrar Vendedor: " .$resultado ."<<>>". $mysqli->error;
        }
    }else{
        echo "cpf nao atende aos requisitos";
    }

}

function validaCpf($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
        
    if (strlen($cpf) == 11) {
        return $cpf;
    } else {
        return false;
    }
  }
}

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$perfil = $_POST['perfil'];

$cadastro = new Cadastro();
$cadastro->CadastroUsuario($cpf, $nome, $senha,$email,$perfil);
?>
