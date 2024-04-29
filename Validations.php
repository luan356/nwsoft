<?php



class Validation {

  public function validationLogin($user,$pass,$Conn){
    if (isset($user) && isset($pass)) {
        if(empty($user)){
          echo "é necessario preencher seu usuario";
        }else if(empty($pass)){
          echo "é necessario preencher sua senha";
        }else{

     
            $select = "SELECT id from usuarios WHERE cpf = '$user' and senha = '$pass'" ;
              $sql = $Conn->query($select) or die('faile na executeichon'. $Conn->error);


              if ($sql->num_rows == 1) {

                $row = $sql->fetch_assoc();

                $conection = mt_rand(); 
                header("Location: home.html?conection=" . $conection."&prfl=".$row['id']); 
              }else{
                echo "erro ao logar";
              }


          }
  }
}
}
?>