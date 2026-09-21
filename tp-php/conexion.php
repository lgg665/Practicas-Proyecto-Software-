<?php

$host = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "tp_php";
$puerto = 3307;      

$conn = new mysqli(
    $host,
    $usuario,
    $password,
    $baseDatos,
    $puerto
);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>