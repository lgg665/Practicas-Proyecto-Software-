function validarFormulario() {

    const nombre =
        document.getElementById("nombre").value.trim();

    const apellido =
        document.getElementById("apellido").value.trim();

    const correo =
        document.getElementById("correo").value.trim();

    const edad =
        document.getElementById("edad").value;


    if (nombre === "") {

        alert("Ingrese el nombre.");

        return false;
    }


    if (apellido === "") {

        alert("Ingrese el apellido.");

        return false;
    }


    if (correo === "") {

        alert("Ingrese el correo electrónico.");

        return false;
    }


    if (!correo.includes("@")) {

        alert("Ingrese un correo electrónico válido.");

        return false;
    }


    if (edad === "") {

        alert("Ingrese la edad.");

        return false;
    }


    if (edad < 1 || edad > 120) {

        alert("La edad debe estar entre 1 y 120.");

        return false;
    }


    return true;
}


function confirmarEliminacion() {

    return confirm(
        "¿Está seguro que desea eliminar el usuario?"
    );

}