<?php
include("env.php");


class Vendas {
  public function carrinhoVendas(int $valor,string $nome, int $pedido,$vendedor) {
    $conn = new Conection;
    $mysqli = $conn->ConnMysqli();

    $select = "SELECT * FROM vendas WHERE pedido = '$pedido'";
    $sql = $mysqli->query($select) or die('faile na executeichon'. $mysqli->error);

    if ($sql->num_rows == 1) {
      $row = $sql->fetch_assoc();
      $payload = json_decode($row['payload'], true);

      $new_payload = array(
        'nome' => $nome,
        'valor' => $valor
      );

      $merged_payload = json_encode(array_merge_recursive($new_payload, $payload));
      $update = "UPDATE vendas SET payload = '$merged_payload',
      vendido = '0'
       WHERE pedido = '$pedido'";

      if ($mysqli->query($update)) {
        $this->atualizaEstoque($nome);
        header("Location: Estoque.php"."?conection=".urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl']));
      } else {
        echo "Erro ao inserir venda: " . $mysqli->error;    
      }
    } else {
      $payload = json_encode(array(
        'nome' => $nome,
        'valor' => $valor
      ));

      $insert = "INSERT INTO vendas (pedido, valor_total, vendedor, payload,vendido) VALUES ('$pedido', '$valor', '$vendedor', '$payload',0)";

      if ($mysqli->query($insert)) {
        $this->atualizaEstoque($nome);

        header("Location: Estoque.php"."?conection=".urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl']));
      }else{
        echo "Erro ao inserir venda: " . $mysqli->error;    

      }
    }
  }

  public function atualizaEstoque(string $item) {
    $conn = new Conection;
    $mysqli = $conn->ConnMysqli();

    $del = "DELETE FROM estoque WHERE nome = '$item' ORDER BY id DESC LIMIT 1";

    if ($mysqli->query($del)) {
      header("Location: Estoque.php"."?conection=".urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl']));
    } else {
      echo "Erro ao deletar item";
    }
  }
}

$valor = $_GET['valor'];
$nome = $_GET['nome'];
$pedido = $_GET['conection'];
$vendedor = $_GET['prfl'];


$venda = new Vendas();
$venda->carrinhoVendas($valor, $nome, $pedido,$vendedor);
?>
