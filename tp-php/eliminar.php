<?php

require_once "conexion.php";


if (!isset($_GET["id"])) {

    header("Location: index.php");

    exit;

}


$id = intval($_GET["id"]);


$sql = "DELETE FROM usuarios WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();


header("Location: index.php");

exit;

?>