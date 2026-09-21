<?php

require_once "conexion.php";

$sql = "SELECT * FROM usuarios ORDER BY id";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Listado de usuarios</title>

    <link
        rel="stylesheet"
        href="css/estilos.css">

</head>

<body>

<main class="contenedor">

    <section class="panel">

        <h1>👥 Listado de usuarios</h1>

        <table>

            <thead>

                <tr>

                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo electrónico</th>
                    <th>Edad</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                <?php while ($usuario = $resultado->fetch_assoc()): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($usuario["nombre"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($usuario["apellido"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($usuario["correo"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($usuario["edad"]) ?>
                        </td>

                        <td class="acciones">

                            <!-- CONSULTAR -->

                            <a
                                class="btn btn-ver"
                                href="consulta.php?id=<?= $usuario["id"] ?>">

                                👁

                            </a>


                            <!-- MODIFICAR -->

                            <a
                                class="btn btn-editar"
                                href="formulario.php?id=<?= $usuario["id"] ?>">

                                ✎

                            </a>


                            <!-- ELIMINAR -->

                            <a
                                class="btn btn-eliminar"
                                href="eliminar.php?id=<?= $usuario["id"] ?>"
                                onclick="return confirmarEliminacion();">

                                🗑

                            </a>

                        </td>

                    </tr>

                <?php endwhile; ?>

            </tbody>

        </table>


        <a
            href="formulario.php"
            class="btn-nuevo">

            + Nuevo usuario

        </a>

    </section>

</main>


<script src="js/validaciones.js"></script>

</body>

</html>