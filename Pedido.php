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
      
        .total-row {
            font-weight: bold;
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

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Produto</th>
        <th scope="col">Valor</th>
        

    </tr>
    </thead>
    <tbody>
    <?php
    include("VendasClass.php");

    $pedido = $_GET['pedido'];

    $vendas = new Pedidos();
    $resultados = $vendas->showIdPayload($pedido); 

    $data = json_decode($resultados[0]['payload'], true);

    foreach ($data['nome'] as $i => $nome) { 
        $valor = $data['valor'][$i];
        echo "<tr><td>$nome</td><td>$valor</td></tr>";
    } 
    ?>
    </tbody>
    <tfoot>
    <tr class="total-row">
        <td>Valor Total</td>
        <td>
          <?php
                $valor_total = array_sum($data['valor']);
                echo $valor_total;
                ?>
            </td>
        </tr>
    </tfoot>
</table>
<a id="finaliza" href="FinalizarCompra.php" class="btn btn-primary space-top" >Finalizar Compra</a>
<script src="js/bootstrap.bundle.min.js"></script>

<script>
        function getUrlParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }
        const conectionId = getUrlParam("conection");
        const profileId = getUrlParam("prfl");
        const pedido = getUrlParam("pedido");


        const linkhome = document.querySelector("#hom");
        const linkfinaliza = document.querySelector("#finaliza");


        if (conectionId) {
            linkhome.href += `?conection=${conectionId}&prfl=${profileId}`;
            linkfinaliza.href += `?conection=${conectionId}&prfl=${profileId}&pedido=${pedido}&fnl=1`;


        }
</script>
</body>
</html>
