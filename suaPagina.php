<?php
include('./php/verifica_login.php');
include('./php/conection.php');

if (isset($_FILES['arquivo']) && isset($_POST['nome']) && isset($_POST['desc'])) {
    //pega o POST da página
    $FileExtension = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novoNome  = $_POST['nome'] . "@" . $_SESSION['nome'] .  $FileExtension;
    $diretorio = 'img/feed/';

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novoNome); //salva no diretorio img/feed

    $query = "INSERT INTO artes VALUES 
            (null, '{$_SESSION['nome']}','{$novoNome}',NOW(),'{$_POST['desc']}','{$FileExtension}', {$_SESSION['id']} ); ";
    //var_dump($query);

    mysqli_query($connection, $query);
    header("location:listagem.php");
}

$query = "select * from artes where autor = '{$_SESSION['nome']}'";
//var_dump($query);
$result = mysqli_query($connection, $query);
//var_dump($result);


?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua área</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./produtos.css">
    <link rel="stylesheet" href="./cabecalho.css">
    <link rel="stylesheet" href="./suaPagina.css">

</head>

<body>
    <header class="cabecalho">
        <img class="logo responsive" src="img/logo.png" alt="logodosite" style="height:150px;">
        <h1>Galeria Online</h1>
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
                        <li class="lista-offCanvas-item">Login/Cadastro</li>
                    </a>
                    <a class="link" role="button" href="suaPagina.php">
                        <li class="lista-offCanvas-item">Sua área</li>
                    </a>
                    <a class="link" role="button" href="feed.php">
                        <li class="lista-offCanvas-item">Feed</li>
                    </a>
                </ul>
            </div>
        </div>
        </div>

    </header>

    <main id="main-suaPagina">

        <img src="./img/user.png" alt="" class="user-img" style="width: 100px; height: 100px">
        <h1 id="tituloPagina">
            Bem vinda(o) <?php echo $_SESSION['nome']; ?>
        </h1>
        <a style="margin: 10px; vertical-align: middle;" href="listagem.php" class="btn btn-primary">Gerenciar posts &#8594;</a>
        <br>
        <hr>
        <form action="suaPagina.php" method="POST" enctype="multipart/form-data" id="upload-imagem">

            <div class="form-floating">
                <input required type="text" class="form-control" id="nome" name="nome" placeholder="Minha arte">
                <label for="floatingInput">Nome da obra</label>
            </div>
            <div class="form-floating">
                <textarea required class="form-control" name="desc" placeholder="Descrição da sua imagem" id="desc"></textarea>
                <label for="desc">Descrição</label>
            </div>

            <div>
                <input required class="form-control" name="arquivo" type="file" id="arquivo">
            </div>

            <br>
            <br>

            <input type="submit" value="enviar" class="btn primary">
        </form>
        <br>
        <hr>

        <div class="titulobloco">
            <h1>Adicionados Pelo Usuário</h1>
        </div>

        <section class="produtos">


            <?php while ($artes = $result->fetch_array()) {      ?>

                <div class="card produto" style="width: 18rem;">
                    <img src="img/feed/<?php echo $artes['arte_nome'] ?>" class="card-img-top produto_img" alt="...">
                    <h5 class="card-title">
                        <?php
                        $end = strpos($artes['arte_nome'], '@'); //localização do @ na minha string
                        echo substr($artes['arte_nome'], 0, $end) //corta a minha string do começo ao @
                        ?>
                    </h5>
                    <div class="card-footer">
                        <p class="card-text"><small class="text-muted">
                                <?php echo $artes['autor'] . " / " . $artes['data_post'] ?></small></p>
                    </div>
                </div>
            <?php } ?>

           
        </section>
    </main>

</body>

</html>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="index.js"></script>