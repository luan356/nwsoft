<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vendedores</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .space-top {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">

        <div class="col text-star">
                <a id='hom' href="home.html" class="btn btn-primary space-top" ><img src='img/house.svg' alt='home' width='24' height='24'></a></a>
            </div>
          
            <div class="col text-end">
                <a id='pst' href="CadastroUsuario.html" class="btn btn-primary space-top">Novo Cadastro</a>
            </div>
        </div>
        <div class="space-top"></div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("VendedoresClass.php");
                    $vendedores = new Vendedores();
                    $resultados = $vendedores->showVendedores(); 
                    foreach ($resultados as $vendedor) { 
                        echo "
                        <tr>
                            "; 
                        echo "
                            <td>" . $vendedor['id'] . "</td>
                            "; 
                        echo "
                            <td>" . $vendedor['cpf'] . "</td>
                            "; 
                        echo "
                            <td>" . $vendedor['nome'] . "</td>
                            "; 
                            echo "
                            <td>" . $vendedor['perfil'] . "</td>
                            "; 
                        echo "<td><a href='DeleteVendedor.php?id=" . $vendedor['id'] ."&conection=".urldecode($_GET['conection'])."&prfl=".urldecode($_GET['prfl']). "' class='bi btn-danger'><img src='img/trash.svg' alt='Excluir' width='24' height='24'></a></td>";
                        echo "
                        </tr>
                        ";
                    } 
                ?>
            </tbody>
        </table>
    </div>
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
    </script>
</body>
</html>
