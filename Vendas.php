<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vendas</title>
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
           
        </div>
    </div>
</div>

<div class="space-top"></div>

<h7>*Apenas os pedidos que estao no Status Pendentes*</h7>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Pedido</th>
        <th scope="col">Valor</th>
        <th scope="col">Vendedor</th>
        <th  class ='text-center' scope="col">Concluir a Compra</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include("VendasClass.php");
    $vendas = new Pedidos();
    $resultados = $vendas->pedidoVendas(); 

    $id =$_GET['prfl'];  
    $result = $vendas->validaVendedor($id);
    foreach ($resultados as $vendas) { 


        echo "
        <tr>
          "; 
        echo "
          <td>" . $vendas['pedido'] . "</td>
          "; 
        echo "
          <td>" . $vendas['valor_total'] . "</td>
          "; 
        echo "
          <td>" . $vendas['vendedor'] . "</td>
          "; 
         
          if ($result['perfil'] === 'admin' || $result['perfil'] === 'vendedor') {

        echo "<td class ='text-center'><a href='Pedido.php?pedido=" . $vendas['pedido'] . "&conection=".urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl'])."' class='bi btn-danger'><img src='img/eye.svg' alt='pedido' width='24' height='24'></a></td>";
          }else{
        echo "<td></td>"; 
   }        echo "
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

    const linkhome = document.querySelector("#hom");

    if (conectionId) {
        let linkHref = "home.html?conection=" + conectionId;
        if (profileId) {
            linkHref += "&prfl=" + profileId;
        }
        linkhome.href = linkHref;
    }
</script>


</body>
</html>
