<?php
session_start(); // permite o envio de dados de uma página php para outra 
include("conection.php");

if (empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['nome'])) {
    header('Location: ../login.html');
    exit();
}

$usuario = mysqli_real_escape_string($connection, $_POST['email']);
$senha = mysqli_real_escape_string($connection, $_POST['senha']);
$nome = mysqli_real_escape_string($connection, $_POST['nome']);

$query = "INSERT INTO `usuarios` (`usuario`,`usuario_nome`,`senha`) VALUES ('{$usuario}','{$nome}', md5('{$senha}'))"; //md5 criptografa a senha

$result = mysqli_query($connection, $query);

header('Location: ../login.html');
