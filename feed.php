<?php
include('./php/verifica_login.php');
include('./php/conection.php');

$query = "select * from artes";
$result = mysqli_query($connection, $query);
//var_dump($result->fetch_array(MYSQLI_NUM));

?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art On Haul</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./produtos.css">
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./cabecalho.css">
    <link rel="stylesheet" href="./feed.css">


</head>

<body>
    <header class="cabecalho">
        <img class="logo responsive" src="img/logo.png" alt="logodosite" style="height: 150px;">
        <h1>Galeria</h1>
        <a class="bars" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <img src="./img/bars-solid.png" class="response" alt="" width="40px" height="30px" style="image-rendering: pixelated;">
        </a>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Navegação</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="lista-offCanvas">
                    <a class="link" role="button" href="./index.html">
                        <li class="lista-offCanvas-item"> Início </li>
                    </a>
                    <a class="link" role="button" href="login.html">
                        <li class="lista-offCanvas-item"> Login/Cadastro </li>
                    </a>
                    <a class="link" role="button" href="suaPagina.php">
                        <li class="lista-offCanvas-item"> Sua área </li>
                    </a>
                    <a class="link" role="button" href="feed.php">
                        <li class="lista-offCanvas-item"> Feed</li>
                    </a>
                </ul>
            </div>
        </div>
        </div>

    </header>

    <h1 id="Pinturas" style="margin-left: 20px;">Feed</h1>

    <section class="produtos container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Imagens</th>
                    <th scope="col">Descrição</th>

                </tr>
            </thead>
            <tbody>
        <!-- DAQUI PARA BAIXO NÃO ENCOSTE -->
                <?php while ($artes = $result->fetch_array()) {      ?>
                    <tr>
                        <td>
                            <div class="card produto" style="opacity: 1;">
                                <img src="img/feed/<?php echo $artes['arte_nome'] ?>" class="card-img-top produto_img" alt="...">
                                <h5 class="card-title">
                                    <?php
                                        $end = strpos($artes['arte_nome'], '@'); //localização do @ na minha string
                                        echo substr($artes['arte_nome'], 0, $end) //corts a minha string do começo ao @
                                    ?>
                                </h5>
                                <div class="card-footer">
                                    <p class="card-text"><small class="text-muted"> <?php echo $artes['autor'] . " / " . $artes['data_post'] ?></small></p>
                                </div>
                            </div>

                        </td>
                        <td style="vertical-align:middle;">
                            <h4 class="desc"> <?php echo $artes['desc']  ?></h4>
                        </td>
                    <?php } ?>
                    </tr>


            </tbody>
        </table>

        <div class="desc">

        </div>

    </section>



</body>

</html>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="index.js"></script>