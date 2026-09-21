<?php

require_once "conexion.php";


$id = isset($_POST["id"])
    ? intval($_POST["id"])
    : 0;

$nombre = trim($_POST["nombre"] ?? "");
$apellido = trim($_POST["apellido"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$edad = intval($_POST["edad"] ?? 0);


// =========================
// VALIDACIONES PHP
// =========================

if (
    $nombre === "" ||
    $apellido === "" ||
    $correo === "" ||
    $edad <= 0
) {

    die("Todos los campos son obligatorios.");

}


if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

    die("El correo electrónico no es válido.");

}


if ($edad < 1 || $edad > 120) {

    die("La edad debe estar entre 1 y 120.");

}


// =========================
// MODIFICAR
// =========================

if ($id > 0) {

    $sql = "
        UPDATE usuarios
        SET
            nombre = ?,
            apellido = ?,
            correo = ?,
            edad = ?
        WHERE id = ?
    ";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssii",
        $nombre,
        $apellido,
        $correo,
        $edad,
        $id
    );


// =========================
// ALTA
// =========================

} else {

    $sql = "
        INSERT INTO usuarios
        (nombre, apellido, correo, edad)
        VALUES (?, ?, ?, ?)
    ";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssi",
        $nombre,
        $apellido,
        $correo,
        $edad
    );
}


if ($stmt->execute()) {

    header("Location: index.php");

    exit;

} else {

    echo "Error: " . $conn->error;

}

?>