<?php
session_start();
include('conection.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../login.html');


    exit();
}

$usuario = mysqli_real_escape_string($connection, $_POST['email']);
$senha = mysqli_real_escape_string($connection, $_POST['senha']);

$query = "select usuario_nome from usuarios where usuario = '{$usuario}' and senha = md5('{$senha}')";
$query_id = "select usuario_id from usuarios where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($connection, $query);
$result_id = mysqli_query($connection, $query_id);

$row = mysqli_num_rows($result);
$nome = $result->fetch_array(MYSQLI_NUM);
$id = $result_id->fetch_array(MYSQLI_NUM);
//echo $id[0];
//echo $nome[0];
if ($row == 1) {
    $_SESSION['nome'] = $nome[0];
    $_SESSION['id'] = $id[0];
    header('Location: ../feed.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../index.html');
    exit();
}
