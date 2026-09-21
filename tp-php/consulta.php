<?php

require_once "conexion.php";


if (!isset($_GET["id"])) {

    die("Usuario no especificado.");

}


$id = intval($_GET["id"]);


$sql = "SELECT * FROM usuarios WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();


if ($resultado->num_rows === 0) {

    die("Usuario no encontrado.");

}


$usuario = $resultado->fetch_assoc();

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Consulta de usuario</title>

    <link
        rel="stylesheet"
        href="css/estilos.css">

</head>

<body>

<main class="contenedor">

    <section class="panel">

        <h1>👤 Consulta de usuario</h1>


        <div class="datos-usuario">

            <p>
                <strong>Nombre:</strong>
                <?= htmlspecialchars($usuario["nombre"]) ?>
            </p>

            <p>
                <strong>Apellido:</strong>
                <?= htmlspecialchars($usuario["apellido"]) ?>
            </p>

            <p>
                <strong>Correo:</strong>
                <?= htmlspecialchars($usuario["correo"]) ?>
            </p>

            <p>
                <strong>Edad:</strong>
                <?= htmlspecialchars($usuario["edad"]) ?>
            </p>

        </div>


        <a
            href="index.php"
            class="btn-cancelar">

            ← Volver

        </a>

    </section>

</main>

</body>

</html>