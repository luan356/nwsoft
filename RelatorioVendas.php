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

<div class="row">
    <div class="col">
        <input type="text" id="searchInput" class="form-control space-top" placeholder="Pesquisar por pedido">
    </div>
</div>

<div class="space-top"></div>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Pedido</th>
        <th scope="col">Valor</th>
        <th scope="col">Vendedor</th>
        <th scope="col">Status</th>        
    </tr>
    </thead>
    <tbody>
    <?php
    include("VendasClass.php");
    $vendas = new Pedidos();
    $resultados = $vendas->relatorioVendas(); 


    foreach ($resultados as $vendas) { 

        $status = "";
        switch($vendas['vendido']){
            case '1':
                $status = "vendido";
                break;
            case '0':
                $status = "pendente";
                break;
        }
        echo "<tr>"; 
        echo "<td>" . $vendas['pedido'] . "</td>";
        echo "<td>" . $vendas['valor_total'] . "</td>";
        echo "<td>" . $vendas['vendedor'] . "</td>";
        echo "<td>" . $status . "</td>";
      
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

    function filterTable() {
        const searchText = document.getElementById("searchInput").value.toLowerCase();

        const rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            let found = false;
            row.querySelectorAll("td").forEach(cell => {
                const cellText = cell.textContent.toLowerCase();
                if (cellText.includes(searchText)) {
                    found = true;
                }
            });
            if (found) {
                row.style.display = ""; 
            } else {
                row.style.display = "none"; 
            }
        });
    }

    document.getElementById("searchInput").addEventListener("input", filterTable);
</script>

</body>
</html>
