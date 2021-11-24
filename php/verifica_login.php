<?php
session_start();
if(!$_SESSION['nome']) {
	header('Location: ../login.html');
	exit();
}