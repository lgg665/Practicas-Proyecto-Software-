document
    .getElementById("eventoForm")
    .addEventListener("submit", agregarEvento);


function agregarEvento(event) {

    event.preventDefault();


    // =========================
    // OBTENER DATOS
    // =========================

    var fechaInicio =
        document.getElementById("fechaInicio").value;

    var fechaFin =
        document.getElementById("fechaFin").value;

    var titulo =
        document.getElementById("tituloEvento").value;


    // =========================
    // VALIDAR
    // =========================

    if (
        fechaInicio === "" ||
        fechaFin === "" ||
        titulo.trim() === ""
    ) {
        return;
    }


    if (fechaFin < fechaInicio) {

        alert(
            "La fecha de finalización no puede ser anterior a la fecha de inicio."
        );

        return;
    }


    // =========================
    // BUSCAR DÍAS
    // =========================

    var diaInicio =
        document.querySelector(
            '.dia[data-fecha="' + fechaInicio + '"]'
        );


    var diaFin =
        document.querySelector(
            '.dia[data-fecha="' + fechaFin + '"]'
        );


    if (
        diaInicio === null ||
        diaFin === null
    ) {

        alert(
            "Las fechas deben pertenecer a agosto de 2013."
        );

        return;
    }


    // =========================
    // OBTENER SEMANAS
    // =========================

    var semanaInicio =
        diaInicio.parentElement;

    var semanaFin =
        diaFin.parentElement;


    // Por ahora permitimos que
    // el evento esté dentro de
    // una misma semana.

    if (semanaInicio !== semanaFin) {

        alert(
            "Para esta versión, el evento debe estar dentro de una misma semana."
        );

        return;
    }


    // =========================
    // DETERMINAR COLUMNAS
    // =========================

    var diasSemana =
        semanaInicio.querySelectorAll(".dia");


    var columnaInicio = -1;

    var columnaFin = -1;


    for (
        var i = 0;
        i < diasSemana.length;
        i++
    ) {

        if (
            diasSemana[i] === diaInicio
        ) {

            columnaInicio = i + 1;
        }


        if (
            diasSemana[i] === diaFin
        ) {

            columnaFin = i + 2;
        }

    }


    // =========================
    // CREAR EVENTO
    // =========================

    var nuevoEvento =
        document.createElement("div");


    nuevoEvento.className =
        "evento evento-verde";


    nuevoEvento.textContent =
        titulo;


// =========================
// CALCULAR POSICIÓN
// =========================

var anchoColumna = 100 / 7;


var posicion =
    (columnaInicio - 1) *
    anchoColumna;


var cantidadColumnas =
    columnaFin - columnaInicio;


var ancho =
    cantidadColumnas *
    anchoColumna;


// =========================
// POSICIONAR EVENTO
// =========================

nuevoEvento.style.left =
    posicion + "%";


nuevoEvento.style.width =
    ancho + "%";


// =========================
// AGREGAR EVENTO
// =========================

semanaInicio.appendChild(
    nuevoEvento
);


    // =========================
    // LIMPIAR FORMULARIO
    // =========================

    document
        .getElementById("fechaInicio")
        .value = "";


    document
        .getElementById("fechaFin")
        .value = "";


    document
        .getElementById("tituloEvento")
        .value = "";

}