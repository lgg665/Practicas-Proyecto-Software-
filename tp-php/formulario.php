<?php

require_once "conexion.php";

$modoEdicion = false;

$usuario = [
    "id" => "",
    "nombre" => "",
    "apellido" => "",
    "correo" => "",
    "edad" => ""
];


if (isset($_GET["id"])) {

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

    $modoEdicion = true;
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>
        <?= $modoEdicion ? "Modificar usuario" : "Nuevo usuario" ?>
    </title>

    <link
        rel="stylesheet"
        href="css/estilos.css">

</head>

<body>

<main class="contenedor">

    <section class="panel formulario">

        <h1>
            <?= $modoEdicion
                ? "✎ Modificar usuario"
                : "👤 Nuevo usuario" ?>
        </h1>


        <form
            action="guardar.php"
            method="POST"
            onsubmit="return validarFormulario();">


            
            <input
                type="hidden"
                name="id"
                value="<?= htmlspecialchars($usuario["id"]) ?>">


            <div>
                <label for="nombre">
                    Nombre
                </label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    placeholder="Ingresa un nombre"
                    value="<?= htmlspecialchars($usuario["nombre"]) ?>">
            </div>
            <div>
                <label for="apellido">
                    Apellido
                </label>

                <input
                    type="text"
                    id="apellido"
                    name="apellido"
                    placeholder="Ingresa un apellido"
                    value="<?= htmlspecialchars($usuario["apellido"]) ?>">
            </div>


            <div class="campo-completo">
                <label for="correo">
                    Correo electrónico
                </label>

                <input
                    type="email"
                    id="correo"
                    name="correo"
                    placeholder="Ingresa el correo electrónico"
                    value="<?= htmlspecialchars($usuario["correo"]) ?>">
            </div>
            <div>
                <label for="edad">
                    Edad
                </label>

                <input
                    type="number"
                    id="edad"
                    name="edad"
                    placeholder="Ingresa la edad"
                    value="<?= htmlspecialchars($usuario["edad"]) ?>">
            </div>

            <div class="botones">

                <button
                    type="submit"
                    class="btn-guardar">

                    💾 Guardar

                </button>


                <a
                    href="index.php"
                    class="btn-cancelar">

                    ✕ Cancelar

                </a>

            </div>

        </form>

    </section>

</main>


<script src="js/validaciones.js"></script>

</body>

</html>