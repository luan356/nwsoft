<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Estoque</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .space-top {
            margin-top: 20px;
        }
        #comprar {
            margin-left: 5px; 
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col">
        <div class="row">
            <div class="col text-start">
                <a id='hom' href="home.html" class="btn btn-primary space-top" ><img src='img/house.svg' alt='home' width='24' height='24'></a>
            </div>
            <div class="col text-end">
                <a id='pst' href="CadastroEstoque.html" class="btn btn-primary space-top">Cadastrar Item</a>
            </div>
        </div>
    </div>
</div>

<div class="space-top"></div>

<table class="table table-striped">
    <thead>
    <tr>
        <th class ='text-center' scope="col">Nome</th>
        <th class ='text-center' scope="col">Tipo</th>
        <th class ='text-center' scope="col">Quantidade</th>
        <th class ='text-center'scope="col">Deletar Produto</th>
        <th class ='text-center' scope="col">Adicionar ao Pedido</th>

    </tr>
    </thead>
    <tbody>
    <?php
    include("EstoqueClass.php");
    $estoque = new Estoque();
    $resultados = $estoque->showEstoque(); 

    

    foreach ($resultados as $estoque) { 
        echo "
        <tr>
          "; 
        echo "
          <td class ='text-center'>" . $estoque['nome'] . "</td>
          "; 
        echo "
          <td class ='text-center'>" . $estoque['tipo'] . "</td>
          "; 
        echo "
          <td class ='text-center'>" . $estoque['quantidade'] . "</td>
          "; 
        echo "<td class ='text-center'><a href='DeleteEstoque.php?nome=" . $estoque['nome'] . "&conection=".urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl'])."' class='bi btn-danger' onclick='deleteEstoque()'><img src='img/trash.svg' alt='Excluir' width='24' height='24'></a></td>";
        echo "<td class ='text-center'><a href='Carrinho.php?nome=" . urlencode($estoque['nome']) . "&valor=" . urlencode($estoque['valor']) ."&conection=".urlencode($_GET['conection'])."&prfl=".urldecode($_GET['prfl'])."' class='bi btn-danger' onclick='addCarrinho()'><img src='img/bag-check.svg' alt='Comprar' width='24' height='24' id='comprar'></a></td>";
     
        echo "
        </tr>";
    } 
    ?>
    </tbody>
</table>
<script src="js/bootstrap.bundle.min.js"></script>

<script>
        function getUrlParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }
        const conectionId = getUrlParam("conection");
        const profileId = getUrlParam("prfl");

        const linkNovoCadastro = document.querySelector("#pst");
        const linkhome = document.querySelector("#hom");

        if (conectionId) {
            linkNovoCadastro.href += `?conection=${conectionId}&prfl=${profileId}`;
            linkhome.href += `?conection=${conectionId}&prfl=${profileId}`;


        }

        function addCarrinho() {
            window.alert("Produto adicionado ao pedido "+conectionId);
        }

        function deleteEstoque() {
            window.alert("Produto excluido ");
        }
    </script>


</body>
</html>
