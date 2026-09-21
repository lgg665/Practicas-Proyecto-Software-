function agregarMensaje() {

    // Obtener el usuario
    var usuario = document.getElementById("usuario_txt").value;

    // Obtener el mensaje
    var mensaje = document.getElementById("mensaje_txt").value;


    // Verificar que ambos campos tengan contenido
    if (usuario.trim() === "" || mensaje.trim() === "") {
        return;
    }


    // Obtener la lista de mensajes
    var chat = document.getElementById("chat");


    // Crear el nuevo <li>
    var newListItem = document.createElement("li");

    newListItem.className = "out";


    // Crear el avatar
    var imagen = document.createElement("img");

    imagen.className = "avatar";

    var nombreNormalizado = usuario.trim().toLowerCase();

    imagen.src = nombreNormalizado.includes("nico")
        ? "../assets/images/avatar2.jpg"
        : "../assets/images/avatar1.jpg";

    imagen.alt = "";


    // Crear el div del mensaje
    var message = document.createElement("div");

    message.className = "message";


    // Crear el encabezado
    var header = document.createElement("div");

    header.className = "message-header";


    // Obtener la fecha actual
    var fecha = new Date();


    // Convertir la fecha a texto
    var fechaTexto = fecha.toLocaleString();


    // Crear el texto del encabezado
    header.textContent = usuario + " el " + fechaTexto;


    // Crear el cuerpo del mensaje
    var body = document.createElement("span");

    body.className = "body";

    body.textContent = mensaje;


    // Construir el mensaje
    message.appendChild(header);

    message.appendChild(body);


    // Construir el <li>
    newListItem.appendChild(message);

    newListItem.appendChild(imagen);


    // Agregar el mensaje al chat
    chat.appendChild(newListItem);


    // Limpiar los campos
    document.getElementById("usuario_txt").value = "";

    document.getElementById("mensaje_txt").value = "";

}