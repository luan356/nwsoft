<?php

include("env.php");
include("Validations.php");

// conexao com o banco
$conn = new Conection;
$mysqli = $conn->ConnMysqli();



// validação de login
$user = $_POST['usuario'];
$pass = $_POST['senha'];

$validation = new Validation;
$validation->validationLogin($user,$pass,$mysqli);

?>